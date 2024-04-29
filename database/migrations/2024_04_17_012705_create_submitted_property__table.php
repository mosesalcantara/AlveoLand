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
        Schema::create('submitted_property', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id');
            $table->string('cproject');
            $table->string('cunit_no');
            $table->string('cfor');
            $table->string('cstatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submitted_property_');
    }
};
