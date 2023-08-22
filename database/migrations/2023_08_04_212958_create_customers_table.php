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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->bigInteger('router_id')->nullable();
            $table->string('account_no')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->boolean('status')->default(true);
            $table->string('email')->nullable();
            $table->string('gender')->nullable();
            $table->string('contact_no')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('address')->nullable();
            $table->string('area')->nullable();
            $table->string('coordinates')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
};
