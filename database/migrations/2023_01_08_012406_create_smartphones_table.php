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
        Schema::create('smartphones', function (Blueprint $table) {
            $table->id();
            $table->string('model_name')->unique();
            $table->text('description')->nullable();
            $table->string('color');
            $table->double('price');
            $table->string('battery');
            $table->foreignId('manufacturer_id');
            $table->foreignId('processor_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('smartphones');
    }
};
