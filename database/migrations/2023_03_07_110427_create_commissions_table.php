<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->integer('userId')->nullable();
            $table->integer('transectionCode')->nullable();
            $table->integer('userAmmount')->nullable();
            $table->integer('affiliateId')->nullable();
            $table->string('affiliateType')->nullable();
            $table->string('commissionPercent')->nullable();
            $table->integer('commissionAmount')->nullable();
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
        Schema::dropIfExists('commissions');
    }
}
