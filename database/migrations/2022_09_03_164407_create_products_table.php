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
            $table->float('purchased_price',8,2)->nullable();
            $table->float('regular_price',8,2);
            $table->float('discount',8,2)->nullable();
            $table->integer('category_id');
            $table->integer('vendor_id');
            $table->text('short_description')->nullable();
            $table->LongText('description')->nullable();
            $table->string('featured_photo');
            $table->string('status')->default('active');
            $table->string('product_gallery1')->nullable();
            $table->string('product_gallery2')->nullable();
            $table->string('product_gallery3')->nullable();
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
