<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->boolean('status')->default(false);
            $table->integer('old_reading');
            $table->integer('new_reading');
            $table->date('old_reading_date');
            $table->date('new_reading_date');
            $table->integer('units');
            $table->decimal('charge_fixed');
            $table->decimal('charge_for_units');
            $table->decimal('charge_for_month');
            $table->decimal('last_payment');
            $table->decimal('balance_forward');
            $table->decimal('charge_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bills');
    }
};
