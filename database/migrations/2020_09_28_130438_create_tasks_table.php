<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->text('desc');
            $table->unsignedBigInteger('owner_id')->nullable();
            $table->boolean('completed')->default(false);
            $table->boolean('isActive')->default(true);
            $table->boolean('isWeekly')->default(false);
            $table->date('finalWeekDate')->nullable();
            $table->timestamps();
            $table->foreign('owner_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
