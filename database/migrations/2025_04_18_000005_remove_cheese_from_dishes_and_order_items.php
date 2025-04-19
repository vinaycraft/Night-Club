<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->dropColumn('price_with_cheese');
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->dropColumn('has_cheese');
        });
    }

    public function down(): void
    {
        Schema::table('dishes', function (Blueprint $table) {
            $table->decimal('price_with_cheese', 8, 2)->default(0);
        });
        Schema::table('order_items', function (Blueprint $table) {
            $table->boolean('has_cheese')->default(false);
        });
    }
};
