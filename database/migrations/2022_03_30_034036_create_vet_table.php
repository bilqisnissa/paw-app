<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_vet', function (Blueprint $table) {
            $table->id();
            $table->string('vet_name');
            $table->string('vet_workplace');
            $table->string('vet_location');
            $table->string('vet_price');
            $table->string('vet_information');
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
        Schema::dropIfExists('vet');
    }
};
