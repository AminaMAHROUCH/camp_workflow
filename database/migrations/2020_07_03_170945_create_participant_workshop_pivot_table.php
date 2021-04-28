<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantWorkshopPivotTable extends Migration
{
    public function up()
    {
        Schema::create('participant_workshop', function (Blueprint $table) {
            $table->unsignedInteger('workshop_id');
            $table->foreign('workshop_id', 'workshop_id_fk_1764717')->references('id')->on('workshops')->onDelete('cascade');
            $table->unsignedInteger('participant_id');
            $table->foreign('participant_id', 'participant_id_fk_1764717')->references('id')->on('participants')->onDelete('cascade');
        });
    }
}