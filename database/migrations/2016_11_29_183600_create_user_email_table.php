<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

class CreateUserEmailTable extends \Illuminate\Database\Migrations\Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_emails', function (Blueprint $table) {
            $table->increments('user_emails_id');
            $table->integer('users_id')->unsigned();
            $table->integer('email_types_id')->unsigned();
            $table->string('address')->unique();
            $table->nullableTimestamps();

            $table->foreign('users_id', 'user_emails__users__foreign')
                  ->references('users_id')
                  ->on('users')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

            $table->foreign('email_types_id', 'user_emails__email_types__foreign')
                  ->references('email_types_id')
                  ->on('email_types')
                  ->onDelete('restrict')
                  ->onUpdate('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_types');
    }
}
