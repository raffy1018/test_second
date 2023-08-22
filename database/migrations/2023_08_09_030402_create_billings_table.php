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
        Schema::create('billings', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullble();
            $table->bigInteger('customer_id')->nullable();
            $table->string('type')->nullable();
            $table->boolean('status')->default(true);
            $table->date('start_date')->nullable();
            $table->integer('bill_date')->nullable();
            $table->string('cycle')->nullable();
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
        Schema::dropIfExists('billings');
    }
};
