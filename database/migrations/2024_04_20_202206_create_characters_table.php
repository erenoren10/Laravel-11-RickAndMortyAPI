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
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['Dead', 'Alive', 'unknown']);
            $table->string('species');
            $table->string('type')->nullable();
            $table->string('gender');
            $table->string('origin_name')->nullable();
            $table->string('origin_url')->nullable();
            $table->string('location_name')->nullable();
            $table->string('location_url')->nullable();
            $table->string('image');
            $table->json('episode');
            $table->string('url');
            $table->string('created');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characters');
    }
};
