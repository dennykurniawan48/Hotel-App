<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("ref_user")->unsigned();
            $table->bigInteger("ref_hotel")->unsigned();
            $table->string("start");
            $table->string("end");
            $table->integer("durasi");
            $table->double("total");
            $table->foreign("ref_user")->references("id")->on("users");
            $table->foreign("ref_hotel")->references("id")->on("hotels");
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
        Schema::dropIfExists('bookings');
    }
}
