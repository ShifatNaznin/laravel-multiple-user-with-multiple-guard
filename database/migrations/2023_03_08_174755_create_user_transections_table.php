<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTransectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_transections', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable();
            $table->integer('transectionCode')->unique()->nullable();
            $table->integer('amount')->nullable();
            $table->integer('commissionAmount')->nullable();
            $table->integer('commissionRate')->nullable();
            $table->integer('amountAfterCommission')->nullable();
            $table->text('details')->nullable();
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
        Schema::dropIfExists('user_transections');
    }
}
