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
        Schema::create('service_types', function (Blueprint $table) {
            $table->bigIncrements('service_type_id');
            $table->string('service_name');
            $table->boolean('service_status')->default(1);
            $table->timestamps();
        });


        DB::table('service_types')->insert(
            array(
                'service_name' => 'Internet Service'
            )
        );

        DB::table('service_types')->insert(
            array(
                'service_name' => 'Dish Cable Service'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_types');
    }
};
