<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Users table
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('mobile')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Admins table
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Dishes table
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category')->default('Other');
            $table->text('description')->nullable();
            $table->decimal('base_price', 8, 2);
            $table->decimal('price_with_cheese', 8, 2);
            $table->string('image_path')->nullable();
            $table->boolean('is_available')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });

        // Orders table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('total', 8, 2)->default(0);
            $table->enum('status', ['pending', 'preparing', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();
        });

        // Order items table
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('restrict');
            $table->integer('quantity');
            $table->boolean('has_cheese')->default(false);
            $table->decimal('price', 8, 2);
            $table->string('dish_name')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        // Personal access tokens
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
        Schema::dropIfExists('order_items');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('admins');
        Schema::dropIfExists('users');
    }
};
