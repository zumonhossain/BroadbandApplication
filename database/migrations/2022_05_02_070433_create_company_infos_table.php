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
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id('companyProfileId');
            $table->string('com_name_bangla');
            $table->string('com_name_enlish');
            $table->string('company_title')->nullable();
            $table->string('company_sub_title')->nullable();
            $table->string('address');
            $table->string('owner_name1');
            $table->string('owner_photo1');
            $table->string('owner_name2');
            $table->string('owner_photo2');
            $table->string('mobile_no1');
            $table->string('mobile_no2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
            $table->string('support_mobile_number');
            $table->string('description')->nullable();
            $table->string('company_mission')->nullable();
            $table->string('company_vission')->nullable();
            $table->string('web_address');
            $table->string('trade_license')->nullable();
            $table->string('iSP_license')->nullable();
            $table->string('logo')->nullable();
            $table->string('extra1')->nullable();
            $table->string('extra2')->nullable();
            $table->string('extra3')->nullable();
            $table->boolean('com_status')->default(1);
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
        Schema::dropIfExists('company_infos');
    }
};
