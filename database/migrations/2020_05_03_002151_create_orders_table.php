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
            $table->biginteger('customer_id')->unsigned();
            $table->biginteger('product_id')->unsigned();
            $table->integer('total');
            $table->integer('pay');
            $table->integer('due');
            $table->integer('quantity');
            $table->date('order_date');
            $table->foreign("customer_id")
                ->references('id')
                ->on('customers')
                ->onDelete('cascade');
            
            $table->foreign("product_id")
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
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
