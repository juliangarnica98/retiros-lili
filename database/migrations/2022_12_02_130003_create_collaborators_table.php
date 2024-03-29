<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollaboratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collaborators', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->string('state');
            $table->string('document');
            //agregar cargo
            $table->string('cargo');
            $table->string('user_id1')->nullable();
            $table->string('user_id2')->nullable();
            $table->string('user_id3')->nullable();
            $table->string('user_id4')->nullable();
            $table->string('user_id5')->nullable();
            $table->string('user_id6')->nullable();
            $table->string('user_id7')->nullable();
            $table->string('state_e');
            $table->string('centro_costo');
            $table->string('area');
            // $table->string('centro_d');

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->references('id')->on('users');
            
            // $table->unsignedBigInteger('position_id');
            // $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');;

            // $table->unsignedBigInteger('regional_id');
            // $table->foreign('regional_id')->references('id')->on('regionals')->onDelete('cascade');;

            // $table->unsignedBigInteger('gerencia_id');
            // $table->foreign('gerencia_id')->references('id')->on('gerencias')->onDelete('cascade');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('collaborators');
    }
}
