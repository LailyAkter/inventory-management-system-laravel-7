<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->biginteger('category_id')->unsigned();
            $table->string('slug');
            $table->mediumText('description');
            $table->integer('sell_price');
            $table->integer('real_price');
            $table->integer('discount_price');
            $table->string('product_code');
            $table->string('image')->default('default.png');
            $table->date('expire_date');
            $table->integer('quantity');
            $table->integer('qty_per_carton');
            $table->integer('stock');
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('products');
    }
}
