<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroupParticipantPivotTable extends Migration
{
    public function up()
    {
        Schema::create('group_participant', function (Blueprint $table) {
            $table->unsignedInteger('group_id');
            $table->foreign('group_id', 'group_id_fk_1764716')->references('id')->on('groups')->onDelete('cascade');
            $table->unsignedInteger('participant_id');
            $table->foreign('participant_id', 'participant_id_fk_1764716')->references('id')->on('participants')->onDelete('cascade');
        });
    }
}