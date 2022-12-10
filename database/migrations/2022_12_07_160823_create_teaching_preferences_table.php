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
      Schema::create('teaching_preferences', function (Blueprint $table) {
         $table->id();
         // degree of teaching
         $table->string('level', 10)->nullable(); //hard easy medium
         $table->string('pace', 10)->nullable(); //fast slow
         // mode of teaching
         $table->integer('video', 10)->nullable();//scale of 1-10
         $table->integer('audio', 10)->nullable();//scale of 1-10
         $table->integer('text', 10)->nullable();//scale of 1-10
         $table->integer('practicals', 10)->nullable();//scale of 1-10
         $table->integer('theories', 10)->nullable();//scale of 1-10
         $table->integer('interactive', 10)->nullable();//scale of 1-10

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
      Schema::dropIfExists('teaching_preferences');
   }
};
