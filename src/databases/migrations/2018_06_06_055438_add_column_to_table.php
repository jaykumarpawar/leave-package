<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnToTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->enum('maritalstatus', ['single', 'married', 'divorced', 'widowed'])->nullable();
            $table->string('image')->nullable();
            $table->string('contact')->nullable();
            $table->enum('bloodgroup', ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'])->nullable();
            $table->integer('reportto')->nullable();
            $table->float('leavebalance')->nullable();
            $table->float('unpaidleaves')->default(0.0)->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
