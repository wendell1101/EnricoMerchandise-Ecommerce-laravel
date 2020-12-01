<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
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
            $table->string('transaction_id');
            $table->enum('status', ['created', 'paid', 'shipped', 'refunded']);
            $table->float('total_amount', 8, 2);
            $table->boolean('active')->default(true);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('billing_address_id')->constrained('billing_addresses');
            $table->foreignId('shipping_address_id')->constrained('shipping_addresses');

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
}
