@extends('layouts.customer')

@section('content')
<style>
.hero-section {
    min-height: 100vh;
    width: 100vw;
    left: 0;
    top: 0;
    background: linear-gradient(180deg, rgba(44,0,54,0.87) 0%, rgba(44,0,54,0.7) 40%, rgba(162,89,255,0.12) 100%), url('/menu_img/rock-hero.webp') center center/cover no-repeat;
    background-size: cover;
    background-position: center center;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-align: center;
    position: fixed;
    overflow: hidden;
    height: 100vh;
    inset: 0;
    z-index: 0;
}
.hero-section::before {
    content: '';
    position: absolute;
    top: 0; left: 0; right: 0; bottom: 0;
    background: linear-gradient(180deg, rgba(44,0,54,0.87) 0%, rgba(44,0,54,0.7) 40%, rgba(162,89,255,0.12) 100%);
    z-index: 1;
}
.hero-content {
    width: 100%;
    /* max-width: 520px; */
    margin: 0 auto;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    z-index: 2;
    position: relative;
    padding: 3.5rem 1.5rem 2.5rem 1.5rem;
    background: rgba(34, 34, 59, 0.12);
    border-radius: 18px;
    box-shadow: 0 6px 32px 0 rgba(44,0,54,0.18);
}
.hero-content h1 {
    font-size: 3.2rem;
    font-weight: 900;
    margin-bottom: 1.2rem;
    letter-spacing: 1px;
    background: none;
    color: #fff;
    line-height: 1.1;
}
.hero-content .highlight {
    background: linear-gradient(90deg, #a259ff 0%, #ff47a3 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    font-weight: 900;
}
.hero-content .delivered {
    display: inline-block;
    background: linear-gradient(90deg, #ff47a3 30%, #ff6a88 100%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    text-fill-color: transparent;
    font-weight: 900;
}
.hero-content .subtitle {
    font-size: 1.13rem;
    margin-bottom: 1.6rem;
    color: #fff;
    text-shadow: 0 2px 8px rgba(44,0,54,0.2);
    font-weight: 500;
}
.hero-content .hours {
    font-size: 1.23rem;
    font-weight: 700;
    color: #fff;
    margin-bottom: 1.7rem;
}
.hero-content p {
    font-size: 1.08rem;
    margin-bottom: 1.5rem;
    color: #fff;
    text-shadow: 0 2px 8px rgba(44,0,54,0.2);
    font-weight: 500;
}
.hero-content .btn-group {
    display: flex;
    gap: 0.7rem;
    justify-content: center;
    margin-bottom: 1.5rem;
}
.hero-content .btn-primary {
    background: linear-gradient(90deg, #a259ff 0%, #ff47a3 100%) !important;
    border: none !important;
    color: white !important;
    padding: 0.5rem 1.5rem;
    border-radius: 0.5rem;
    font-size: 1rem;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(162,89,255,0.13);
    transition: all 0.3s ease;
    outline: none;
}
.hero-content .btn-primary:hover {
    background: linear-gradient(90deg, #8839e7 0%, #ff47a3 100%) !important;
    box-shadow: 0 4px 16px rgba(162,89,255,0.18);
}
.hero-content .btn-secondary {
    background: linear-gradient(90deg, #22223b 0%, #393a5a 100%);
    border: none;
    font-size: 1rem;
    padding: 0.65rem 2.2rem;
    border-radius: 7px;
    color: #fff;
    font-weight: 700;
    transition: background 0.2s;
    outline: none;
}
.hero-content .btn-secondary:hover {
    background: linear-gradient(90deg, #393a5a 0%, #22223b 100%);
}
.open-status {
    margin-top: 1.2rem;
    display: inline-block;
    background: linear-gradient(90deg, #22223b 0%, #393a5a 100%);
    color: #00ff9c;
    border-radius: 2rem;
    padding: 0.35rem 1.2rem;
    font-weight: 600;
    font-size: 0.99rem;
    box-shadow: 0 2px 8px rgba(0,0,0,0.08);
    letter-spacing: 0.5px;
}
@media (max-width: 700px) {
    .hero-content h1 { font-size: 1.3rem; }
    .hero-content p { font-size: 0.9rem; }
    .hero-content { padding: 2rem 0.5rem; }
    .hero-section { padding: 1rem 0; }
}
</style>
<div class="hero-section">
    <div class="hero-content">
        <h1>
            Late Night <span class="highlight">Cravings</span> <span class="delivered">Delivered</span>
        </h1>
        <div class="subtitle">
            Experience premium dining delivered to your door between
        </div>
        <div class="hours">
            11PM and 5AM
        </div>
        <div class="btn-group">
            <a href="{{ route('menu') }}" class="btn btn-primary">Order Now</a>
            <a href="#how-it-works" class="btn btn-secondary">How It Works</a>
        </div>
        <div class="open-status">
            <i class="fas fa-circle" style="color:#00ff9c;font-size:0.8em;"></i>
            We're Open Now: 11:00 PM - 5:00 AM
        </div>
    </div>
</div>
@endsection
