<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authors', function (Blueprint $table) {
            $table->id();
            $table->string('firstName');
            $table->string('lastName');
            $table->integer('birthYear');
            $table->timestamps();
        });

        Schema::table('authors',function (Blueprint $table){
            $table->foreignId("epoch_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('authors');

        Schema::table('authors',function (Blueprint $table){
            $table->dropForeign("epoch_id");
        });
    }
}
