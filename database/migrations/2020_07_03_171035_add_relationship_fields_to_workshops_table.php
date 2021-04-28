<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToWorkshopsTable extends Migration
{
    public function up()
    {
        Schema::table('workshops', function (Blueprint $table) {
            $table->unsignedInteger('responsible_id');
            $table->foreign('responsible_id', 'responsible_fk_1764697')->references('id')->on('workshop_responsibles');
        });
    }
}