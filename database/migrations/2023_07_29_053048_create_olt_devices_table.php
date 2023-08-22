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
        Schema::create('olt_devices', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->bigInteger('router_id')->nullable();
            $table->string('name')->nullable();
            $table->text('description')->nullable();
            $table->string('standard')->nullable();
            $table->integer('pon_ports_no')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('olt_devices');
    }
};
