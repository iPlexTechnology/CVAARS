<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentialAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residential_areas', function (Blueprint $table) {
            $table->id();
            $table->string('nic', 12)->unique();
            $table->string('name', 100)->nullable();
            $table->bigInteger('grama_niladhari_division_id')->unsigned();
            $table->bigInteger('moh_division_id')->unsigned();
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
        Schema::dropIfExists('residential_areas');
    }
}
