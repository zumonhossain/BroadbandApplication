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
        Schema::create('service_sub_areas', function (Blueprint $table) {
            $table->bigIncrements('service_sub_area_id');
            $table->integer('service_area_id');
            $table->string('service_sub_area_name');
            $table->string('service_sub_area_remarks');
            $table->boolean('service_sub_area_status')->default(1);
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
        Schema::dropIfExists('service_sub_areas');
    }
};
