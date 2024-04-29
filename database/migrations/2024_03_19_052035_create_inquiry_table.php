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
        Schema::create('inquiry', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('type_of_inquiry');
            $table->string('identicality');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('age');
            $table->string('email');
            $table->string('phone_num');
            $table->text('message');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiry');
    }
};
