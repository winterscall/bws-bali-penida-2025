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
        Schema::create('digital_media', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('type');
            $table->string('title', 500);
            $table->string('cover_path', 500);

            $table->string('attachment_path', 500)->nullable();
            $table->string('url', 500)->nullable();

            $table->timestamps();
            $table->foreignUlid('created_by')->nullable();
            $table->foreignUlid('updated_by')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_media');
    }
};
