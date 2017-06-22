<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //会议室使用情况
        Schema::create('meetings_meetingroom', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('meeting_id')->unsigned();
            $table->integer('room_id')->unsigned();
//            $table->enum('stat' ,[0,1])->comments('meeting_room stat')  ;
        });

        Schema::table('meetings_meetingroom', function (Blueprint $table) {
            $table->foreign('meeting_id')->references('id')->on('meetings');
            $table->foreign('room_id')->references('id')->on('meetingrooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meetings_meetingroom');
    }
}
