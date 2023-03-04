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
        Schema::create('week_configuration', function (Blueprint $table) {
            $table->foreignId('week_id')->constrained('weeks');
            $table->foreignId('configuration_id')->constrained('configurations');
            $table->time('office_start');
            $table->time('office_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('week_configuration');
    }
};
