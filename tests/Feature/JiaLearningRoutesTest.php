<?php

namespace Tests\Feature;

use App\Services\JiaContentService;
use Database\Seeders\CmsContentSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class JiaLearningRoutesTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->seed(CmsContentSeeder::class);
    }

    public function test_home_page_renders_successfully_with_all_sections_and_assets(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Tembus SMA Impian');
        $response->assertSee('JIA');
        $response->assertSee('/images/jia_logo.png', false);
        $response->assertSee('/images/mentor_azzam.jpg', false);
        $response->assertSee('/images/book_amazing_tka.jpg', false);

        foreach (JiaContentService::VALID_VIEWS as $viewId) {
            $response->assertSee('id="view-' . $viewId . '"', false);
        }

        // Dynamic datasets rendered from CMS
        $response->assertSee('Tiga Pilar Utama Kesiapan TKA');
        $response->assertSee('Kak Azzam, S.Si.');
        $response->assertSee('Kak Jingga, M.Pd.');
        $response->assertDontSee('Kak Nabila, S.Hum.');
        $response->assertDontSee('Kak Rizky, M.Sc.');
        $response->assertSee('CBT Pro Target SMA');

        // YouTube video integration from @Jia.Learning
        $response->assertSee('@Jia.Learning');
        $response->assertSee('videoPlayerIframe');

        // CMS remains completely hidden from public UI
        $response->assertDontSee('/admin/login', false);
        $response->assertDontSee('CMS Admin', false);
    }

    public function test_all_direct_page_routes_return_200_and_set_initial_view(): void
    {
        foreach (JiaContentService::VALID_VIEWS as $viewId) {
            $response = $this->get('/' . $viewId);

            $response->assertStatus(200);
            $response->assertSee('const initialView = "' . $viewId . '"', false);
        }

        $blogResponse = $this->get('/blog');
        $blogResponse->assertStatus(200);
        $blogResponse->assertSee('const initialView = "pahami-materi"', false);
    }

    public function test_unknown_page_returns_404(): void
    {
        $this->get('/halaman-tidak-ditemukan')->assertStatus(404);
    }

    public function test_newsletter_subscription_endpoint_validates_and_persists(): void
    {
        $this->postJson('/newsletter', ['email' => 'not-an-email'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['email']);

        $this->postJson('/newsletter', ['email' => 'Siswa@Example.com'])
            ->assertStatus(200)
            ->assertJson([
                'status' => 'success',
                'email' => 'siswa@example.com',
            ]);

        $this->assertDatabaseHas('newsletter_subscribers', [
            'email' => 'siswa@example.com',
        ]);
    }
}
