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
        Schema::create('site_menus', function (Blueprint $table) {
            $table->ulid('id')->primary();

            $table->string('type');
            $table->foreignUlid('parent_id')->nullable();

            $table->string('title', 500);

            $table->string('link_type');

            $table->string('value_link_route', 500);
            $table->foreignUlid('value_page_id')->nullable();
            $table->string('value_external_url', 500);

            $table->unsignedInteger('index')->default(1);

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
        Schema::dropIfExists('site_menus');
    }
};
