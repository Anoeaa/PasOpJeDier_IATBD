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
        Schema::create('applications', function (Blueprint $table) {
            $table->id('application_id')->unique();
            $table->foreignId('owner');
            $table->foreign('owner')->references('owner')->on('animals')->onDelete('cascade');
            $table->foreignId('applicant');
            $table->foreign('applicant')->references('id')->on('users')->onDelete('cascade');
            $table->string('applicant_name');
            $table->foreignId('animal');
            $table->foreign('animal')->references('animal_id')->on('animals')->onDelete('cascade');
            $table->string('animal_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function(Blueprint $table){
            $table->dropForeign('applications_owner_foreign');
            $table->dropForeign('applications_applicant_foreign');
            $table->dropForeign('applications_animal_foreign');
        });

        Schema::dropIfExists('applications');
    }
};
