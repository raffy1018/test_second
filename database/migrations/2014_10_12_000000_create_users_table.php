<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->bigInteger('router_id')->nullable();
            $table->string('account_no')->nullable();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('email')->unique();

            $table->string('password');
            $table->boolean('is_super_admin')->default(false);

            $table->boolean('is_active')->default(true);
            $table->rememberToken();
            $table->timestamp('last_login_at')->nullable();

            $table->string('gender')->nullable();
            $table->string('contact_no')->nullable();
            $table->date('birth_date')->nullable();

            $table->dateTime('deleted_at')->nullable();
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
        Schema::dropIfExists('users');
    }
}
