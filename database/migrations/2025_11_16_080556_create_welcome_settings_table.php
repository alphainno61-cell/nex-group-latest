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
        Schema::create('welcome_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_title')->default('NEX GROUP');
            $table->string('hero_letter')->default('N');
            $table->string('hero_text')->default('is for NEX');
            $table->text('hero_description')->nullable();
            $table->string('signature_image')->nullable();
            $table->string('founder_name')->default('Engr. Mohammad Shahrair Khan');
            $table->string('founder_title')->nullable();
            $table->string('investor_link')->nullable();
            $table->string('logo_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('welcome_settings');
    }
};
