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
        Schema::create('connection_statuses', function (Blueprint $table) {
            $table->bigIncrements('connection_status_id');
            $table->string('connection_name');
            $table->boolean('connection_status')->default(1);
            $table->timestamps();
        });




        DB::table('connection_statuses')->insert(
            array(
                'connection_name' => 'Active'
            )
        );

        DB::table('connection_statuses')->insert(
            array(
                'connection_name' => 'inActive'
            )
        );

        DB::table('connection_statuses')->insert(
            array(
                'connection_name' => 'Disconnect'
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
        Schema::dropIfExists('connection_statuses');
    }
};
