<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('payment_method');
            $table->enum('status', ['new', 'processing', 'ready', 'completed', 'cancelled'])->default('new');
            $table->decimal('total_price', 12, 2)->nullable();
            $table->text('custom_order')->nullable();
            $table->date('order_date');
            $table->date('requested_delivery_date'); // Tanggal yang diinginkan oleh pengguna
            $table->string('payment_proof')->require();
            $table->date('delivery_date')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
