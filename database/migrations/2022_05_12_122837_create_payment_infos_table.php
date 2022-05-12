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
        Schema::create('payment_infos', function (Blueprint $table) {
            $table->bigIncrements('payment_id');
            $table->integer('customer_id');
            $table->integer('amount');
            $table->integer('payment_type_id');
            $table->date('payment_date');
            $table->integer('collected_by_id');
            $table->string('transaction_no')->nullable();
            $table->string('pay_month');
            $table->string('pay_year');
            $table->string('creator');
            $table->boolean('payment_status')->default(1);
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
        Schema::dropIfExists('payment_infos');
    }
};
