<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Recalculate totals for all orders based on their items
        $orders = DB::table('orders')->get();
        foreach ($orders as $order) {
            $items = DB::table('order_items')->where('order_id', $order->id)->get();
            $total = 0;
            foreach ($items as $item) {
                $total += $item->price * $item->quantity;
            }
            DB::table('orders')->where('id', $order->id)->update(['total' => $total]);
        }
    }

    public function down(): void
    {
        // No-op: can't revert totals
    }
};
