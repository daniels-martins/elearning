<?php

use App\Models\Student;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
         $table->tinyInteger('video')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('audio')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('text')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('practicals')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('theories')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('self_paced')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('instructor_led')->unsigned()->nullable(); //scale of 1-10

         // foreign key
         $table->foreignIdFor(Student::class);
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
