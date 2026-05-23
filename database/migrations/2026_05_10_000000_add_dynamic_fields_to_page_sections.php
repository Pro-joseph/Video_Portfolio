<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->string('button_text')->nullable()->after('body');
            $table->string('button_link')->nullable()->after('button_text');
            $table->integer('order')->default(0)->after('button_link');
            $table->boolean('is_visible')->default(true)->after('order');
            $table->json('extras')->nullable()->after('is_visible');
        });
    }

    public function down(): void
    {
        Schema::table('page_sections', function (Blueprint $table) {
            $table->dropColumn(['button_text', 'button_link', 'order', 'is_visible', 'extras']);
        });
    }
};