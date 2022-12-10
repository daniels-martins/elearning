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
      Schema::create('learning_preferences', function (Blueprint $table) {
         $table->id();
         // degree of learning
         $table->string('level', 10)->nullable(); //hard easy medium
         $table->string('pace', 10)->nullable(); //fast slow

         // mode of learning
         $table->integer('video', 10)->nullable(); //scale of 1-10
         $table->integer('audio', 10)->nullable(); //scale of 1-10
         $table->integer('text', 10)->nullable(); //scale of 1-10
         $table->integer('practicals', 10)->nullable(); //scale of 1-10
         $table->integer('theories', 10)->nullable(); //scale of 1-10
         $table->integer('self_paced', 10)->nullable(); //scale of 1-10
         $table->integer('instructor_led', 10)->nullable(); //scale of 1-10
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
      Schema::dropIfExists('learning_preferences');
   }
};
