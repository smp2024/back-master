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
            $table->bigIncrements('id');
            $table->string('role')->nullable();
            $table->integer('status')->default('0');
            $table->string('file_path')->nullable();
            $table->string('file')->nullable();
            $table->string('avatar')->nullable();
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->date('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('email', 128)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('password_code')->nullable();
            $table->string('verification_code')->nullable();
            $table->text('permissions')->nullable();
            $table->rememberToken();
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
