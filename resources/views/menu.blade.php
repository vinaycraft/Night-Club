@extends('layouts.customer')

@section('content')
<div class="container py-4">
    <div class="row">
        @foreach($dishes as $dish)
            <div class="col-md-4 mb-4">
                <div class="menu-card shadow-sm">
                    @if($dish->image_path)
                        <div class="menu-card-img-wrap">
                            <img src="{{ asset('storage/' . $dish->image_path) }}" 
                                 class="menu-card-img" 
                                 alt="{{ $dish->name }}">
                            @if($dish->is_popular ?? false)
                                <span class="menu-badge">Popular</span>
                            @endif
                        </div>
                    @else
                        <div class="menu-card-img-wrap bg-light text-center p-4">
                            <i class="fas fa-utensils fa-3x text-muted"></i>
                        </div>
                    @endif
                    <div class="menu-card-body">
                        <div class="d-flex justify-content-between align-items-center mb-1">
                            <h5 class="menu-card-title mb-0">{{ $dish->name }}</h5>
                            <span class="menu-card-price">₹{{ number_format($dish->base_price, 2) }}</span>
                        </div>
                        <div class="menu-card-desc mb-2">{{ $dish->description }}</div>
                        <div class="d-flex align-items-center justify-content-between mt-3">
                            <div class="menu-orders">
                                <i class="fas fa-fire text-warning me-1"></i>
                                283+ orders
                            </div>
                            <form action="{{ route('cart.add', $dish) }}" method="POST" class="m-0">
                                @csrf
                                <input type="hidden" name="has_cheese" value="0">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn menu-add-btn">
                                    <i class="fas fa-plus me-2"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<style>
.menu-card, .menu-card * {
    box-sizing: border-box;
}
.menu-card {
    background: linear-gradient(135deg, #18122b 80%, #231942 100%) !important;
    border-radius: 1.2rem !important;
    overflow: hidden !important;
    box-shadow: 0 4px 24px 0 rgba(44,0,54,0.18) !important;
    border: none !important;
    padding: 0 !important;
}
.menu-card-img-wrap {
    position: relative !important;
    width: 100% !important;
    height: 210px !important;
    overflow: hidden !important;
    background: #1a1430 !important;
}
.menu-card-img {
    width: 100% !important;
    height: 210px !important;
    object-fit: cover !important;
    display: block !important;
}
.menu-badge {
    position: absolute !important;
    top: 14px !important;
    right: 14px !important;
    background: linear-gradient(90deg, #a259ff 0%, #ff47a3 100%) !important;
    color: #fff !important;
    font-size: 0.92rem !important;
    font-weight: 700 !important;
    padding: 0.3rem 0.9rem !important;
    border-radius: 1rem !important;
    box-shadow: 0 2px 8px rgba(162,89,255,0.12) !important;
    z-index: 2;
}
.menu-card-body {
    padding: 1.2rem 1.2rem 1.1rem 1.2rem !important;
    background: rgba(24,18,43,0.95) !important;
}
.menu-card-title {
    font-size: 1.35rem !important;
    font-weight: 700 !important;
    color: #fff !important;
}
.menu-card-price {
    font-size: 1.18rem !important;
    color: #ff47a3 !important;
    font-weight: 700 !important;
}
.menu-card-desc {
    color: #bcbcbc !important;
    font-size: 1.03rem !important;
}
.menu-orders {
    color: #bcbcbc !important;
    font-size: 0.98rem !important;
    font-weight: 500 !important;
    display: flex !important;
    align-items: center !important;
}
.menu-add-btn {
    background: linear-gradient(90deg, #a259ff 0%, #ff47a3 100%) !important;
    color: #fff !important;
    font-weight: 700 !important;
    border: none !important;
    border-radius: 0.6rem !important;
    padding: 0.55rem 1.4rem !important;
    font-size: 1.03rem !important;
    box-shadow: 0 2px 8px rgba(162,89,255,0.13) !important;
    transition: background 0.2s, box-shadow 0.2s !important;
}
.menu-add-btn:hover {
    background: linear-gradient(90deg, #8839e7 0%, #ff47a3 100%) !important;
    color: #fff !important;
    box-shadow: 0 4px 16px rgba(162,89,255,0.18) !important;
}
</style>
@endsection
