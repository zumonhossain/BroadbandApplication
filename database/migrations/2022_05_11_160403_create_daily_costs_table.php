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
        Schema::create('daily_costs', function (Blueprint $table) {
            $table->bigIncrements('debit_voucher_id');
            $table->unsignedBigInteger('transaction_id');
            $table->unsignedBigInteger('debit_type_id');
            $table->date('expense_date');
            $table->float('amount',11,2);
            $table->integer('debited_told');
            $table->integer('credited_from_id');
            $table->integer('expense_by_id');
            $table->integer('year');
            $table->integer('month_id');
            $table->string('voucher_file_path');
            $table->unsignedBigInteger('creator');
            $table->boolean('debit_voucher_status')->default(1);
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
        Schema::dropIfExists('daily_costs');
    }
};
