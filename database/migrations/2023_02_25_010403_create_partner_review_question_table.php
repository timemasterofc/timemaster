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
        Schema::create('partner_review_question', function (Blueprint $table) {
            $table->foreignId('partner_review_id')->constrained('partner_reviews');
            $table->foreignId('question_id')->constrained('questions');
            $table->integer('note');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('partner_review_question');
    }
};
