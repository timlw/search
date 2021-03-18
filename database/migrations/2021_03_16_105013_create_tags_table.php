<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
		
		Schema::create('product_tag', function (Blueprint $table) {
            $table->id();
			$table->bigInteger('product_id')->unsigned()->nullable();
			$table->bigInteger('tag_id')->unsigned()->nullable();
		});
		
		Schema::table('product_tag', function (Blueprint $table) {
			$table->foreign('product_id')->references('id')->on('products');
			$table->foreign('tag_id')->references('id')->on('tags');
		});

    } 

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tags');
        Schema::dropIfExists('product_tag');
    }
}
