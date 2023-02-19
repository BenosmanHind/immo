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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->unsigned();
            $table->unsignedBigInteger('category_id')->unsigned();
            $table->string('designation');
            $table->longText('description');
            $table->string('superficie');
            $table->integer('piece')->nullable();
            $table->float('price')->nullable();
            $table->string('etage')->nullable();
            $table->string('quartie')->nullable();
            $table->string('lien_map')->nullable();
            $table->integer('status')->nullable();
            $table->string('slug')->nullable();
            $table->tinyInteger('flag')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
        Schema::dropIfExists('properties');
    }
};
