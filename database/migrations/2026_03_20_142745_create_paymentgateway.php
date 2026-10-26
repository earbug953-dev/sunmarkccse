<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payment_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // e.g. Bitcoin, USDT, Ethereum
            $table->string('symbol')->nullable();  // e.g. BTC, USDT, ETH, XRP
            $table->string('network')->nullable(); // e.g. TRC20, ERC20, BEP20
            $table->text('wallet_address');        // the deposit address
            $table->string('qr_code')->nullable(); // optional QR image path
            $table->boolean('active')->default(true);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payment_gateways');
    }
};
