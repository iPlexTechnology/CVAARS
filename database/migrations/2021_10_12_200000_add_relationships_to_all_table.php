<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToAllTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles');
        });

        Schema::table('vaccine_batches', function (Blueprint $table) {
            $table->foreign('vaccine_id')->references('id')->on('vaccine_types');
        });

        Schema::table('citizen_records', function (Blueprint $table) {
            $table->foreign('moh_division_id')->references('id')->on('moh_divisions');
            $table->foreign('grama_niladhari_division_id')->references('id')->on('grama_niladhari_devisions');
        });

        Schema::table('vaccinated_records', function (Blueprint $table) {
            $table->foreign('dose_batch_id')->references('id')->on('vaccine_batches');
            $table->foreign('vaccination_center_id')->references('id')->on('vaccination_centers');
        });

        Schema::table('vaccination_centers', function (Blueprint $table) {
            $table->foreign('moh_division_id')->references('id')->on('moh_divisions');
        });

        Schema::table('vaccine_allocations', function (Blueprint $table) {
            $table->foreign('dose_batch_id')->references('id')->on('vaccine_batches');
            $table->foreign('vaccination_center_id')->references('id')->on('vaccination_centers');
            $table->foreign('moh_division_id')->references('id')->on('moh_divisions');
        });

        Schema::table('residential_areas', function (Blueprint $table) {
            $table->foreign('grama_niladhari_division_id')->references('id')->on('grama_niladhari_devisions');
            $table->foreign('moh_division_id')->references('id')->on('moh_divisions');
        });
    }
}
