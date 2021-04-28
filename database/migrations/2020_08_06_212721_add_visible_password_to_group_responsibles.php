<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVisiblePasswordToGroupResponsibles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_responsibles', function (Blueprint $table) {
            $table->text('visisble_password')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_responsibles', function (Blueprint $table) {
            $table->dropColumn(['visisble_password']);
        });
    }
}
