<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ImplementationOfUsermanager extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'users',
            function ( Blueprint $table) {
                $table->string('profile_pic')
                    ->default('noprofile_lg.gif');
                $table->string('first_name')
                    ->nullable();
                $table->string('last_name')
                    ->nullable();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table(
            'users',
            function (Blueprint $table) {
                $table->dropColumn(['profile_pic', 'first_name', 'last_name']);
            }
        );
    }
}
