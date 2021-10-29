<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaccinatedRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vaccinated_records', function (Blueprint $table) {
            $table->id();
            $table->string('nic', 12);
            $table->bigInteger('dose_batch_id')->unsigned();
            $table->date('vaccinated_date');
            $table->bigInteger('vaccination_center_id')->unsigned();
            $table->integer('dose_count')->default(0);
            $table->text('post_symptoms')->nullable();
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
        Schema::dropIfExists('vaccinated_records');
    }
}
