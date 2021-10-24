<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccineBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccine_batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_no', 50);
            $table->bigInteger('vaccine_id')->unsigned();
            $table->string('vaccine_type', 50);
            $table->date('manufactured_date');
            $table->date('expiration_date');
            $table->integer('initial_quantity');
            $table->integer('current_quantity');
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
        Schema::dropIfExists('vaccine_batches');
    }
}
