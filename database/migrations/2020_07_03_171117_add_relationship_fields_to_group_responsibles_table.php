<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToGroupResponsiblesTable extends Migration
{
    public function up()
    {
        Schema::table('group_responsibles', function (Blueprint $table) {
            $table->unsignedInteger('responsible_id');
            $table->foreign('responsible_id', 'responsible_fk_1764693')->references('id')->on('responsibles');
        });
    }
}