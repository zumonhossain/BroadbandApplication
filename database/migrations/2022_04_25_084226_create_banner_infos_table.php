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
        Schema::create('banner_infos', function (Blueprint $table) {
            $table->id('banner_id');
            $table->string('banner_name');
            $table->string('banner_title');
            $table->string('banner_subtitle');
            $table->string('banner_url');
            $table->boolean('banner_status')->default(1);
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
        Schema::dropIfExists('banner_infos');
    }
};
