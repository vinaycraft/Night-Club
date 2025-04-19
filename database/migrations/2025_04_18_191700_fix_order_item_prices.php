<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Fix all order item prices based on the current dish base_price
        $items = DB::table('order_items')->get();
        foreach ($items as $item) {
            $dish = DB::table('dishes')->where('id', $item->dish_id)->first();
            if ($dish && isset($dish->base_price)) {
                DB::table('order_items')->where('id', $item->id)->update(['price' => $dish->base_price]);
            }
        }
    }
    public function down(): void {}
};
