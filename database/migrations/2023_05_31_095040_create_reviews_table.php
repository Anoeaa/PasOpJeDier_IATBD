<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reviewed');
            $table->foreign('reviewed')->references('id')->on('users');
            $table->string('reviewer');
            $table->foreign('reviewer')->references('name')->on('users');
            $table->integer('rating');
            $table->text('comment')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reviews', function (Blueprint $table){
            $table->dropForeign('reviews_reviewed_foreign');
            $table->dropForeign('reviews_reviewer_foreign');
        });

        Schema::dropIfExists('reviews');
    }
};
