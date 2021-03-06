<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->integer('cat_id')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_ar')->nullable();
            $table->string('image')->nullable();
            $table->string('tags')->nullable();
            $table->string('price')->nullable();
            $table->longText('information')->nullable();
            $table->longText('information_ar')->nullable();
            $table->string('vendor')->nullable();
            $table->string('reviews')->nullable();
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
        Schema::dropIfExists('services');
    }
}
