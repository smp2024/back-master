<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarouselsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carousels', function (Blueprint $table) {
            $table->increments('id');

            $table->string  ('name')        ->nullable();
            $table->string  ('slug')        ->unique()->nullable();
            $table->string  ('file_path')        ->nullable();
            $table->string  ('file')        ->nullable();
            $table->string  ('mobil')        ->nullable();
            $table->text    ('url')         ->nullable();
            $table->integer('status')->default('0');
            $table->integer('type')->nullable();
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
        Schema::dropIfExists('carousels');
    }
}
