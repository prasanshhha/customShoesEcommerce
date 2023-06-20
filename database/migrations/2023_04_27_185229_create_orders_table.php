<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('location')->nullable();
            $table->date('date');
            $table->string('contact');
            $table->float('total', 8, 2);
            $table->enum('status', ['ordered', 'cart', 'wishlist']);
            $table->enum('payment_status', ['pending', 'complete'])->default('pending');
            $table->enum('payment_method', ['cash_on_delivery', 'khalti'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
