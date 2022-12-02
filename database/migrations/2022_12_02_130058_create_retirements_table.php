<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retirements', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('document_user');
            $table->string('document_collaborator');
            $table->string('performance');
            $table->string('last_day');
            $table->string('money_pend');
            $table->string('money_conc');
            $table->string('money_amou');
            $table->string('date_1');
            $table->string('date_2');
            $table->string('date_3');
            $table->string('date_4');
            $table->string('date_5');
            $table->string('date_d_1');
            $table->string('date_d_2');
            $table->string('date_d_3');
            $table->string('date_d_4');
            $table->string('date_d_5');
            $table->string('cum_bonus');
            $table->string('cat_bonus');
            $table->string('ext_bonus');
            $table->string('cell');
            $table->string('letter');
            $table->string('delivery_certificate');
            $table->text('admin_ent');
            $table->text('store_ent');

            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->unsignedBigInteger('collaborator_id');
            $table->foreign('collaborator_id')->references('id')->on('collaborators');

            $table->unsignedBigInteger('type_retirement_id');
            $table->foreign('type_retirement_id')->references('id')->on('type_retirements');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('retirements');
    }
}