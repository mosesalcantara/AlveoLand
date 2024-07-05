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
        Schema::table('submitted_property', function (Blueprint $table) {
            $table->dropColumn('cproject');
            $table->foreignId('property_id')->after('client_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('submitted_property', function (Blueprint $table) {
            $table->string('cproject')->after('client_id');
            $table->dropColumn('property_id');
        });
    }
};
