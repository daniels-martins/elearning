<?php

use App\Models\Instructor;
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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 40);
            $table->string('code', 10);
            $table->string('credits', 10);
            $table->string('status', 10); //core, mandatory, elective

            // foreign keys
            $table->foreignIdFor(Instructor::class)->nullable();//
            
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
        Schema::dropIfExists('courses');
    }
};
