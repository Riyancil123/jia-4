<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('group')->default('general')->index();
            $table->string('label');
            $table->string('type')->default('text');
            $table->text('value')->nullable();
            $table->timestamps();
        });

        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('bimbingan_ujian')->index();
            $table->string('badge_text')->nullable();
            $table->string('icon', 20)->default('🎯');
            $table->string('duration_label')->nullable();
            $table->string('price_label')->nullable();
            $table->text('description');
            $table->json('features')->nullable();
            $table->string('cta_label')->default('Daftar Sekarang');
            $table->string('cta_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('category')->default('utbk')->index();
            $table->string('category_label');
            $table->text('excerpt');
            $table->longText('content');
            $table->string('author_name');
            $table->string('author_role')->nullable();
            $table->string('read_time')->default('5 Menit Baca');
            $table->string('published_date_label')->nullable();
            $table->string('thumbnail')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('platform_updates', function (Blueprint $table) {
            $table->id();
            $table->string('version_badge');
            $table->string('status_badge')->nullable();
            $table->string('release_date_label');
            $table->string('title');
            $table->text('summary');
            $table->json('tags')->nullable();
            $table->string('cta_label')->nullable();
            $table->string('cta_view')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_published')->default(true);
            $table->timestamps();
        });

        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('subject');
            $table->string('campus');
            $table->string('avatar_emoji', 20)->default('👩‍🏫');
            $table->string('photo')->nullable();
            $table->text('quote')->nullable();
            $table->json('achievements')->nullable();
            $table->boolean('show_on_beranda')->default(false);
            $table->boolean('show_on_materi')->default(true);
            $table->boolean('show_on_blog')->default(false);
            $table->boolean('is_featured')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('role');
            $table->text('quote');
            $table->unsignedTinyInteger('rating')->default(5);
            $table->string('avatar_initial', 4)->default('S');
            $table->boolean('is_highlighted')->default(false);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('learning_materials', function (Blueprint $table) {
            $table->id();
            $table->string('subject')->default('matematika')->index();
            $table->string('level_tag')->default('smp')->index();
            $table->string('badge');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('video_count')->default(0);
            $table->unsignedInteger('quiz_count')->default(0);
            $table->string('difficulty_label')->nullable();
            $table->string('cta_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('question_modules', function (Blueprint $table) {
            $table->id();
            $table->string('category_badge');
            $table->string('hots_level')->default('★ HOTS Level 2');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('question_count')->default(15);
            $table->unsignedInteger('duration_minutes')->default(25);
            $table->string('cta_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('live_classes', function (Blueprint $table) {
            $table->id();
            $table->string('day_badge');
            $table->string('badge_color')->default('rose');
            $table->string('time_label');
            $table->string('title');
            $table->string('mentor_name');
            $table->string('quota_label');
            $table->string('cta_label')->default('Gabung Sesi');
            $table->string('cta_url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('section')->default('adaptive-test')->index();
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('features', function (Blueprint $table) {
            $table->id();
            $table->string('icon', 20)->default('✨');
            $table->string('title');
            $table->text('description');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique();
            $table->string('discount_label');
            $table->string('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->date('expires_at')->nullable();
            $table->timestamps();
        });

        Schema::create('newsletter_subscribers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->timestamp('subscribed_at')->useCurrent();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('newsletter_subscribers');
        Schema::dropIfExists('vouchers');
        Schema::dropIfExists('features');
        Schema::dropIfExists('faqs');
        Schema::dropIfExists('live_classes');
        Schema::dropIfExists('question_modules');
        Schema::dropIfExists('learning_materials');
        Schema::dropIfExists('testimonials');
        Schema::dropIfExists('mentors');
        Schema::dropIfExists('platform_updates');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('programs');
        Schema::dropIfExists('site_settings');
    }
};
