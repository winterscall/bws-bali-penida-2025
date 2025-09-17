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
        Schema::table('site_menus', function (Blueprint $table) {
            $table->string('value_link_route', 500)->nullable()->change();
            $table->string('value_external_url', 500)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('site_menus', function (Blueprint $table) {
            $table->string('value_link_route', 500)->change();
            $table->string('value_external_url', 500)->change();
        });
    }
};
