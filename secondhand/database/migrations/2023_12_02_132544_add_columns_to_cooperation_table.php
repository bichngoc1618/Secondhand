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
        Schema::table('cooperation', function (Blueprint $table) {
            $table->string('name',300);
            $table->string('logo',500);
            $table->enum('visible', ['visible', 'hidden'])->default('hidden');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cooperation', function (Blueprint $table) {
            //
        });
    }
};
