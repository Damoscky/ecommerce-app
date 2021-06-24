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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cat_id')->nullable();
            $table->unsignedBigInteger('sub_cat_id')->nullable();
            $table->unsignedBigInteger('child_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->integer('payment_method_id')->default(1);
            $table->mediumText('product_name')->nullable();
            $table->mediumText('product_description')->nullable();
            $table->string('tags')->nullable();
            $table->string('delivery_location')->nullable();
            $table->string('product_brand_name')->nullable();
            $table->string('processing_type')->nullable();
            $table->string('production_company')->nullable();
            $table->mediumText('selling_unit')->nullable();
            $table->mediumText('single_package_size')->nullable();
            $table->string('product_material')->nullable();
            $table->string('product_weight')->nullable();
            $table->string('size')->nullable();
            $table->string('estimated_time')->nullable();
            $table->string('dimension')->nullable();
            $table->bigInteger('quantity_supplied')->default(0);
            $table->bigInteger('quantity_purchased')->default(0);
            $table->bigInteger('available_quantity')->default(0);
            $table->mediumText('product_image')->nullable();
            $table->boolean('in_stock')->default(true);
            $table->decimal('old_price', 15, 2)->default(0.00);
            $table->decimal('new_price', 15, 2)->default(0.00);
            $table->decimal('shipping_fee', 15, 2)->default(0.00)->nullable();
            $table->string('discount')->nullable();
            $table->string('color')->nullable();
            $table->integer('views')->default(0);
            $table->decimal('ratings')->default(0.00);
            $table->boolean('featured')->default(false);
            $table->boolean('promoted')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreign('cat_id')->references('id')->on('categories')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('sub_cat_id')->references('id')->on('sub_categories')->onDelete('set null');
            $table->foreign('child_id')->references('id')->on('childrens')->onDelete('set null');
            $table->foreign('brand_id')->references('id')->on('brands')->onDelete('set null');
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
