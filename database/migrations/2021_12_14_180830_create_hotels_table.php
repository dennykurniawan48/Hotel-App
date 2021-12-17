<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("alamat");
            $table->string("foto");
            $table->double("latitude");
            $table->double("longitude");
            $table->double("biaya");
            $table->string("fasilitas");
            $table->bigInteger("ref_kota")->unsigned();
            $table->foreign("ref_kota")->references("id")->on("kotas");
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
        Schema::dropIfExists('hotels');
    }
}
