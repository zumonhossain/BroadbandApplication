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
        Schema::create('debit_types', function (Blueprint $table) {
            $table->bigIncrements('debit_type_id');
            $table->string('debit_type_name');
            $table->boolean('debit_type_status')->default(1);
            $table->timestamps();
        });


        DB::table('debit_types')->insert(
            array(
                'debit_type_name' => 'Demo-1'
            )
        );

        DB::table('debit_types')->insert(
            array(
                'debit_type_name' => 'Demo-2'
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
        Schema::dropIfExists('debit_types');
    }
};
