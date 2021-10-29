<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReadyForVaccinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ready_for_vaccinations', function (Blueprint $table) {
            $table->id();
            $table->string('nic', 12)->unique();
            $table->date('dose_receiving_date');
            $table->time('dose_receiving_time');
            $table->bigInteger('vaccine_center_id')->unsigned();
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
        Schema::dropIfExists('ready_for_vaccinations');
    }
}
