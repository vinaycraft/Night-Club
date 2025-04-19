<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update the ENUM values for the status column in orders table
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('pending', 'preparing', 'ready', 'completed', 'cancelled') DEFAULT 'pending'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert ENUM to previous values (without 'ready')
        DB::statement("ALTER TABLE orders MODIFY COLUMN status ENUM('pending', 'preparing', 'completed', 'cancelled') DEFAULT 'pending'");
    }
};
