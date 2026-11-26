<?php

namespace Tests\Feature;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\LearningMaterial;
use App\Models\LiveClass;
use App\Models\Mentor;
use App\Models\NewsletterSubscriber;
use App\Models\PlatformUpdate;
use App\Models\Program;
use App\Models\QuestionModule;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Voucher;
use Database\Seeders\CmsContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CmsTest extends TestCase
{
    use RefreshDatabase;

    private User $admin;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CmsContentSeeder::class);
        $this->admin = User::where('email', 'admin@jialearning.app')->firstOrFail();
    }

    public function test_admin_routes_require_authentication_and_admin_role(): void
    {
        $this->get('/admin')->assertRedirect(route('admin.login'));

        $regularUser = User::factory()->create(['is_admin' => false]);

        $this->actingAs($regularUser)
            ->get('/admin')
            ->assertStatus(403);
    }

    public function test_admin_can_login_and_view_dashboard(): void
    {
        $this->post('/admin/login', [
            'email' => 'admin@jialearning.app',
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->get('/admin')
            ->assertStatus(200)
            ->assertSee('Dashboard Pengelolaan Konten');
    }

    public function test_stale_csrf_on_admin_login_redirects_cleanly(): void
    {
        $handler = app(\Illuminate\Contracts\Debug\ExceptionHandler::class);
        $request = \Illuminate\Http\Request::create('/admin/login', 'POST', [
            'email' => 'admin@jialearning.app',
        ]);

        $response = $handler->render($request, new \Illuminate\Session\TokenMismatchException('CSRF token mismatch.'));

        $this->assertEquals(302, $response->getStatusCode());
        $this->assertEquals(route('admin.login'), $response->headers->get('Location'));
    }

    public function test_admin_can_update_site_settings_and_reflect_on_public_page(): void
    {
        $this->actingAs($this->admin)
            ->put(route('admin.settings.update'), [
                'settings' => [
                    'hero_badge' => 'Gelombang Spesial CMS',
                    'stat_schools' => '450+',
                    'promo_active' => '1',
                    'topbar_badge' => 'PROMO CMS',
                    'topbar_text' => 'Promo Terbaru dari CMS',
                    'topbar_voucher' => 'CMS2026',
                ],
            ])
            ->assertRedirect(route('admin.settings.edit'));

        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Gelombang Spesial CMS')
            ->assertSee('450+')
            ->assertSee('Promo Terbaru dari CMS');
    }

    public function test_admin_can_manage_cms_resources_and_public_views_reflect_changes(): void
    {
        $this->actingAs($this->admin);

        // Programs
        $this->post(route('admin.programs.store'), [
            'title' => 'Paket Olimpiade Sains',
            'category' => 'bimbingan_ujian',
            'badge_text' => 'Eksklusif',
            'icon' => '🔬',
            'description' => 'Program persiapan OSN intensif.',
            'features_text' => "Pembinaan Harian\nTryout Khusus",
            'cta_label' => 'Gabung Olimpiade',
            'is_active' => '1',
        ])->assertRedirect(route('admin.programs.index'));

        // Articles
        $this->post(route('admin.articles.store'), [
            'title' => 'Panduan Juara OSN Matematika',
            'category' => 'konsep',
            'excerpt' => 'Ringkasan strategi belajar OSN.',
            'content' => '<p>Konten lengkap artikel CMS.</p>',
            'author_name' => 'Tim Jia CMS',
            'read_time' => '4 Menit Baca',
            'published_date_label' => '26 Nov 2026',
            'video_url' => 'https://www.youtube.com/watch?v=GsnANfe4UQw',
            'is_published' => '1',
        ])->assertRedirect(route('admin.articles.index'));

        // Platform Updates
        $this->post(route('admin.updates.store'), [
            'version_badge' => 'Versi 2.5.0',
            'release_date_label' => 'November 2026',
            'title' => 'Rilis Integrasi CMS Baru',
            'summary' => 'Semua konten kini dikelola dinamis.',
            'tags_text' => 'CMS Terpadu',
            'is_published' => '1',
        ])->assertRedirect(route('admin.updates.index'));

        // Mentors
        $this->post(route('admin.mentors.store'), [
            'name' => 'Kak Dimas, M.Mat.',
            'subject' => 'Mentor Olimpiade',
            'campus' => 'Universitas Airlangga',
            'avatar_emoji' => '👨‍🏫',
            'quote' => 'Logika selalu menang.',
            'achievements_text' => 'Medali Emas Olimpiade',
            'show_on_beranda' => '1',
            'show_on_materi' => '1',
            'is_active' => '1',
        ])->assertRedirect(route('admin.mentors.index'));

        // Testimonials
        $this->post(route('admin.testimonials.store'), [
            'name' => 'Budi Santoso',
            'role' => 'Siswa SMA N 2',
            'quote' => 'Sangat membantu persiapan TKA!',
            'rating' => 5,
            'is_active' => '1',
        ])->assertRedirect(route('admin.testimonials.index'));

        // Learning Materials
        $this->post(route('admin.materials.store'), [
            'subject' => 'matematika',
            'level_tag' => 'sma',
            'badge' => 'Trigonometri',
            'title' => 'Identitas Trigonometri Dasar',
            'description' => 'Pembahasan sinus cosinus tangen.',
            'video_count' => 4,
            'quiz_count' => 10,
            'is_active' => '1',
        ])->assertRedirect(route('admin.materials.index'));

        // Question Modules
        $this->post(route('admin.question-modules.store'), [
            'category_badge' => 'SMA • Kalkulus',
            'hots_level' => '★ HOTS Level 3',
            'title' => 'Limit & Turunan Fungsi',
            'description' => 'Latihan soal kalkulus aplikatif.',
            'question_count' => 20,
            'duration_minutes' => 30,
            'is_active' => '1',
        ])->assertRedirect(route('admin.question-modules.index'));

        // Live Classes
        $this->post(route('admin.live-classes.store'), [
            'day_badge' => 'MINGGU',
            'badge_color' => 'purple',
            'time_label' => '14.00 WIB',
            'title' => 'Bedah Soal UTBK Campuran',
            'mentor_name' => 'Mentor: Kak Dimas',
            'quota_label' => 'Sisa 5 Kursi',
            'cta_label' => 'Gabung',
            'is_active' => '1',
        ])->assertRedirect(route('admin.live-classes.index'));

        // FAQs
        $this->post(route('admin.faqs.store'), [
            'section' => 'adaptive-test',
            'question' => 'Apakah tes bisa diulang?',
            'answer' => 'Bisa diulang kapan saja.',
            'is_active' => '1',
        ])->assertRedirect(route('admin.faqs.index'));

        // Features
        $this->post(route('admin.features.store'), [
            'icon' => '🧠',
            'title' => 'Peta Konsep Cerdas',
            'description' => 'Ringkasan visual otomatis.',
            'is_active' => '1',
        ])->assertRedirect(route('admin.features.index'));

        // Verify all created CMS items render on the public site
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('Paket Olimpiade Sains')
            ->assertSee('Panduan Juara OSN Matematika')
            ->assertSee('Rilis Integrasi CMS Baru')
            ->assertSee('Kak Dimas, M.Mat.')
            ->assertSee('Budi Santoso')
            ->assertSee('Identitas Trigonometri Dasar')
            ->assertSee('Limit & Turunan Fungsi')
            ->assertSee('Bedah Soal UTBK Campuran')
            ->assertSee('Apakah tes bisa diulang?')
            ->assertSee('Peta Konsep Cerdas');

        // Verify database persistence counts increased
        $this->assertTrue(Program::where('title', 'Paket Olimpiade Sains')->exists());
        $this->assertTrue(Article::where('title', 'Panduan Juara OSN Matematika')->exists());
        $this->assertTrue(PlatformUpdate::where('title', 'Rilis Integrasi CMS Baru')->exists());
        $this->assertTrue(Mentor::where('name', 'Kak Dimas, M.Mat.')->exists());
        $this->assertTrue(Testimonial::where('name', 'Budi Santoso')->exists());
        $this->assertTrue(LearningMaterial::where('title', 'Identitas Trigonometri Dasar')->exists());
        $this->assertTrue(QuestionModule::where('title', 'Limit & Turunan Fungsi')->exists());
        $this->assertTrue(LiveClass::where('title', 'Bedah Soal UTBK Campuran')->exists());
        $this->assertTrue(Faq::where('question', 'Apakah tes bisa diulang?')->exists());
        $this->assertTrue(Feature::where('title', 'Peta Konsep Cerdas')->exists());
    }

    public function test_voucher_validation_and_subscriber_export_work(): void
    {
        $this->actingAs($this->admin)
            ->post(route('admin.vouchers.store'), [
                'code' => 'PROMOCMS50',
                'discount_label' => 'Diskon 50%',
                'description' => 'Promo khusus tes.',
                'is_active' => '1',
            ])
            ->assertRedirect(route('admin.vouchers.index'));

        $this->assertTrue(Voucher::where('code', 'PROMOCMS50')->exists());

        $this->postJson(route('voucher.validate'), ['code' => 'promocms50'])
            ->assertStatus(200)
            ->assertJson([
                'valid' => true,
                'code' => 'PROMOCMS50',
            ]);

        $this->postJson(route('voucher.validate'), ['code' => 'TIDAKADA'])
            ->assertStatus(404)
            ->assertJson(['valid' => false]);

        NewsletterSubscriber::create(['email' => 'export@example.com', 'subscribed_at' => now()]);

        $this->actingAs($this->admin)
            ->get(route('admin.subscribers.export'))
            ->assertStatus(200)
            ->assertHeader('Content-Type', 'text/csv; charset=UTF-8');
    }
}
