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
        Schema::create('visitation', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('contact');
            $table->date('date');
            $table->time('time');
            $table->string('email');
            $table->foreignId('unit_id');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visitation');
    }
};
