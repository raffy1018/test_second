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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->bigInteger('router_id');
            $table->bigInteger('customer_id');
            $table->string('service')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('ip_address')->nullable();
            $table->string('local_ip_address')->nullable();
            $table->string('remote_ip_address')->nullable();
            $table->bigInteger('product_id')->nullable();
            $table->integer('credit_limit')->nullable();
            $table->string('profile')->nullable();
            $table->boolean('status')->default(true);
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
        Schema::dropIfExists('subscriptions');
    }
};
