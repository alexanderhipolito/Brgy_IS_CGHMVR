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
    Schema::table('residents', function (Blueprint $table) {
        // We add the column after 'is_voter'
        $table->string('contact_number')->nullable()->after('is_voter');
    });
}

public function down(): void
{
    Schema::table('residents', function (Blueprint $table) {
        $table->dropColumn('contact_number');
    });
}
};
