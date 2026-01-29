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
    Schema::create('residents', function (Blueprint $table) {
        $table->id();
        $table->string('first_name');
        $table->string('middle_name')->nullable();
        $table->string('last_name');
        $table->string('suffix')->nullable();
        $table->date('birthdate');
        $table->string('birthplace')->nullable();
        $table->string('gender');
        $table->string('civil_status');
        $table->string('citizenship')->default('Filipino');
        $table->string('occupation')->nullable();
        $table->boolean('is_voter')->default(false);
        $table->string('contact_number')->nullable(); // SIGURADUHING NANDITO ITO
        $table->string('household_id')->nullable();
        $table->text('address');
        $table->string('home_ownership');
        $table->boolean('is_family_head')->default(false);
        $table->timestamps();
    });
}
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residents');
    }
};
