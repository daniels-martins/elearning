<?php

use App\Models\Admin;
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
      Schema::create('admin_preferences', function (Blueprint $table) {
         $table->id();

         // degree of learning
         $table->string('level', 10)->nullable(); //hard easy medium tasks
         $table->string('pace', 10)->nullable(); //fast slow (after or ahead of deadlines)

         // mode of learning
         $table->tinyInteger('github')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('git')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('oop')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('agile')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('vue')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('tdd')->unsigned()->nullable(); //scale of 1-10
         $table->tinyInteger('loves_coding')->unsigned()->nullable(); //scale of 1-10

         // foreign key
         $table->foreignIdFor(Admin::class);
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
      Schema::dropIfExists('admin_preferences');
   }
};
