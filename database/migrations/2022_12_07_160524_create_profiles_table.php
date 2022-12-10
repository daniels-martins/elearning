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
      Schema::create('profiles', function (Blueprint $table) {
         $table->id();
         $table->string('fname', 20)->nullable();
         $table->string('lname', 20)->nullable();
         $table->integer('age')->nullable();
         $table->string('dob')->nullable();
         $table->string('mat_no')->nullable();
         $table->string('dept', 50)->nullable();
         $table->boolean('exco')->nullable();
         $table->integer('nerd')->nullable();

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
      Schema::dropIfExists('profiles');
   }
};
