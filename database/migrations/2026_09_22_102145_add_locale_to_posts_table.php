<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('locale', 5)->default('en')->after('slug');
            $table->string('translation_key')->nullable()->after('locale');

            $table->index(['locale', 'status', 'published_at']);
            $table->index('translation_key');
        });

        // Slug is unique per locale, not globally.
        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique(['slug']);
            $table->unique(['locale', 'slug']);
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropUnique(['locale', 'slug']);
            $table->dropIndex(['locale', 'status', 'published_at']);
            $table->dropIndex(['translation_key']);
            $table->dropColumn(['locale', 'translation_key']);
            $table->unique('slug');
        });
    }
};
