<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('package_id')->constrained()->onDelete('cascade');
            $table->decimal('amount', 20, 2);            // how much user invested
            $table->decimal('daily_earning', 20, 8);     // daily_return % of amount
            $table->decimal('total_earned', 20, 8)->default(0); // grows every minute
            $table->decimal('expected_return', 20, 2);   // amount * (1 + total_return%)
            $table->integer('days_remaining');
            $table->timestamp('ends_at');
            $table->enum('status', ['active', 'completed', 'cancelled'])->default('active');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('investments');
    }
};
