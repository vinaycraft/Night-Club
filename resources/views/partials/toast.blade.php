<div id="toast-notification" class="toast-notification @if(session('toast')) show @endif">
    <div class="toast-content">
        @php
            // Determine heading based on toast message content
            $toast = session('toast');
            $heading = 'Notification';
            if ($toast) {
                if (str_contains(strtolower($toast), 'added to your cart')) {
                    $heading = 'Added to cart';
                } elseif (str_contains(strtolower($toast), 'order placed')) {
                    $heading = 'Order Placed';
                } elseif (str_contains(strtolower($toast), 'order cancelled')) {
                    $heading = 'Order Cancelled';
                } elseif (str_contains(strtolower($toast), 'success')) {
                    $heading = 'Success';
                }
            }
        @endphp
        <span class="toast-title">{{ $heading }}</span>
        <div class="toast-message">
            {{ $toast }}
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toast = document.getElementById('toast-notification');
        if (toast && toast.classList.contains('show')) {
            setTimeout(() => {
                toast.classList.remove('show');
            }, 2000);
        }
    });
</script>
