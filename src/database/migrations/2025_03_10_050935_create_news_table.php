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
        Schema::create('news', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('title', 500);
            $table->string('slug', 500);
            $table->string('excerpt', 500);
            $table->text('content')->nullable();

            $table->string('featured_image_path', 500) ->nullable();
            $table->string('featured_image_description', 500)->nullable();

            $table->foreignUlid('news_type_id');
            $table->timestamp('published_at')->nullable();

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
        Schema::dropIfExists('news');
    }
};
