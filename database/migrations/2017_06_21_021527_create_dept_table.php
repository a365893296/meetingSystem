<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeptTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dept', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('parent_id')->comments('父部门ID') ;
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('dept');
    }
}
