<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

class FixOrderTotals extends Command
{
    protected $signature = 'orders:fix-totals';
    protected $description = 'Recalculate and fix the total field for all orders based on their items.';

    public function handle()
    {
        $updated = 0;
        foreach (Order::with('items')->get() as $order) {
            $total = $order->items->sum(function ($item) {
                return $item->price * $item->quantity;
            });
            $order->total = $total;
            $order->save();
            $updated++;
        }
        $this->info("Updated totals for {$updated} orders.");
        return 0;
    }
}
