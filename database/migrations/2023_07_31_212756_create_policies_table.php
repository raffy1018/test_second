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
        Schema::create('policies', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->bigInteger('router_id')->nullable();
            $table->string('type')->nullable();
            $table->string('name')->nullable();
            $table->string('recipients')->nullable();
            $table->string('excepts')->nullable();
            $table->string('filter')->nullable();
            $table->string('pppoe_action')->nullable();
            $table->string('pppoe_to_profile')->nullable();
            $table->string('pppoe_over_due')->nullable();
            $table->string('pppoe_grace_period')->nullable();
            $table->string('pppoe_return_balance')->nullable();
            $table->string('hotspot_action')->nullable();
            $table->string('hotspot_to_profile')->nullable();
            $table->string('hotspot_over_due')->nullable();
            $table->string('hotspot_grace_period')->nullable();
            $table->string('hotspot_return_balance')->nullable();
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
        Schema::dropIfExists('policies');
    }
};
