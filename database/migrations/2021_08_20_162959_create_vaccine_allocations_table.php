<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineAllocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_allocations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('dose_batch_id')->unsigned();
            $table->bigInteger('vaccination_center_id')->unsigned();
            $table->integer('allocated_quantity');
            $table->integer('remaining_quantity');
            $table->softDeletes();
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
        Schema::dropIfExists('vaccine_allocations');
    }
}
