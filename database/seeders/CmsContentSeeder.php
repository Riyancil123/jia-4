<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\LearningMaterial;
use App\Models\LiveClass;
use App\Models\Mentor;
use App\Models\PlatformUpdate;
use App\Models\Program;
use App\Models\QuestionModule;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use App\Models\User;
use App\Models\Voucher;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CmsContentSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedAdminUser();
        $this->seedSiteSettings();
        $this->seedPrograms();
        $this->seedArticles();
        $this->seedPlatformUpdates();
        $this->seedMentors();
        $this->seedTestimonials();
        $this->seedLearningMaterials();
        $this->seedQuestionModules();
        $this->seedLiveClasses();
        $this->seedFaqs();
        $this->seedFeatures();
        $this->seedVouchers();
    }

    private function seedAdminUser(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@jialearning.app'],
            [
                'name' => 'Admin JIA Learning',
                'password' => Hash::make('password'),
                'is_admin' => true,
                'email_verified_at' => now(),
            ]
        );
    }

    private function seedSiteSettings(): void
    {
        $settings = [
            // General & Contact
            ['key' => 'site_name', 'group' => 'general', 'label' => 'Nama Platform', 'type' => 'text', 'value' => 'JIA Learning'],
            ['key' => 'site_tagline', 'group' => 'general', 'label' => 'Judul Meta / Tagline', 'type' => 'text', 'value' => 'JIA Learning - Tembus SMA Impian Tanpa Bingung Hafalan Rumus'],
            ['key' => 'company_name', 'group' => 'general', 'label' => 'Nama Badan Usaha', 'type' => 'text', 'value' => 'PT JIA ACADEMY CENTER'],
            ['key' => 'company_address', 'group' => 'general', 'label' => 'Domisili / Alamat', 'type' => 'textarea', 'value' => 'Kabupaten Banyuwangi, Jawa Timur, Indonesia'],
            ['key' => 'company_business_field', 'group' => 'general', 'label' => 'Bidang Usaha', 'type' => 'text', 'value' => 'Bimbingan Belajar Persiapan TKA SMP/MTs Menuju SMA Unggulan.'],
            ['key' => 'whatsapp_number', 'group' => 'contact', 'label' => 'Nomor WhatsApp CS (628xxx)', 'type' => 'text', 'value' => '6285196906349'],
            ['key' => 'support_email', 'group' => 'contact', 'label' => 'Email Customer Support', 'type' => 'text', 'value' => 'azzam@jialearning.com'],
            ['key' => 'webapp_url', 'group' => 'contact', 'label' => 'URL Web App Utama', 'type' => 'url', 'value' => 'https://wa.me/6285196906349'],
            ['key' => 'lms_url', 'group' => 'contact', 'label' => 'URL Portal LMS / Pendaftaran', 'type' => 'url', 'value' => 'https://wa.me/6285196906349'],
            ['key' => 'footer_description', 'group' => 'general', 'label' => 'Deskripsi Footer', 'type' => 'textarea', 'value' => 'Pendamping belajar yang serius untuk hasil TKA yang nyata. Bimbingan intensif persiapan TKA SMP/MTs menuju SMA unggulan berstandar nasional.'],

            // Promo & Topbar
            ['key' => 'promo_active', 'group' => 'promo', 'label' => 'Aktifkan Banner Promo Topbar & Sticky Bar', 'type' => 'boolean', 'value' => '1'],
            ['key' => 'topbar_badge', 'group' => 'promo', 'label' => 'Badge Promo Topbar', 'type' => 'text', 'value' => 'TRY OUT CBT 2027'],
            ['key' => 'topbar_text', 'group' => 'promo', 'label' => 'Teks Promo Topbar', 'type' => 'text', 'value' => 'Simulasi CBT SMA Unggulan Seri 1 — Kuota Terbatas!'],
            ['key' => 'topbar_voucher', 'group' => 'promo', 'label' => 'Kode Voucher Topbar', 'type' => 'text', 'value' => 'TKAJUARA'],
            ['key' => 'promo_banner_code', 'group' => 'promo', 'label' => 'Kode Promo Paket Belajar', 'type' => 'text', 'value' => 'BONUSTKA2027'],
            ['key' => 'promo_banner_title', 'group' => 'promo', 'label' => 'Judul Banner Promo Paket', 'type' => 'text', 'value' => 'Bonus Spesial Paket Belajar'],
            ['key' => 'promo_banner_desc', 'group' => 'promo', 'label' => 'Deskripsi Banner Promo Paket', 'type' => 'textarea', 'value' => 'Bank 1.500+ Soal HOTS & Video Bedah Soal lengkap bersama mentor juara nasional.'],

            // Hero & Stats
            ['key' => 'hero_badge', 'group' => 'hero', 'label' => 'Badge Hero Beranda', 'type' => 'text', 'value' => 'Bimbingan Belajar Persiapan TKA SMP/MTs Terbaik'],
            ['key' => 'hero_title_line1', 'group' => 'hero', 'label' => 'Judul Hero Baris 1', 'type' => 'text', 'value' => 'Tembus SMA Impian'],
            ['key' => 'hero_title_highlight', 'group' => 'hero', 'label' => 'Judul Hero Highlight', 'type' => 'text', 'value' => 'Tanpa Bingung'],
            ['key' => 'hero_title_line2', 'group' => 'hero', 'label' => 'Judul Hero Baris 2', 'type' => 'text', 'value' => 'Hafalan Rumus.'],
            ['key' => 'hero_description', 'group' => 'hero', 'label' => 'Deskripsi Hero Beranda', 'type' => 'textarea', 'value' => 'Bimbingan intensif persiapan TKA SMP/MTs menuju SMA unggulan. Materi terstruktur, latihan soal HOTS, dan simulasi CBT adaptif berbasis kurikulum terbaru.'],
            ['key' => 'stat_schools', 'group' => 'hero', 'label' => 'Statistik Sekolah / Modul', 'type' => 'text', 'value' => '100+'],
            ['key' => 'stat_rating', 'group' => 'hero', 'label' => 'Statistik Rating', 'type' => 'text', 'value' => '4.9/5.0'],
            ['key' => 'stat_students', 'group' => 'hero', 'label' => 'Statistik Siswa Terbimbing', 'type' => 'text', 'value' => '850+'],
            ['key' => 'stat_pass_rate', 'group' => 'hero', 'label' => 'Tingkat Kelulusan Target SMA', 'type' => 'text', 'value' => '94.8%'],
        ];

        foreach ($settings as $item) {
            SiteSetting::updateOrCreate(
                ['key' => $item['key']],
                $item
            );
        }
    }

    private function seedPrograms(): void
    {
        $programs = [
            [
                'title' => 'TKA Starter Class',
                'slug' => 'tka-starter-class',
                'category' => 'modul_sekolah',
                'badge_text' => 'BELAJAR MANDIRI',
                'icon' => 'book',
                'duration_label' => 'Akses 12 Bulan',
                'price_label' => 'Rp 299.000 / paket',
                'description' => 'Cocok untuk siswa mandiri yang ingin belajar sesuai ritme sendiri dengan materi terarah dan modul digital interaktif.',
                'features' => [
                    '100+ Video Materi Konseptual',
                    'E-Planner Sukses Mandiri TKA',
                    'Bank 1.500+ Latihan Soal HOTS',
                    'Akses Platform Belajar 12 Bulan',
                ],
                'cta_label' => 'Pilih Paket Mandiri',
                'cta_url' => 'https://wa.me/6285196906349?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20daftar%20Paket%20Starter%20Class',
                'is_featured' => false,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'CBT Pro Target SMA',
                'slug' => 'cbt-pro-target-sma',
                'category' => 'bimbingan_ujian',
                'badge_text' => 'SIMULASI CBT ADAPTIF',
                'icon' => 'monitor',
                'duration_label' => '12x Try Out Real CBT',
                'price_label' => 'Rp 449.000 / paket',
                'description' => 'Simulasi CBT 100% mirip antarmuka tes seleksi asli dengan analisis kelemahan mendalam dan ranking nasional.',
                'features' => [
                    '12x Try Out Real Computer Based Test',
                    'Sistem Waktu & Timer Adaptif 90 Detik',
                    'Ranking Nasional & Peluang Masuk SMA',
                    'Pembahasan Video QR Tiap Butir Soal',
                ],
                'cta_label' => 'Daftar CBT Pro',
                'cta_url' => 'https://wa.me/6285196906349?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20daftar%20Paket%20CBT%20Pro',
                'is_featured' => true,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Master Class VIP',
                'slug' => 'master-class-vip',
                'category' => 'bimbingan_ujian',
                'badge_text' => 'INTENSIF INTERAKTIF',
                'icon' => 'award',
                'duration_label' => 'Pendampingan Penuh',
                'price_label' => 'Rp 899.000 / program',
                'description' => 'Pendampingan penuh mentor juara nasional dari pemahaman konsep hingga hari ujian seleksi SMA unggulan.',
                'features' => [
                    '40+ Sesi Kelas Live Streaming Interaktif',
                    'Tanya PR/Soal 24/7 di Grup VIP Mentor',
                    'Termasuk Semua Akses 12x Try Out CBT',
                    'Bonus Buku Amazing TKA Dikirim ke Rumah',
                ],
                'cta_label' => 'Gabung Master Class',
                'cta_url' => 'https://wa.me/6285196906349?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20daftar%20Master%20Class%20VIP',
                'is_featured' => false,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'title' => 'Buku Amazing TKA SMP/MTs 2027',
                'slug' => 'buku-amazing-tka',
                'category' => 'modul_sekolah',
                'badge_text' => 'BUKU FISIK RESMI',
                'icon' => 'book-open',
                'duration_label' => '500+ Halaman',
                'price_label' => 'Rp 189.000 / buku',
                'description' => 'Buku fisik 500+ halaman berisi rangkuman materi lengkap, bedah konsep esensial, trik cepat soal HOTS, dan 5 paket prediksi.',
                'features' => [
                    'Buku Fisik Kertas Bookpaper 500+ Hal',
                    'Rangkuman Konsep Esensial Semua Bab',
                    '5 Paket Prediksi Soal Akurat TKA 2027',
                    'Video Pembahasan QR Code Per Nomor',
                ],
                'cta_label' => 'Beli Buku Fisik',
                'cta_url' => 'https://wa.me/6285196906349?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20pesan%20Buku%20Amazing%20TKA',
                'is_featured' => false,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::updateOrCreate(['slug' => $program['slug']], $program);
        }
    }

    private function seedArticles(): void
    {
        $articles = [
            [
                'slug' => 'liveclass-gratis-6-november',
                'title' => 'LIVECLASS GRATIS 6 NOVEMBER 2026',
                'category' => 'konsep',
                'category_label' => 'Live Class TKA',
                'excerpt' => 'Sesi live class interaktif persiapan TKA SMP/MTs bersama mentor juara nasional JIA Learning.',
                'content' => '<p>Sesi interaktif bedah strategi menghadapi seleksi TKA SMP/MTs menuju SMA Pradita Dirgantara dan Taruna Nusantara bersama para mentor juara.</p>',
                'author_name' => 'Kak Azzam, S.Si. & Kak Jingga, M.Pd.',
                'author_role' => 'Head Mentor JIA Learning',
                'read_time' => 'Live Class',
                'published_date_label' => '6 Nov 2026',
                'thumbnail' => 'https://i.ytimg.com/vi/GsnANfe4UQw/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=GsnANfe4UQw',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'slug' => 'bahas-soal-quiz-matematika-saluran',
                'title' => 'BAHAS SOAL QUIZ MATEMATIKA SALURAN | 1-10 November 2026',
                'category' => 'konsep',
                'category_label' => 'Matematika HOTS',
                'excerpt' => 'Pembahasan tuntas butir kuis matematika saluran dan trik cepat logika analitik TKA.',
                'content' => '<p>Bedah logika pengerjaan soal matematika saluran dengan pemahaman konsep akar rumus agar tidak panik saat ujian berlangsung.</p>',
                'author_name' => 'Kak Azzam, S.Si.',
                'author_role' => 'Head Mentor Matematika ITB',
                'read_time' => 'Bahas Soal',
                'published_date_label' => '10 Nov 2026',
                'thumbnail' => 'https://i.ytimg.com/vi/f3Ozya54-d4/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=f3Ozya54-d4',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'slug' => 'fun-quiz-pola-bilangan',
                'title' => 'FUN QUIZ - POLA BILANGAN',
                'category' => 'konsep',
                'category_label' => 'Pola Bilangan',
                'excerpt' => 'Asah pemahaman konsep pola bilangan dan deret bertingkat dengan cara seru dan aplikatif.',
                'content' => '<p>Pola angka dan visual deret geometri yang sering keluar di tes seleksi SMA Unggulan dianalisis secara sistematis.</p>',
                'author_name' => 'Kak Azzam, S.Si.',
                'author_role' => 'Head Mentor Matematika ITB',
                'read_time' => 'Fun Quiz',
                'published_date_label' => 'Video Baru',
                'thumbnail' => 'https://i.ytimg.com/vi/f3vSffQsHc4/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=f3vSffQsHc4',
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'slug' => 'bahas-soal-tpb-numerik-man-ic',
                'title' => 'BAHAS SOAL TPB NUMERIK - MASUK MAN IC',
                'category' => 'utbk',
                'category_label' => 'Numerik Seleksi',
                'excerpt' => 'Strategi jitu pengerjaan tes potensi belajar (TPB) penalaran numerik seleksi MAN IC dan SMA Unggulan.',
                'content' => '<p>Bedah soal numerik seleksi MAN Insan Cendekia: penalaran aritmatika, perbandingan bertingkat, dan logika kuantitatif.</p>',
                'author_name' => 'Kak Azzam, S.Si.',
                'author_role' => 'Head Mentor Matematika ITB',
                'read_time' => 'TPB Numerik',
                'published_date_label' => 'Populer',
                'thumbnail' => 'https://i.ytimg.com/vi/4wtSKWkY33k/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=4wtSKWkY33k',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'slug' => 'kumpulan-soal-geometri-part-1',
                'title' => 'KUMPULAN SOAL GEOMETRI PART 1 | TKA MATEMATIKA SMP/MTs',
                'category' => 'konsep',
                'category_label' => 'Geometri TKA',
                'excerpt' => 'Kupas tuntas variasi soal geometri bidang, kesebangunan, luas juring, dan bangun ruang level HOTS.',
                'content' => '<p>Pembahasan lengkap geometri dari sudut, translasi, bangun ruang, hingga manipulasi luas bidang datar.</p>',
                'author_name' => 'Kak Azzam, S.Si.',
                'author_role' => 'Head Mentor Matematika ITB',
                'read_time' => 'Geometri Part 1',
                'published_date_label' => 'Bedah Soal',
                'thumbnail' => 'https://i.ytimg.com/vi/0tbT04lk5Fo/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=0tbT04lk5Fo',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 5,
            ],
            [
                'slug' => 'kumpulan-soal-aljabar-part-1',
                'title' => 'KUMPULAN SOAL ALJABAR PART 1 | TKA MATEMATIKA SMP/MTs',
                'category' => 'konsep',
                'category_label' => 'Aljabar TKA',
                'excerpt' => 'Kumpulan soal aljabar esensial, sistem persamaan, dan manipulasi aljabar cepat tanpa panik.',
                'content' => '<p>SPLDV, faktorisasi kuadrat, dan penyederhanaan ekspresi aljabar tingkat lanjut yang wajib dikuasai.</p>',
                'author_name' => 'Kak Azzam, S.Si.',
                'author_role' => 'Head Mentor Matematika ITB',
                'read_time' => 'Aljabar Part 1',
                'published_date_label' => 'Bedah Soal',
                'thumbnail' => 'https://i.ytimg.com/vi/h-gM5ww_-QY/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=h-gM5ww_-QY',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 6,
            ],
            [
                'slug' => 'informasi-tersurat-bahasa-indonesia',
                'title' => 'INFORMASI TERSURAT - TKA BAHASA INDONESIA SMP/MTs',
                'category' => 'utbk',
                'category_label' => 'Literasi Sains & Bahasa',
                'excerpt' => 'Teknik scanning dan skimming teks wacana panjang untuk menemukan informasi tersurat dan tersirat.',
                'content' => '<p>Cara jitu menemukan ide pokok paragraf dan mengeliminasi opsi jawaban jebakan pada teks ujian literasi bahasa.</p>',
                'author_name' => 'Kak Jingga, M.Pd.',
                'author_role' => 'Head Mentor Sains UPI',
                'read_time' => 'Literasi Bahasa',
                'published_date_label' => 'Bedah Soal',
                'thumbnail' => 'https://i.ytimg.com/vi/-xjCvvhz7NE/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=-xjCvvhz7NE',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 7,
            ],
            [
                'slug' => '200-kata-bahasa-inggris-ujian',
                'title' => 'SERING MUNCUL DI UJIAN! Inilah 200 Kata Bahasa Inggris di Teks Ujian',
                'category' => 'utbk',
                'category_label' => 'Literasi Akademik',
                'excerpt' => 'Kosakata kunci yang wajib dikuasai untuk menaklukkan soal reading comprehension seleksi masuk SMA favorit.',
                'content' => '<p>Daftar 200 vocabulary akademik yang memiliki frekuensi kemunculan tertinggi pada tes seleksi masuk SMA favorit berstandar nasional.</p>',
                'author_name' => 'Kak Jingga, M.Pd.',
                'author_role' => 'Head Mentor Sains UPI',
                'read_time' => 'Bahasa Inggris',
                'published_date_label' => 'Populer',
                'thumbnail' => 'https://i.ytimg.com/vi/FBvp-vCzcrg/hqdefault.jpg',
                'video_url' => 'https://www.youtube.com/watch?v=FBvp-vCzcrg',
                'is_featured' => false,
                'is_published' => true,
                'sort_order' => 8,
            ],
        ];

        Article::truncate();
        foreach ($articles as $article) {
            Article::create($article);
        }
    }

    private function seedPlatformUpdates(): void
    {
        $updates = [
            [
                'version_badge' => 'CBT 2027 Ready',
                'status_badge' => 'Aktif',
                'release_date_label' => 'Kurikulum Terbaru',
                'title' => 'Simulasi Computer Based Test (CBT) TKA Adaptif 2027',
                'summary' => 'Antarmuka tes seleksi 100% mirip dengan ujian asli sekolah unggulan. Dilengkapi timer adaptif 90 detik, analisis grafik subtes, dan ranking nasional.',
                'tags' => ['CBT Adaptif', 'Ranking Nasional'],
                'cta_label' => 'Coba CBT',
                'cta_view' => 'paket-bimbingan',
                'sort_order' => 1,
                'is_published' => true,
            ],
            [
                'version_badge' => 'Buku Fisik',
                'status_badge' => null,
                'release_date_label' => 'Edisi 2027',
                'title' => 'Rilis Buku Amazing TKA SMP/MTs 2027 (500+ Halaman)',
                'summary' => 'Buku fisik dengan kertas bookpaper premium, rangkuman konsep esensial, 5 paket soal prediksi, dan pembahasan video QR code tiap nomor.',
                'tags' => ['Buku Fisik', 'Video QR Code'],
                'cta_label' => null,
                'cta_view' => null,
                'sort_order' => 2,
                'is_published' => true,
            ],
        ];

        PlatformUpdate::truncate();
        foreach ($updates as $update) {
            PlatformUpdate::create($update);
        }
    }

    private function seedMentors(): void
    {
        $mentors = [
            [
                'name' => 'Kak Azzam, S.Si.',
                'subject' => 'Head Mentor Matematika & Penalaran Logis',
                'campus' => 'S1 Matematika ITB (Cumlaude)',
                'avatar_emoji' => 'AZ',
                'photo' => 'images/mentor_azzam.jpg',
                'quote' => 'Pahami akar konsep setiap rumus matematika & penalaran. Kamu akan mampu memecahkan variasi soal serumit apa pun tanpa panik.',
                'achievements' => [
                    'Peraih Medali Emas OSN Matematika Nasional',
                    'Alumnus Matematika ITB dengan predikat Cumlaude',
                    '7+ Tahun membimbing ribuan siswa tembus SMA Pradita & Taruna Nusantara',
                ],
                'show_on_beranda' => true,
                'show_on_materi' => true,
                'show_on_blog' => true,
                'is_featured' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Kak Jingga, M.Pd.',
                'subject' => 'Head Mentor IPA (Fisika & Biologi HOTS)',
                'campus' => 'S2 Pendidikan Sains UPI',
                'avatar_emoji' => 'JG',
                'photo' => 'images/mentor_jingga.jpg',
                'quote' => 'Sains itu visual dan aplikatif. Trik 30 detik membuat soal gerak Newton dan biologi terapan jadi sangat masuk akal.',
                'achievements' => [
                    'Juara 1 Olimpiade Guru Sains Nasional',
                    'Penulis modul praktis Amazing TKA IPA Terpadu',
                    '6+ Tahun meloloskan siswa ke SMA MH Thamrin & SMAN 8 Jakarta',
                ],
                'show_on_beranda' => true,
                'show_on_materi' => true,
                'show_on_blog' => true,
                'is_featured' => true,
                'sort_order' => 2,
                'is_active' => true,
            ],
        ];

        Mentor::truncate();
        foreach ($mentors as $mentor) {
            Mentor::create($mentor);
        }
    }

    private function seedTestimonials(): void
    {
        $items = [
            [
                'name' => 'Fadhil Athallah',
                'role' => 'Alumni SMPN 1 Surabaya • Lolos SMA Pradita Dirgantara 2026',
                'quote' => 'Dulu aku paling takut sama soal HOTS matematika. Rasanya rumus banyak banget tapi gak tahu kapan dipakainya. Di JIA, Kak Azzam ngajarin konsep intinya sampai paham betul, bukan hafalan! Pas tes seleksi kemarin rasanya familiar semua.',
                'rating' => 5,
                'avatar_initial' => 'FA',
                'is_highlighted' => true,
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Nadia Safitri',
                'role' => 'Alumni SMP Al-Azhar Jakarta • Lolos SMA Taruna Nusantara 2026',
                'quote' => 'Simulasi CBT-nya JIA bener-bener ngebantu adaptasi mental. Waktu ngerjain tes aslinya aku udah tenang banget karena udah terbiasa dengan timer ketat dan layout sistem yang mirip banget. Makasih banyak tim JIA!',
                'rating' => 5,
                'avatar_initial' => 'NS',
                'is_highlighted' => false,
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Rayhan Pratama',
                'role' => 'Alumni SMPN 115 Jakarta • Lolos SMAN Unggulan MH Thamrin 2026',
                'quote' => 'Buku Amazing TKA bener-bener buku sakti! Pembahasan QR code videonya detail banget. Kalau mentok di suatu soal, tinggal scan dan tonton penjelasannya langsung dari mentor juara. Nilai TKA-ku naik drastis dari 650 ke 890.',
                'rating' => 5,
                'avatar_initial' => 'RP',
                'is_highlighted' => false,
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Ibu Dian Anggraini',
                'role' => 'Wali dari Dimas (Alumni SMPN 5 Bandung • Lolos SMA Pradita)',
                'quote' => 'Sebagai orang tua, saya sangat mengapresiasi transparansi laporan hasil tryout di JIA. Tiap sesi ada evaluasi kelemahan anak di bab apa yang perlu diperbaiki. Mentornya ramah, sabar, dan selalu memotivasi anak tanpa bikin tertekan.',
                'rating' => 5,
                'avatar_initial' => 'DA',
                'is_highlighted' => true,
                'sort_order' => 4,
                'is_active' => true,
            ],
        ];

        Testimonial::truncate();
        foreach ($items as $item) {
            Testimonial::create($item);
        }
    }

    private function seedLearningMaterials(): void
    {
        $materials = [
            [
                'subject' => 'matematika',
                'level_tag' => 'smp',
                'badge' => 'Aljabar & Pola Bilangan',
                'title' => 'Pola Bilangan, Barisan, & Deret Aritmatika HOTS',
                'description' => 'Pahami penentuan rumus suku ke-n dan manipulasi deret bertingkat untuk seleksi SMA.',
                'video_count' => 6,
                'quiz_count' => 20,
                'difficulty_label' => 'HOTS Seleksi',
                'cta_url' => 'https://wa.me/6285196906349',
                'sort_order' => 1,
            ],
            [
                'subject' => 'sains',
                'level_tag' => 'smp',
                'badge' => 'Fisika Terapan',
                'title' => 'Hukum Gerak Newton & Analisis Bidang Miring',
                'description' => 'Trik 30 detik diagram gaya bebas pada katrol dan bidang miring tanpa rumus berbelit.',
                'video_count' => 5,
                'quiz_count' => 15,
                'difficulty_label' => 'Pemahaman Konsep',
                'cta_url' => 'https://wa.me/6285196906349',
                'sort_order' => 2,
            ],
            [
                'subject' => 'indonesia',
                'level_tag' => 'smp',
                'badge' => 'Literasi & Wacana Kritis',
                'title' => 'Analisis Paragraf Kritis & Makna Tersirat Wacana',
                'description' => 'Trik eliminasi cepat opsi mengecoh pada teks panjang seleksi SMA favorit.',
                'video_count' => 4,
                'quiz_count' => 12,
                'difficulty_label' => 'HOTS Literasi',
                'cta_url' => 'https://wa.me/6285196906349',
                'sort_order' => 3,
            ],
        ];

        LearningMaterial::truncate();
        foreach ($materials as $material) {
            LearningMaterial::create(array_merge($material, ['is_active' => true]));
        }
    }

    private function seedQuestionModules(): void
    {
        $modules = [
            [
                'category_badge' => 'Simulasi CBT • Matematika',
                'hots_level' => 'HOTS Level 3',
                'title' => 'Try Out Akbar TKA Seri 1 - 2027',
                'description' => 'Simulasi CBT 100% mirip dengan tes asli SMA Pradita Dirgantara & Taruna Nusantara.',
                'question_count' => 40,
                'duration_minutes' => 60,
                'cta_url' => 'https://wa.me/6285196906349',
                'sort_order' => 1,
            ],
            [
                'category_badge' => 'Sains & Fisika',
                'hots_level' => 'HOTS Level 2',
                'title' => 'Bedah Soal Gaya & Gerak Newton 90 Detik',
                'description' => 'Latihan 25 soal mekanika dan hukum gerak dengan batasan waktu adaptif 90 detik per butir.',
                'question_count' => 25,
                'duration_minutes' => 35,
                'cta_url' => 'https://wa.me/6285196906349',
                'sort_order' => 2,
            ],
        ];

        QuestionModule::truncate();
        foreach ($modules as $module) {
            QuestionModule::create(array_merge($module, ['is_active' => true]));
        }
    }

    private function seedLiveClasses(): void
    {
        $classes = [
            [
                'day_badge' => 'LIVE ZOOM',
                'badge_color' => 'orange',
                'time_label' => '19.30 WIB',
                'title' => 'Webinar Strategi Menembus SMA Unggulan 2027',
                'mentor_name' => 'Kak Azzam, S.Si. & Kak Jingga, M.Pd.',
                'quota_label' => 'Terbuka Untuk Umum',
                'cta_label' => 'Daftar Webinar Gratis',
                'cta_url' => 'https://wa.me/6285196906349',
                'sort_order' => 1,
            ],
        ];

        LiveClass::truncate();
        foreach ($classes as $class) {
            LiveClass::create(array_merge($class, ['is_active' => true]));
        }
    }

    private function seedFaqs(): void
    {
        $faqs = [
            // FAQs from Benchmark Site (ref_faq.html)
            [
                'section' => 'materi-belajar',
                'sort_order' => 1,
                'question' => 'Apa saja yang didapatkan di program TKA Master Class?',
                'answer' => 'Siswa mendapatkan modul materi digital & cetak lengkap, akses simulasi CBT 1 tahun, 40+ sesi kelas live intensif, bank 2.500+ soal HOTS berstandar seleksi SMA Unggulan, serta grup pendampingan harian 24/7 bersama mentor juara kompetisi nasional.',
            ],
            [
                'section' => 'adaptive-test',
                'sort_order' => 2,
                'question' => 'Apakah simulasi CBT bisa diakses di smartphone / HP?',
                'answer' => 'Ya, 100% responsif! Sistem CBT JIA Learning didesain adaptif dan ringan. Siswa dapat mengakses ujian baik melalui laptop/PC, tablet iPad/Android, maupun smartphone dengan antarmuka yang nyaman dan anti-lag.',
            ],
            [
                'section' => 'panduan',
                'sort_order' => 3,
                'question' => 'Bagaimana cara mendaftar dan mulai belajar di JIA Learning?',
                'answer' => 'Cukup klik tombol "Daftar Sekarang", pilih paket bimbingan yang diinginkan, lakukan konfirmasi via WhatsApp, dan akun belajar kamu akan aktif secara otomatis dalam hitungan menit.',
            ],
            [
                'section' => 'panduan-simulasi',
                'sort_order' => 4,
                'question' => 'Apakah ada sesi latihan soal live dan interaktif bersama mentor juara?',
                'answer' => 'Tentu ada! Setiap pekan terdapat sesi live streaming interaktif untuk membedah soal-soal tersulit. Siswa bisa bertanya langsung secara dua arah dan mendapatkan penjabaran runtut dari Kak Azzam, Kak Jingga, dan tim pengajar lainnya.',
            ],
            [
                'section' => 'bank-soal',
                'sort_order' => 5,
                'question' => 'Berapa lama akses modul dan tryout simulasi CBT yang saya dapatkan?',
                'answer' => 'Seluruh peserta mendapatkan masa aktif akses akun hingga hari pelaksanaan tes seleksi TKA SMP/MTs 2027 selesai (minimal 12 bulan penuh) tanpa ada biaya perpanjangan atau langganan tersembunyi.',
            ],
        ];

        Faq::truncate();
        foreach ($faqs as $faq) {
            Faq::create(array_merge($faq, ['is_active' => true]));
        }
    }

    private function seedFeatures(): void
    {
        $features = [
            [
                'icon' => 'lightbulb',
                'title' => 'Fondasi Konsep Fundamental',
                'description' => 'Pahami akar konsep setiap rumus matematika & penalaran IPA. Kamu akan mampu memecahkan variasi soal serumit apa pun tanpa panik.',
                'sort_order' => 1,
            ],
            [
                'icon' => 'zap',
                'title' => 'Strategi Belajar Taktis',
                'description' => 'Manajemen waktu pengerjaan 90 detik per butir, teknik eliminasi jawaban jebakan, dan pemetaan tingkat kesulitan soal HOTS seleksi.',
                'sort_order' => 2,
            ],
            [
                'icon' => 'target',
                'title' => 'Uji Coba TKA & CBT Akurat',
                'description' => 'Simulasi ujian dengan sistem, durasi, dan tingkat kesulitan 100% mirip dengan Computer Based Test seleksi SMA Favorit sesungguhnya.',
                'sort_order' => 3,
            ],
        ];

        Feature::truncate();
        foreach ($features as $feature) {
            Feature::create(array_merge($feature, ['is_active' => true]));
        }
    }

    private function seedVouchers(): void
    {
        $vouchers = [
            ['code' => 'TKAJUARA', 'discount_label' => 'Diskon 50%', 'description' => 'Promo spesial tryout akbar CBT TKA 2027.', 'is_active' => true],
            ['code' => 'BONUSTKA2027', 'discount_label' => 'Bonus Bank Soal', 'description' => 'Klaim bonus 1.500+ bank soal HOTS & video bedah materi.', 'is_active' => true],
        ];

        foreach ($vouchers as $voucher) {
            Voucher::updateOrCreate(['code' => $voucher['code']], $voucher);
        }
    }
}
