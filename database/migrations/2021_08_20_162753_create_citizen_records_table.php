<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitizenRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citizen_records', function (Blueprint $table) {
            $table->string('nic', 12)->primary();
            $table->string('name', 50);
            $table->text('address');
            $table->string('email', 50)->unique();
            $table->string('phone', 15);
            $table->date('birthday');
            $table->integer('dose_received')->default(0);
            // $table->date('next_dose_receiving_date')->nullable();
            // $table->time('next_dose_receiving_time')->nullable();
            $table->string('province', 50);
            $table->string('district', 50);
            $table->bigInteger('moh_division_id')->unsigned();
            $table->bigInteger('grama_niladhari_division_id')->unsigned();
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
        Schema::dropIfExists('citizen_records');
    }
}
