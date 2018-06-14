<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->unsigned();
            $table->foreign('userid')->references('id')->on('users');
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->string('applyto')->nullable();
            $table->string('leavetype')->nullable();
            $table->string('leavecategory')->nullable();
            $table->string('leavesubcategory')->nullable();
            $table->enum('leavestatus', ['0', '1', '2'])->nullable();
            $table->text('reason')->nullable();
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
        Schema::dropIfExists('leaves');
    }
}
