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
        Schema::create('routers', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->string('name');
            $table->boolean('status')->default(false);
            $table->string('domain')->nullable();
            $table->string('port_no')->nullable();
            $table->string('username')->nullable();
            $table->string('password')->nullable();
            $table->string('query_time')->nullable();
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
        Schema::dropIfExists('routers');
    }
};
