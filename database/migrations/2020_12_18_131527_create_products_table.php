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
            $table->bigInteger('cat_id')->index()->unsigned();
            $table->bigInteger('brand_id')->index()->unsigned();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->string('product_code')->nullable();
            $table->string('color')->nullable();
            $table->text('description')->nullable();
            $table->float('price')->nullable();
            $table->float('discount')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('weight')->nullable();
            $table->string('product_video')->nullable();
            $table->string('shortdes')->nullable();
            $table->string('wash_care')->nullable();
            $table->string('fabric')->nullable();
            $table->string('pattern')->nullable();
            $table->string('sleev')->nullable();
            $table->string('fit')->nullable();
            $table->string('occasion')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->enum('featured',['yes','no'])->default('no');
            $table->enum('tending',['yes','no'])->default('no');
            $table->enum('topselling',['yes','no'])->default('no');
            $table->enum('deals_of_day',['yes','no'])->default('no');
            $table->enum('status',['0','1'])->default('0');
            $table->string('section')->nullable();
            
            $table->timestamps();

            $table->foreign('cat_id')
                ->references('id')
                ->on('categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');

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
