<?php

namespace App\Services;

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
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Schema;

/**
 * Provides structured CMS-backed content and fallback datasets for Jia Learning pages.
 */
class JiaContentService
{
    /**
     * Valid view identifiers supported by the application.
     *
     * @var array<int, string>
     */
    public const VALID_VIEWS = [
        'beranda',
        'paket-bimbingan',
        'adaptive-test',
        'bank-soal',
        'prediksi-nilai',
        'materi-belajar',
        'pahami-materi',
        'pahami-jia',
        'panduan',
        'panduan-daftar',
        'panduan-program',
        'panduan-simulasi-faq',
        'panduan-support',
    ];

    /**
     * Gather all view datasets needed to render the Jia Learning application.
     *
     * @return array<string, mixed>
     */
    public function getPageData(): array
    {
        $settings = $this->getSettings();
        $articles = $this->getArticles();
        $featuredArticle = $articles->firstWhere('is_featured', true) ?? $articles->first();
        $gridArticles = $featuredArticle
            ? $articles->reject(fn (Article $a) => $a->id === $featuredArticle->id)->values()
            : $articles;

        $programs = $this->getPrograms();
        $mentors = $this->getMentors();

        return [
            'settings' => $settings,
            'programsSchool' => $programs->where('category', 'modul_sekolah')->values(),
            'programsExam' => $programs->where('category', 'bimbingan_ujian')->values(),
            'featuredArticle' => $featuredArticle,
            'gridArticles' => $gridArticles,
            'allArticles' => $articles,
            'platformUpdates' => $this->getPlatformUpdates(),
            'berandaMentors' => $mentors->where('show_on_beranda', true)->values(),
            'blogMentors' => $mentors->where('show_on_blog', true)->values(),
            'rockstarMentors' => $this->getRockstarMentors($mentors),
            'testimonials' => $this->getTestimonials(),
            'materialsBySubject' => $this->getMaterialsBySubject(),
            'questionModules' => $this->getQuestionModules(),
            'liveClasses' => $this->getLiveClasses(),
            'coolFeatures' => $this->getCoolFeatures(),
            'faqsAdaptive' => $this->getFaqsBySection('adaptive-test', $this->getFaqsAdaptive()),
            'faqsBankSoal' => $this->getFaqsBySection('bank-soal', $this->getFaqsBankSoal()),
            'faqs' => $this->getFaqsBySection('materi-belajar', $this->getFaqsMateri()),
            'faqsPanduan' => $this->getFaqsBySection('panduan', []),
            'faqsPanduanSimulasi' => $this->getFaqsBySection('panduan-simulasi', []),
        ];
    }

    /**
     * @return array<string, string>
     */
    public function getSettings(): array
    {
        $defaults = [
            'site_name' => 'Jia Learning',
            'site_tagline' => 'Jia Learning — Bimbel Online & Persiapan Asesmen TKA',
            'company_name' => 'PT JIA ACADEMY CENTER',
            'company_address' => 'Perum Citra Pesona Indah 1 No. 92, Kertosari, Banyuwangi, Jawa Timur',
            'company_business_field' => 'Pendidikan Bimbingan Belajar, Jasa Penyelenggaraan Event Khusus, & Platform Digital.',
            'whatsapp_number' => '6285113268957',
            'support_email' => 'cs@jialearning.app',
            'webapp_url' => 'http://jialearning.app/',
            'lms_url' => 'https://admin.jialearning.app',
            'footer_description' => 'Jia Learning merupakan platform persiapan ujian modern di bawah naungan PT Jia Academy Center yang membimbing siswa jenjang SMP dan SMA dalam menghadapi Tes Kompetensi Akademik (TKA), ulangan sekolah, hingga seleksi masuk perguruan tinggi negeri. Melalui Jia Learning, siswa dapat melatih diri melalui modul terarah, tryout berbasis analitik, serta mendapatkan evaluasi langsung terhadap kelemahan dan kelebihan belajarnya.',
            'promo_active' => '1',
            'topbar_badge' => '🔥 PROMO 60%',
            'topbar_text' => 'Persiapan TKA & UTBK 2026 — Sisa 14 Kuota!',
            'topbar_voucher' => 'JIAHEMAT',
            'promo_banner_code' => 'CURISTARTBIARSMART',
            'promo_banner_title' => '#CuriStart BiarSmart TKA & Paket Belajar',
            'promo_banner_desc' => 'Saatnya kamu #CuriStart untuk persiapan ujian dan dapatkan potongan harga eksklusif khusus pembelian paket semester ini.',
            'hero_badge' => '🌟 Pendaftaran Semester Baru 2026: Kuota Eksklusif Terbatas!',
            'hero_title_line1' => 'Jangan Biarkan Nilai Rapor & Asesmenmu',
            'hero_title_highlight' => 'Jebol di Tahun Ini!',
            'hero_description' => 'Bimbel modern khusus SMP & SMA di bawah naungan PT Jia Academy Center. Dapatkan metode pemahaman konsep anti ngantuk, drill soal HOTS berstandar nasional, dan pendampingan eksklusif oleh Rockstar Mentor lulusan PTN top.',
            'stat_schools' => '300+',
            'stat_students' => '700+',
            'stat_satisfaction' => '95%',
        ];

        if (! $this->hasTable('site_settings')) {
            return $defaults;
        }

        $stored = SiteSetting::allAsMap();

        return array_merge($defaults, array_filter($stored, fn ($v) => $v !== null));
    }

