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
            $table->string('ccategory_description')->after('cfor');
            $table->string('ctype')->after('ccategory_description');
            $table->double('cprice', 10, 2)->after('ctype');
            $table->double('csize', 10, 2)->after('cprice');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('submitted_property', function (Blueprint $table) {
            $table->dropColumn(['ccategory_description', 'ctype', 'cprice', 'csize']);
        });
    }
};
