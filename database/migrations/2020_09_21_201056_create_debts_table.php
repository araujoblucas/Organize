<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDebtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('debts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->integer('value');
            $table->text('description');
            $table->boolean('paid');
            $table->boolean('is_mensal');
            $table->boolean('is_installment');
            $table->integer('installment_number')->nullable();
            $table->integer('installment_remaining')->nullable();
            $table->integer('installment_paid')->nullable();
            $table->date('payday');
            $table->date('paid_at');
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
        Schema::dropIfExists('debts');
    }
}
