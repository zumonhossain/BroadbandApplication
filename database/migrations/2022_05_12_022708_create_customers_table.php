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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->string('customer_name');
            $table->string('father_name')->nullable();;
            $table->string('email');
            $table->string('application_date');
            $table->string('phone_no1');
            $table->string('phone_no2')->nullable();;
            $table->string('connection_date');
            $table->integer('connection_status_id');
            $table->integer('customer_occupation_id');
            $table->integer('service_type_id');
            $table->integer('package_id');
            $table->integer('division_id');
            $table->integer('district_id');
            $table->integer('upazila_id');
            $table->integer('union_id');
            $table->integer('service_area_id');
            $table->integer('service_sub_area_id');
            $table->string('description');
            $table->string('post_code');
            $table->string('road_no');
            $table->string('house_no');
            $table->string('floor_no');
            $table->string('plate_no');
            $table->string('photo')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('nid')->nullable();
            $table->string('nid_patch')->nullable();
            $table->boolean('customer_status')->default(1);
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
        Schema::dropIfExists('customers');
    }
};
