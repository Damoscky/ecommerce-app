<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserBillingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_billings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->mediumText('address1')->nullable();
            $table->string('country1')->nullable();
            $table->string('state1')->nullable();
            $table->string('city1')->nullable();
            $table->string('postal_code1')->nullable();
            $table->mediumText('address2')->nullable();
            $table->string('country2')->nullable();
            $table->string('state2')->nullable();
            $table->string('city2')->nullable();
            $table->string('postal_code2')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('user_billings');
    }
}
