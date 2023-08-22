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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('type')->nullable();
            $table->string('invoice_no')->nullable();
            $table->bigInteger('customer_id')->nullable();
            $table->date('date')->nullable();
            $table->decimal('credit', 8, 2)->default(0.00);
            $table->decimal('debit', 8, 2)->default(0.00);
            $table->string('reference_no')->nullable();
            $table->string('description')->nullable();
            $table->string('creatable_type')->nullable();
            $table->bigInteger('creatable_id')->nullable();
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
        Schema::dropIfExists('transactions');
    }
};
