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
        Schema::create('advance_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('customer_id');
            $table->bigInteger('olt_device_id')->nullable();
            $table->bigInteger('pon_port_id')->nullable();
            $table->bigInteger('nap_device_id')->nullable();
            $table->bigInteger('nap_port_id')->nullable();
            $table->string('onu_name')->nullable();
            $table->string('mac_address')->nullable();
            $table->string('remarks_1')->nullable();
            $table->string('remarks_2')->nullable();
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
        Schema::dropIfExists('advance_profiles');
    }
};
