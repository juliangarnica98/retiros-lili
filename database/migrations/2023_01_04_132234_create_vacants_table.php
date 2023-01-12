<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVacantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title');
            $table->string('city');
            $table->string('description');
            $table->string('state');
            $table->string('salary');
            $table->text('experience');
            $table->text('num_vacants');
            $table->string('num_aplic');

            
            
    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vacants');
    }
}
