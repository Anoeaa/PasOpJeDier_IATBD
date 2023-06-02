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
        Schema::create('animals', function (Blueprint $table) {
            $table->id('animal_id')->unique();
            $table->foreignId('owner');
            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->integer('age');
            $table->string('location');
            $table->string('name');
            $table->string('breed');
            $table->foreign('breed')->references('breed')->on('species')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('salary');
            $table->time('from_time')->nullable();
            $table->time('to_time')->nullable();
            $table->string('comment')->nullable();
            $table->text('image');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('animals', function(Blueprint $table){
            $table->dropForeign('animals_owner_foreign');
            $table->dropForeign('animals_breed_foreign');
        });

        Schema::dropIfExists('animals');
    }
};