    /**
     * @return Collection<int, Program>
     */
    public function getPrograms(): Collection
    {
        if (! $this->hasTable('programs')) {
            return collect();
        }

        return Program::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @return Collection<int, Article>
     */
    public function getArticles(): Collection
    {
        if (! $this->hasTable('articles')) {
            return collect();
        }

        return Article::query()
            ->where('is_published', true)
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();
    }

    /**
     * @return Collection<int, PlatformUpdate>
     */
    public function getPlatformUpdates(): Collection
    {
        if (! $this->hasTable('platform_updates')) {
            return collect();
        }

        return PlatformUpdate::query()
            ->where('is_published', true)
            ->orderBy('sort_order')
            ->orderByDesc('id')
            ->get();
    }

    /**
     * @return Collection<int, Mentor>
     */
    public function getMentors(): Collection
    {
        if (! $this->hasTable('mentors')) {
            return collect();
        }

        return Mentor::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @return Collection<int, Testimonial>
     */
    public function getTestimonials(): Collection
    {
        if (! $this->hasTable('testimonials')) {
            return collect();
        }

        return Testimonial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @return array<string, Collection<int, LearningMaterial>>
     */
    public function getMaterialsBySubject(): array
    {
        $subjects = array_keys(LearningMaterial::SUBJECTS);
        $grouped = [];

        if (! $this->hasTable('learning_materials')) {
            foreach ($subjects as $subject) {
                $grouped[$subject] = collect();
            }

            return $grouped;
        }

        $items = LearningMaterial::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        foreach ($subjects as $subject) {
            $grouped[$subject] = $items->where('subject', $subject)->values();
        }

        return $grouped;
    }

    /**
     * @return Collection<int, QuestionModule>
     */
    public function getQuestionModules(): Collection
    {
        if (! $this->hasTable('question_modules')) {
            return collect();
        }

        return QuestionModule::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @return Collection<int, LiveClass>
     */
    public function getLiveClasses(): Collection
    {
        if (! $this->hasTable('live_classes')) {
            return collect();
        }

        return LiveClass::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();
    }

    /**
     * @param  array<int, array{q: string, a: string}>  $fallback
     * @return array<int, array{q: string, a: string}>
     */
    private function getFaqsBySection(string $section, array $fallback): array
    {
        if (! $this->hasTable('faqs')) {
            return $fallback;
        }

        $records = Faq::query()
            ->where('section', $section)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        if ($records->isEmpty()) {
            return $fallback;
        }

        return $records->map(fn (Faq $faq) => [
            'q' => $faq->question,
            'a' => $faq->answer,
        ])->all();
    }

    /**
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqsAdaptive(): array
    {
        return [
            [
                'q' => 'Bagaimana cara kerja sistem AI Jia Adaptive Test?',
                'a' => 'Jia Adaptive Test menyesuaikan tingkat kesulitan soal secara otomatis berdasarkan respon jawabanmu. Jika kamu menjawab benar, soal berikutnya akan menguji level analitis lebih tinggi (IRT). Jika keliru, sistem akan memberikan soal pendalaman konsep dasar.',
            ],
            [
                'q' => 'Berapa lama waktu yang dibutuhkan untuk menyelesaikan tes diagnostik?',
                'a' => 'Cukup 10 hingga 15 menit saja! Dalam waktu singkat ini, sistem AI Jia sudah mampu memetakan kekuatan dan kelemahan belajarmu secara presisi 99%.',
            ],
            [
                'q' => 'Apakah hasil tes diagnostik disertai rekomendasi modul belajar?',
                'a' => 'Ya! Setelah tes selesai, kamu akan menerima Rapor Analitik IRT lengkap dengan urutan bab dan modul video yang wajib kamu tonton untuk menutup celah pemahamanmu.',
            ],
            [
                'q' => 'Apakah Jia Adaptive Test cocok untuk persiapan UTBK & TKA?',
                'a' => 'Sangat cocok! Algoritma IRT (Item Response Theory) yang kami gunakan sama persis dengan standar penilaian seleksi UTBK SNBT dan TKA Asesmen Nasional.',
            ],
        ];
    }

    /**
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqsBankSoal(): array
    {
        return [
            [
                'q' => 'Apakah soal di Bank Soal Jia Learning dapat didownload?',
                'a' => 'Ya! Seluruh kumpulan modul latihan dan soal HOTS dapat didownload dalam format PDF berkualitas tinggi lengkap dengan kunci jawaban.',
            ],
            [
                'q' => 'Bagaimana sistem penilaian poin pada Leaderboard Nasional?',
                'a' => 'Poin diperoleh setiap kali kamu menyelesaikan latihan soal dengan benar. Soal berkategori HOTS Level 3 memberikan poin lebih tinggi!',
            ],
            [
                'q' => 'Apakah ada video pembahasan untuk soal yang sulit?',
                'a' => 'Ada! Setiap modul soal dilengkapi pembahasan langkah-demi-langkah baik format teks penjelasan maupun video digital blackboard.',
            ],
        ];
    }

    /**
     * @return array<int, array{icon: string, title: string, desc: string}>
     */
    public function getCoolFeatures(): array
    {
        if ($this->hasTable('features')) {
            $records = Feature::query()
                ->where('is_active', true)
                ->orderBy('sort_order')
                ->orderBy('id')
                ->get();

            if ($records->isNotEmpty()) {
                return $records->map(fn (Feature $f) => [
                    'icon' => $f->icon,
                    'title' => $f->title,
                    'desc' => $f->description,
                ])->all();
            }
        }

        return [
            ['icon' => '🎬', 'title' => 'Video Animasi Konsep', 'desc' => 'Penjelasan materi sulit dengan visualisasi analogi kehidupan nyata yang anti ngantuk.'],
            ['icon' => '📝', 'title' => 'Digital Blackboard', 'desc' => 'Papan tulis digital runtut untuk memahami penurunan rumus secara mendalam.'],
            ['icon' => '⚡', 'title' => 'Cheat Sheet Kilat', 'desc' => 'Ringkasan 1 halaman berisi rumus kunci dan trik cepat menghafal materi.'],
            ['icon' => '🎯', 'title' => 'Kuis Evaluasi Instan', 'desc' => 'Latihan soal pilihan ganda singkat di setiap akhir modul untuk mengunci pemahaman.'],
            ['icon' => '📚', 'title' => 'Modul PDF Terstruktur', 'desc' => 'Bahan bacaan pendukung yang disusun sesuai kurikulum asesmen nasional terkini.'],
            ['icon' => '🗂️', 'title' => 'Interactive Flashcard', 'desc' => 'Kartu kilat digital untuk melatih daya ingat teori dan rumus dengan cepat.'],
            ['icon' => '💬', 'title' => 'Live Class Tanya Mentor', 'desc' => 'Sesi interaktif via Zoom/Web app untuk membahas soal-soal sulit bersama ahli.'],
            ['icon' => '📊', 'title' => 'Analisis Progres Belajar', 'desc' => 'Pantau grafik peningkatan pemahaman konsep dari setiap bab yang telah diselesaikan.'],
        ];
    }

    /**
     * @param  Collection<int, Mentor>|null  $mentors
     * @return array<int, array{nama: string, mapel: string, kampus: string, foto: string, foto_url: string, prestasi: array<int, string>}>
     */
    public function getRockstarMentors(?Collection $mentors = null): array
    {
        $source = $mentors ?? $this->getMentors();
        $materiMentors = $source->where('show_on_materi', true)->values();

        if ($materiMentors->isNotEmpty()) {
            return $materiMentors->map(fn (Mentor $m) => [
                'nama' => $m->name,
                'mapel' => $m->subject,
                'kampus' => $m->campus,
                'foto' => $m->photo ?: '',
                'foto_url' => $m->photoUrl(),
                'prestasi' => $m->achievements ?? [],
            ])->all();
        }

        return [
            [
                'nama' => 'Kak Arkan, S.Pd.',
                'mapel' => 'Mentor Matematika & Numerasi',
                'kampus' => 'Alumni Pendidikan Matematika PTN Top',
                'foto' => 'mentor-arkan.jpg',
                'foto_url' => asset('images/mentor-arkan.jpg'),
                'prestasi' => ['Pengalaman mengajar 5+ tahun', 'Spesialis trik cepat Aljabar & Geometri', 'Mentor favorit peraih skor UTBK tertinggi'],
            ],
            [
                'nama' => 'Kak Nabila, M.Sc.',
                'mapel' => 'Mentor Sains & Biologi',
                'kampus' => 'Alumni Bioteknologi & Sains PTN',
                'foto' => 'mentor-nabila.jpg',
                'foto_url' => asset('images/mentor-nabila.jpg'),
                'prestasi' => ['Penyusun modul bedah soal HOTS Sains', 'Pakar visualisasi konsep metabolisme sel', 'Penjelas materi sains jadi super asyik'],
            ],
            [
                'nama' => 'Kak Rizki, S.Kom.',
                'mapel' => 'Mentor Literasi & Kuantitatif',
                'kampus' => 'Alumni Ilmu Komputer PTN Top',
                'foto' => 'mentor-rizki.jpg',
                'foto_url' => asset('images/mentor-rizki.jpg'),
                'prestasi' => ['Ahli strategi pengerjaan TPS & TKA', 'Spesialis eliminasi opsi jawaban mengecoh', 'Mentor pembimbing lolos PTN & sekolah unggulan'],
            ],
        ];
    }

    /**
     * @return array<int, array{q: string, a: string}>
     */
    public function getFaqsMateri(): array
    {
        return [
            [
                'q' => 'Apakah video materi konsep dapat ditonton berulang kali?',
                'a' => 'Ya, tentu saja! Kamu bebas memutar ulang video animasi, rekaman digital blackboard, maupun mengakses materi kapan pun selama masa aktif akun belajarmu.',
            ],
            [
                'q' => 'Bagaimana cara kerja fitur Interactive Flashcard?',
                'a' => 'Cukup klik pada kartu pertanyaan di layar, maka kartu akan berbalik menampilkan rumus kilat atau inti jawaban untuk melatih daya ingat cepat sebelum ujian.',
            ],
            [
                'q' => 'Apakah materi di Jia Learning sudah disesuaikan dengan kurikulum terbaru?',
                'a' => 'Sangat sesuai! Seluruh modul, video, dan bank soal disusun khusus mengikuti standar asesmen TKA SMP & UTBK SMA terkini.',
            ],
        ];
    }

    private function hasTable(string $table): bool
    {
        try {
            return Schema::hasTable($table);
        } catch (\Throwable) {
            return false;
        }
    }
}
