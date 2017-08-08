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
//            $table->enum('state' ,[0,1])->comments('meeting_room state')  ;
        });

        Schema::table('meetings_meetingroom', function (Blueprint $table) {
            $table->foreign('meeting_id')->references('id')->on('meetings');
            $table->foreign('room_id')->references('id')->on('rooms');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('meetings_meetingroom', function (Blueprint $table) {
            $table->dropForeign('meetings_meetingroom_meeting_id_foreign');
            $table->dropForeign('meetings_meetingroom_room_id_foreign');
        });
        Schema::dropIfExists('meetings_meetingroom');
    }
}
