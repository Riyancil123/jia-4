<div id="view-beranda" class="tab-content active">

  <!-- ==================== 1. HERO SECTION (EXACT BENCHMARK MATCH) ==================== -->
  <section class="hero-section">
    <div class="hero-glow-bg"></div>
    <div class="hero-glow-purple"></div>
    <div class="container hero-grid">
      
      <!-- Hero Left Content -->
      <div class="hero-content">
        <div class="badge-soft">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="#FEA619" stroke="#FEA619" stroke-width="1.5">
            <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
          </svg>
          <span>{{ $settings['hero_badge'] ?? 'Bimbingan Belajar Persiapan TKA SMP/MTs Terbaik' }}</span>
        </div>

        <h1 class="hero-title">
          {{ $settings['hero_title_line1'] ?? 'Tembus SMA Impian' }}<br>
          <span class="text-orange">{{ $settings['hero_title_highlight'] ?? 'Tanpa Bingung' }}</span><br>
          {{ $settings['hero_title_line2'] ?? 'Hafalan Rumus.' }}
        </h1>

        <p class="hero-subtitle">
          {{ $settings['hero_description'] ?? 'Bimbingan intensif persiapan TKA SMP/MTs menuju SMA unggulan. Materi terstruktur, latihan soal HOTS, dan simulasi CBT adaptif berbasis kurikulum terbaru.' }}
        </p>

        <div class="hero-cta-group">
          <button type="button" onclick="switchView('paket-bimbingan')" class="btn btn-primary" id="heroCtaPrimary">
            Daftar Try Out CBT Gratis &rarr;
          </button>
          <button type="button" onclick="switchView('paket-bimbingan')" class="btn btn-secondary" id="heroCtaSecondary">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#EF4444" stroke="#EF4444" stroke-width="1">
              <polygon points="5 3 19 12 5 21 5 3"></polygon>
            </svg>
            <span>Lihat Program Belajar &rsaquo;</span>
          </button>
        </div>

        <div class="hero-trust-proof">
          <div class="proof-row">
            <div class="avatar-stack">
              <img src="{{ asset('images/mentor_azzam.jpg') }}" alt="Kak Azzam">
              <img src="{{ asset('images/mentor_jingga.jpg') }}" alt="Kak Jingga">
              <div class="stack-avatar">+850</div>
            </div>
            <div class="proof-text">
              <strong>Rating {{ $settings['stat_rating'] ?? '4.9/5.0' }}</strong> dari {{ $settings['stat_students'] ?? '850+' }} Siswa SMP/MTs se-Indonesia
            </div>
          </div>
          <div class="proof-badge-guarantee">
            <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
              <polyline points="20 6 9 17 4 12"></polyline>
            </svg>
            <span>Garansi Pemahaman Konsep 100% & Pendampingan Mentor Juara</span>
          </div>
        </div>
      </div>

      <!-- Hero Right: Interactive Mockup Card -->
      <div class="cbt-mockup-card" id="heroInteractiveCard">
        <div class="cbt-window-bar">
          <div class="window-dots">
            <span class="dot-red"></span>
            <span class="dot-yellow"></span>
            <span class="dot-green"></span>
          </div>
          <div class="cbt-status-pill">● CBT TKA Adaptif Aktif</div>
        </div>

        <div class="cbt-tabs">
          <button type="button" class="cbt-tab-btn active" data-tab="jadwal">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
            <span>Jadwal</span>
          </button>
          <button type="button" class="cbt-tab-btn" data-tab="analisis">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg>
            <span>Analisis</span>
          </button>
          <button type="button" class="cbt-tab-btn" data-tab="soal">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
            <span>Soal HOTS</span>
          </button>
          <button type="button" class="cbt-tab-btn" data-tab="profil">
            <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
            <span>Profil</span>
          </button>
        </div>

        <div class="cbt-test-box">
          <div class="cbt-test-header">
            <div>
              <div style="font-size: 0.68rem; font-weight: 800; text-transform: uppercase; color: #8E8699; letter-spacing: 0.05em;">Simulasi CBT SMA Unggulan</div>
              <h3 class="cbt-test-title">Try Out Akbar TKA Seri 1 - 2027</h3>
            </div>
            <div class="cbt-timer-badge">
              <svg width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
              <span id="cbtTimer">42:15</span>
            </div>
          </div>

          <div class="cbt-tags">
            <span class="cbt-tag">Matematika</span>
            <span class="cbt-tag">Penalaran IPA</span>
            <span class="cbt-tag">Literasi Bhs</span>
          </div>

          <div class="cbt-progress-row">
            <div class="cbt-score-target">
              Target Nilai: <strong>850+ Poin</strong>
            </div>
            <button type="button" onclick="switchView('paket-bimbingan')" class="btn cbt-btn-start">Mulai Ujian &rsaquo;</button>
          </div>
        </div>

        <div class="cbt-promo-banner">
          <div>
            <div class="promo-title">{{ $settings['promo_banner_title'] ?? 'Bonus Spesial Paket Belajar' }}</div>
            <div class="promo-sub">{{ $settings['promo_banner_desc'] ?? 'Bank 1.500+ Soal HOTS & Video Bedah Soal' }}</div>
          </div>
          <button type="button" onclick="switchView('paket-bimbingan')" class="btn promo-btn">Klaim Bonus</button>
        </div>
      </div>

    </div>
  </section>

  <!-- ==================== 2. TIGA PILAR UTAMA KESIAPAN TKA ==================== -->
  <section class="section-pilar">
    <div class="container">
      <div class="section-header-split">
        <div class="section-head-text">
          <div class="section-tag">METODE BELAJAR EFEKTIF</div>
          <h2 class="section-title">Tiga Pilar Utama Kesiapan TKA</h2>
          <p class="section-desc">
            Kurikulum terstruktur yang dirancang khusus untuk memastikan pemahaman konsep mendalam, bukan sekadar hafalan rumus cepat.
          </p>
        </div>
        <div class="stats-badges-container">
          <div class="stat-pill-item">{{ $settings['stat_schools'] ?? '100+' }} Video Materi</div>
          <div class="stat-pill-divider"></div>
          <div class="stat-pill-item">2500+ Bank Soal</div>
          <div class="stat-pill-divider"></div>
          <div class="stat-pill-item">12x Try Out Real CBT</div>
        </div>
      </div>

      <div class="pilar-cards-grid">
        @forelse ($coolFeatures as $feat)
          @php
            $fTitle = is_array($feat) ? ($feat['title'] ?? '') : ($feat->title ?? '');
            $fDesc = is_array($feat) ? ($feat['desc'] ?? $feat['description'] ?? '') : ($feat->desc ?? $feat->description ?? '');
          @endphp
          <div class="pilar-card {{ $loop->iteration === 2 ? 'card-purple' : '' }}">
            <div class="pilar-card-top">
              <div class="pilar-num">{{ sprintf('%02d', $loop->iteration) }}</div>
              <div class="pilar-icon-wrap" style="color: {{ $loop->iteration === 3 ? '#0D9488' : '#FEA619' }};">
                @if ($loop->iteration === 1)
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="9" y1="18" x2="15" y2="18"></line><line x1="10" y1="22" x2="14" y2="22"></line><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"></path></svg>
                @elseif ($loop->iteration === 2)
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>
                @else
                  <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
                @endif
              </div>
            </div>
            <div>
              <h3 class="pilar-title">{{ $fTitle }}</h3>
              <p class="pilar-desc">{{ $fDesc }}</p>
              @if ($loop->iteration === 3)
                <div class="pilar-mini-chart">
                  <div class="chart-header">
                    <span>Perkembangan Skor CBT Siswa</span>
                    <span class="text-orange">+185 Poin</span>
                  </div>
                  <div class="chart-bars">
                    <div class="chart-bar" style="height: 35%;"></div>
                    <div class="chart-bar" style="height: 48%;"></div>
                    <div class="chart-bar" style="height: 60%;"></div>
                    <div class="chart-bar active" style="height: 78%;"></div>
                    <div class="chart-bar highlight" style="height: 95%;"></div>
                  </div>
                </div>
              @endif
            </div>
            <a href="javascript:void(0)" onclick="switchView('paket-bimbingan')" class="pilar-link">
              <span>Pelajari Detail</span>
              <span>&nearr;</span>
            </a>
          </div>
        @empty
          <!-- Static Fallback 01 -->
          <div class="pilar-card">
            <div class="pilar-card-top">
              <div class="pilar-num">01</div>
              <div class="pilar-icon-wrap" style="color: #FEA619;">
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="9" y1="18" x2="15" y2="18"></line><line x1="10" y1="22" x2="14" y2="22"></line><path d="M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"></path></svg>
              </div>
            </div>
            <div>
              <h3 class="pilar-title">Fondasi Konsep Fundamental</h3>
              <p class="pilar-desc">Pahami akar konsep setiap rumus matematika & penalaran IPA.</p>
            </div>
            <a href="javascript:void(0)" onclick="switchView('paket-bimbingan')" class="pilar-link"><span>Pelajari Modul Dasar</span> <span>&nearr;</span></a>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ==================== 3. EKOSISTEM BELAJAR LENGKAP & TERSTRUKTUR ==================== -->
  <section class="section-ekosistem">
    <div class="container">
      <div class="section-header-center">
        <div class="section-tag">PAKET PENDUKUNG LENGKAP 2027</div>
        <h2 class="section-title">Ekosistem Belajar Lengkap & Terstruktur</h2>
        <p class="section-desc">
          Semua materi, modul latihan, buku panduan, dan simulasi CBT terintegrasi dalam satu sistem belajar mandiri yang fleksibel dan terarah.
        </p>
      </div>

      <div class="ekosistem-grid">
        <!-- E-Planner Card -->
        <div class="ekosistem-card">
          <div>
            <div class="card-top-tags">
              <span class="badge-pill-tag purple">MODUL DIGITAL INTERAKTIF</span>
              <span class="subtag">Akses Seumur Hidup</span>
            </div>
            <h3 class="ekosistem-title">E-Planner Sukses Mandiri TKA SMP/MTs</h3>
            <p class="ekosistem-desc">
              Lembar kerja digital interaktif untuk menyusun target belajar harian, melacak perkembangan penguasaan bab, dan evaluasi berkala hasil try out.
            </p>

            <ul class="check-list">
              <li class="check-item">
                <span class="check-icon">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </span>
                <span>Jadwal belajar otomatis disesuaikan dengan sisa waktu ujian</span>
              </li>
              <li class="check-item">
                <span class="check-icon">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </span>
                <span>Tracker kelemahan bab matematika & sains secara otomatis</span>
              </li>
              <li class="check-item">
                <span class="check-icon">
                  <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                </span>
                <span>Template evaluasi kesalahan soal per sesi latihan</span>
              </li>
            </ul>
          </div>

          <div class="ekosistem-card-footer">
            <div class="footer-item-info">
              <div style="width: 38px; height: 38px; background: #EFE4F5; color: var(--color-primary); border-radius: 8px; display: flex; align-items: center; justify-content: center;">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                  <line x1="12" y1="18" x2="12.01" y2="18"></line>
                </svg>
              </div>
              <div>
                <div class="footer-text-name">E-Planner Sukses Mandiri</div>
                <div class="footer-text-meta">Versi Digital PDF + Notion Interactive</div>
              </div>
            </div>
            <button type="button" onclick="switchView('paket-bimbingan')" class="btn btn-secondary" style="padding: 8px 16px; font-size: 0.8rem;">
              Unduh E-Planner &rarr;
            </button>
          </div>
        </div>

        <!-- Buku Amazing TKA Card -->
        <div class="ekosistem-card">
          <div>
            <div class="card-top-tags">
              <span class="badge-pill-tag orange">BUKU CETAK EKSKLUSIF</span>
              <span class="subtag">Dikirim ke Seluruh Indonesia</span>
            </div>
            <h3 class="ekosistem-title">Buku Amazing TKA SMP/MTs 2027</h3>
            <p class="ekosistem-desc">
              Buku fisik 500+ halaman berisi rangkuman materi lengkap, bedah konsep esensial, trik pengerjaan cepat soal HOTS, dan 5 paket soal prediksi akurat.
            </p>

            <div class="specs-grid">
              <div class="spec-box">
                <div class="spec-box-title">500+ Halaman</div>
                <div class="spec-box-sub">Kertas Bookpaper Premium</div>
              </div>
              <div class="spec-box">
                <div class="spec-box-title">Kunci & Pembahasan</div>
                <div class="spec-box-sub">Video QR Code Per Nomor</div>
              </div>
            </div>
          </div>

          <div class="ekosistem-card-footer">
            <div class="footer-item-info">
              <img src="{{ asset('images/book_amazing_tka.jpg') }}" alt="Buku Amazing TKA" class="footer-thumb">
              <div>
                <div class="footer-text-name">Amazing TKA 2027</div>
                <div class="footer-text-meta">Termasuk Akses Akun CBT Online 1 Thn</div>
              </div>
            </div>
            <button type="button" onclick="switchView('paket-bimbingan')" class="btn btn-primary" style="padding: 8px 18px; font-size: 0.82rem;">
              Beli Buku Fisik
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 4. CUPLIKAN PEMBELAJARAN VIDEO (CMS-CONNECTED) ==================== -->
  <section class="section-video" id="cuplikan">
    <div class="container">
      <div class="section-header-split">
        <div class="section-head-text">
          <div class="section-tag" style="display: inline-block; margin-bottom: 8px;">YOUTUBE CHANNEL: @Jia.Learning</div>
          <h2 class="section-title">Coba nonton dulu sebelum daftar.</h2>
        </div>
        <p class="section-desc" style="max-width: 440px;">
          Tonton cuplikan materi, bedah soal HOTS, & live class persiapan seleksi TKA gratis langsung dari channel resmi YouTube <strong>@Jia.Learning</strong>.
        </p>
      </div>

      <div class="video-grid">
        @forelse ($allArticles as $art)
          @php
            $ytId = $art->youtube_id ?? 'GsnANfe4UQw';
            $embedUrl = $art->youtube_embed_url ?? "https://www.youtube-nocookie.com/embed/{$ytId}?autoplay=1";
            $thumbUrl = $art->thumbnailUrl();
          @endphp
          <div class="video-card" 
               style="cursor: pointer;"
               data-video-id="{{ $ytId }}"
               data-video-embed="{{ $embedUrl }}"
               data-video-title="{{ $art->title }}">
            <div class="video-thumb-container">
              <img src="{{ $thumbUrl }}" alt="{{ $art->title }}" class="video-thumb-img" loading="lazy" onerror="this.src='{{ asset('images/video_math_tka.jpg') }}'">
              <div class="video-play-btn">▶</div>
              <div class="video-badge-top">
                <span class="badge-pill-tag {{ $loop->first ? 'orange' : 'purple' }}">{{ $art->category_label ?? 'GRATIS' }}</span>
              </div>
              <div class="video-duration">{{ $art->read_time ?? 'Bahas Soal' }}</div>
            </div>
            <div class="video-card-body">
              <h4 class="video-card-title">{{ $art->title }}</h4>
              <div class="video-card-mentor">Pemateri: {{ $art->author_name }}</div>
              <div class="video-card-link">
                <span>Tonton Video Gratis</span> <span>&nearr;</span>
              </div>
            </div>
          </div>
        @empty
          <!-- Fallback Card 1 -->
          <div class="video-card" 
               style="cursor: pointer;"
               data-video-id="GsnANfe4UQw"
               data-video-embed="https://www.youtube-nocookie.com/embed/GsnANfe4UQw?autoplay=1"
               data-video-title="LIVECLASS GRATIS 6 NOVEMBER 2026">
            <div class="video-thumb-container">
              <img src="https://i.ytimg.com/vi/GsnANfe4UQw/hqdefault.jpg" alt="Liveclass Gratis" class="video-thumb-img">
              <div class="video-play-btn">▶</div>
              <div class="video-badge-top"><span class="badge-pill-tag orange">LIVE CLASS</span></div>
              <div class="video-duration">Live Session</div>
            </div>
            <div class="video-card-body">
              <h4 class="video-card-title">LIVECLASS GRATIS 6 NOVEMBER 2026</h4>
              <div class="video-card-mentor">Pemateri: Kak Azzam & Kak Jingga</div>
              <div class="video-card-link"><span>Tonton Video Gratis</span> <span>&nearr;</span></div>
            </div>
          </div>
        @endforelse
      </div>

      <!-- Channel Link CTA -->
      <div style="text-align: center; margin-top: 36px;">
        <a href="https://www.youtube.com/@Jia.Learning/videos" target="_blank" rel="noopener noreferrer" class="btn btn-secondary" style="display: inline-flex; align-items: center; gap: 10px; font-weight: 700; border-radius: 9999px; padding: 12px 28px; box-shadow: 0 4px 14px rgba(0,0,0,0.06); transition: all 0.2s ease;">
          <svg width="22" height="22" viewBox="0 0 24 24" fill="#FF0000"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
          <span>Kunjungi & Subscribe Channel YouTube @Jia.Learning</span>
          <span style="font-size: 1.1rem;">&nearr;</span>
        </a>
      </div>
    </div>
  </section>

  <!-- ==================== 5. INGIN MENGENAL JIA LEARNING LEBIH DEKAT? (DARK BANNER) ==================== -->
  <section class="section-dark-banner">
    <div class="container">
      <div class="dark-banner-card">
        <div class="dark-banner-header">
          <div class="dark-banner-head-text">
            <div class="dark-banner-tag">KONSULTASI & KOMUNITAS PEJUANG</div>
            <h2 class="dark-banner-title">Ingin Mengenal JIA Learning Lebih Dekat?</h2>
            <p class="dark-banner-subtitle">
              Bergabunglah bersama ribuan siswa pejuang SMA Unggulan lainnya dan dapatkan akses bimbingan eksklusif dari para mentor juara kompetisi nasional.
            </p>
          </div>
          <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20gabung%20komunitas%20pejuang%20TKA" target="_blank" rel="noopener noreferrer" class="btn btn-ghost-white">
            Gabung Komunitas Pejuang &rsaquo;
          </a>
        </div>

        <div class="dark-banner-grid">
          <!-- Box 1 -->
          <div class="dark-feature-box">
            <div class="dark-feature-icon" style="color: #FEA619;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
              </svg>
            </div>
            <h3 class="dark-feature-title">Ruang Tanya Mentor</h3>
            <p class="dark-feature-desc">
              Diskusi bebas kapan saja tanpa rasa takut atau malu jika belum paham konsep suatu materi.
            </p>
            <a href="javascript:void(0)" onclick="switchView('pahami-jia')" class="dark-feature-link">Tanya Mentor Sekarang &rarr;</a>
          </div>

          <!-- Box 2 (Highlight White) -->
          <div class="dark-feature-box box-white">
            <div class="dark-feature-icon" style="color: #FFFFFF;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
              </svg>
            </div>
            <h3 class="dark-feature-title">Modul & Bank Soal Gratis</h3>
            <p class="dark-feature-desc">
              Unduh rangkuman materi ringkas dan puluhan contoh soal latihan mingguan berstandar HOTS.
            </p>
            <a href="javascript:void(0)" onclick="switchView('paket-bimbingan')" class="dark-feature-link" style="color: #FFFFFF;">Unduh Materi Gratis &rarr;</a>
          </div>

          <!-- Box 3 -->
          <div class="dark-feature-box">
            <div class="dark-feature-icon" style="color: #FEA619;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z"></path>
                <path d="M6 12v5c3 3 9 3 12 0v-5"></path>
              </svg>
            </div>
            <h3 class="dark-feature-title">
              @if (isset($liveClasses) && $liveClasses->isNotEmpty())
                {{ $liveClasses->first()->title }}
              @else
                Webinar Strategi TKA
              @endif
            </h3>
            <p class="dark-feature-desc">
              @if (isset($liveClasses) && $liveClasses->isNotEmpty())
                {{ $liveClasses->first()->mentor_name }} &bull; {{ $liveClasses->first()->time_label }}
              @else
                Sesi live rutin membahas perkembangan tipe soal terbaru seleksi SMA unggulan se-Indonesia.
              @endif
            </p>
            <a href="javascript:void(0)" onclick="switchView('paket-bimbingan')" class="dark-feature-link">Daftar Webinar Gratis &rarr;</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- ==================== 6. CONSULTATION CALLOUT STRIP ==================== -->
  <section class="section-consultation-strip">
    <div class="container">
      <div class="consultation-card">
        <div class="consultation-left">
          <div class="consultation-icon" style="color: #FEA619;">
            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M3 18v-6a9 9 0 0 1 18 0v6"></path>
              <path d="M21 19a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3zM3 19a2 2 0 0 0 2 2h1a2 2 0 0 0 2-2v-3a2 2 0 0 0-2-2H3z"></path>
            </svg>
          </div>
          <div>
            <div style="font-size: 0.72rem; font-weight: 800; text-transform: uppercase; color: #C05600; letter-spacing: 0.06em; margin-bottom: 2px;">KONSULTASI AKADEMIK</div>
            <h3 class="consultation-title">Masih Ragu Memilih Program Persiapan TKA untuk Anak Anda?</h3>
            <p class="consultation-desc">
              Tim konsultan akademik JIA siap membantu memetakan kemampuan awal siswa, memberikan rekomendasi paket belajar terbaik, dan menjelaskan alur seleksi TKA.
            </p>
          </div>
        </div>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20konsultasi%20pemilihan%20paket%20belajar%20TKA" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 12px 26px;">
          Konsultasi Gratis via WhatsApp
        </a>
      </div>
    </div>
  </section>

</div>
