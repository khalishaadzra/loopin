<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('order_number')->unique();
            $table->decimal('total_amount', 12, 2);
            $table->decimal('shipping_cost', 10, 2)->default(0);
            // PENYESUAIAN STATUS
            $table->string('status')->default('Pesanan Diterima'); 
            $table->string('payment_method')->default('Cash on Delivery'); 
            $table->string('payment_status')->default('Belum Dibayar (COD)'); 
            $table->string('recipient_name');
            $table->text('shipping_address');
            $table->string('shipping_address_detail')->nullable();
            $table->string('recipient_phone');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};