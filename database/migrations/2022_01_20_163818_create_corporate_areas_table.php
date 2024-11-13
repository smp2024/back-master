<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCorporateAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('corporate_areas', function (Blueprint $table) {
            $table->id();
            $table->string  ('orden')                    ->nullable();
            $table->string  ('orden_dash')                    ->nullable();
            $table->string  ('icon')                    ->nullable();
            $table->string  ('company_name')                    ->nullable();
            $table->string  ('name')                    ->nullable();
            $table->string  ('slug')                    ->unique()->nullable();
            $table->string  ('file_path')               ->nullable();
            $table->string  ('file')                    ->nullable();
            $table->text    ('status')             ->nullable();
            $table->text    ('description')             ->nullable();
            $table->text    ('direction')               ->nullable();
            $table->string  ('phone')                   ->nullable();
            $table->string  ('phone2')                   ->nullable();
            $table->string  ('email')                   ->nullable();
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
        Schema::dropIfExists('corporate_areas');
    }
}
