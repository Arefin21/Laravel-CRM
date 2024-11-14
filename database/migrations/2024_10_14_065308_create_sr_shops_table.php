<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSrShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sr_shops', function (Blueprint $table) {
            $table->id();
            $table->string('shopName');
            $table->string('ownerName');
            $table->string('Mobile');
            $table->string('Adress');
            $table->integer('srId');
            $table->integer('warehouseId');
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
        Schema::dropIfExists('sr_shops');
    }
}
