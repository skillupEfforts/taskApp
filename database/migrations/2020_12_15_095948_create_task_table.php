<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taskTable', function (Blueprint $table) {
            $table->id()->autoIncrement();;
            $table->string('userid');
            $table->string('taskname');
            $table->double('kosu');
            $table->double('jitsukosu');
            $table->date('startdate');
            $table->date('enddate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taskTable');
    }
}
