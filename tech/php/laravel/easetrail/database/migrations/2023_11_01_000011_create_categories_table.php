<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique()->nullable();
            $table->unsignedBigInteger('parent_id')->default(0)->nullable();
            $table->timestamps();
        });

        // Schema::create('category_closure', function (Blueprint $table) {
        //     $table->id();
        //     $table->unsignedBigInteger('ancestor');
        //     $table->unsignedBigInteger('descendant');
        //     $table->unsignedInteger('depth');
        //     $table->timestamps();

        //     $table->foreign('ancestor')->references('id')->on('categories')->onDelete('cascade');
        //     $table->foreign('descendant')->references('id')->on('categories')->onDelete('cascade');
        // });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Schema::dropIfExists('category_closure');
        Schema::dropIfExists('categories');
    }
}
