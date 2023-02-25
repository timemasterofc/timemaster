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
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->enum('person_type', ['PF', 'PJ'])->default('PF');
            $table->boolean('provider')->default(false);
            $table->string('social_reason');
            $table->string('fantasy_name')->nullable();
            $table->string('document');
            $table->string('name_representative')->nullable();
            $table->string('document_representative')->nullable();
            $table->float('average_rating');
            $table->integer('total_followers');
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
        Schema::dropIfExists('partners');
    }
};
