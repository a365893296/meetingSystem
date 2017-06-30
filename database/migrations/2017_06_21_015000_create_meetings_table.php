<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('topic');
//            $table->integer('dept_id');
            $table->dateTime('begin_time');
            $table->integer('duration')->nullable();
            $table->string('feature')->default('common');
            $table->string('state')->default('prepare') ;
            $table->string('level')->default('common') ;
            $table->string('contents')->nullable();
            $table->string('file')->nullable();
            $table->string('master');
            $table->string('host');
            $table->string('room_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings');
    }
}
