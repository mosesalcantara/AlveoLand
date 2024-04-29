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
        Schema::create('project_units', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_properties_id');
            $table->string('project_unit_no');
            $table->string('project_unit_banner');
            $table->string('project_unit_type');
            $table->string('project_unit_price');
            $table->string('project_unit_category_type');
            $table->string('project_unit_category_description');
            $table->string('project_unit_size');
            $table->string('project_unit_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_units');
    }
};
