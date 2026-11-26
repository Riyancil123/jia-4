<!-- ==================== VIEW: PROGRAM BELAJAR & SIMULASI CBT 2027 ==================== -->
<div id="view-paket-bimbingan" class="tab-content">
    
  <!-- Program Hero Section -->
  <section class="hero-section" style="padding-bottom: 40px;">
    <div class="hero-glow-bg"></div>
    <div class="container">
      <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 30px; flex-wrap: wrap;">
        <div style="max-width: 680px;">
          <div class="badge-soft" style="margin-bottom: 16px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#FEA619" stroke="#FEA619" stroke-width="1.5">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            <span>KURIKULUM TERUPDATE TKA 2027</span>
          </div>
          <h1 class="hero-title" style="margin-bottom: 16px;">
            Pilihan Program Belajar &<br>
            Simulasi CBT Ujian TKA<br>
            SMP/MTs 2027
          </h1>
          <p class="hero-subtitle">
            Pilih jalur persiapan terbaik yang sesuai dengan ritme belajarmu. Dari belajar mandiri terarah, paket modul cetak, hingga bimbingan intensif interaktif bersama mentor juara nasional.
          </p>
        </div>

        <!-- Social Proof Floating Badge -->
        <div style="background: #FFFFFF; border: 1px solid var(--color-card-border); border-radius: var(--radius-lg); padding: 18px 24px; box-shadow: var(--shadow-md); display: flex; align-items: center; gap: 14px; max-width: 320px;">
          <div style="width: 44px; height: 44px; border-radius: 12px; background: #FFF7EA; color: #C05600; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M6 9H4.5a2.5 2.5 0 0 1 0-5H6"></path>
              <path d="M18 9h1.5a2.5 2.5 0 0 0 0-5H18"></path>
              <path d="M4 22h16"></path>
              <path d="M10 14.66V17c0 .55-.45 1-1 1H7"></path>
              <path d="M14 14.66V17c0 .55.45 1 1 1h2"></path>
              <path d="M18 2H6v7a6 6 0 0 0 12 0V2Z"></path>
            </svg>
          </div>
          <div>
            <div style="font-size: 1.15rem; font-weight: 800; color: var(--color-primary); line-height: 1.1;">{{ $settings['stat_pass_rate'] ?? '94.8%' }} Lolos</div>
            <div style="font-size: 0.74rem; color: var(--text-muted); margin-top: 2px;">Siswa binaan sukses masuk SMA Unggulan Target 2026</div>
          </div>
        </div>
      </div>

      <!-- Filter Tabs Bar -->
      <div class="filter-tabs-bar" data-target-group="program-cards">
        <button type="button" class="filter-tab active" data-filter="all">Semua Program</button>
        <button type="button" class="filter-tab" data-filter="mandiri">Paket Belajar Mandiri</button>
        <button type="button" class="filter-tab" data-filter="cbt">Simulasi CBT Online</button>
        <button type="button" class="filter-tab" data-filter="mentoring">Intensif Mentoring</button>
        <button type="button" class="filter-tab" data-filter="buku">Buku & Modul Cetak</button>
      </div>

      <!-- Program Package Cards (Dynamic CMS Integration with Benchmark Styling) -->
      <div class="program-cards-grid">
        @php
          $allDisplayPrograms = $programsExam->merge($programsSchool);
        @endphp

        @forelse ($allDisplayPrograms as $program)
          @php
            $cat = 'all';
            if ($program->category === 'modul_sekolah') {
              $cat = 'buku';
            } elseif (str_contains(strtolower($program->slug), 'starter')) {
              $cat = 'mandiri';
            } elseif (str_contains(strtolower($program->slug), 'cbt')) {
              $cat = 'cbt';
            } else {
              $cat = 'mentoring';
            }
          @endphp
          <div class="program-pkg-card {{ $program->is_featured ? 'popular' : '' }}" data-group="program-cards" data-category="{{ $cat }}">
            @if ($program->is_featured)
              <div class="pkg-popular-badge">
                <svg width="12" height="12" viewBox="0 0 24 24" fill="#FEA619" stroke="#FEA619" stroke-width="1.5" style="display:inline-block; vertical-align: -1px; margin-right: 3px;">
                  <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                </svg>
                PALING DIMINATI
              </div>
            @endif
            <div>
              <div class="pkg-top-tag">{{ $program->badge_text ?? 'PROGRAM TKA' }}</div>
              <h3 class="pkg-title">{{ $program->title }}</h3>
              <p class="pkg-desc">{{ $program->description }}</p>
              <div class="pkg-price-wrap" {!! $program->is_featured ? 'style="background: #FFF7EA; border-color: var(--color-accent-border);"' : '' !!}>
                @if ($program->price_label)
                  <div class="pkg-price-current" {!! $program->is_featured ? 'style="color: #B45309;"' : '' !!}>{{ $program->price_label }}</div>
                @else
                  <div class="pkg-price-current">Hubungi Kami</div>
                @endif
              </div>
              <ul class="pkg-features-list">
                @foreach ($program->features ?? [] as $feat)
                  <li class="pkg-feature-item">
                    <span class="check-icon" style="display: inline-flex; align-items: center; justify-content: center; width: 16px; height: 16px; border-radius: 50%; background: #E6F4EA; color: #137333; flex-shrink: 0;">
                      <svg width="10" height="10" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                    </span>
                    <span>{{ $feat }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
            <a href="{{ $program->cta_url ?: ('https://wa.me/' . preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349')) }}" target="_blank" rel="noopener noreferrer" class="btn {{ $program->is_featured ? 'btn-primary' : 'btn-secondary' }} pkg-action-btn">
              {{ $program->cta_label ?: 'Daftar Sekarang' }} &rsaquo;
            </a>
          </div>
        @empty
          <div class="program-pkg-card popular" data-group="program-cards" data-category="cbt">
            <div class="pkg-popular-badge">PALING DIMINATI</div>
            <div>
              <div class="pkg-top-tag">SIMULASI CBT ADAPTIF</div>
              <h3 class="pkg-title">CBT Pro Target SMA</h3>
              <p class="pkg-desc">Simulasi CBT 100% mirip antarmuka tes seleksi asli dengan analisis kelemahan mendalam.</p>
              <div class="pkg-price-wrap" style="background: #FFF7EA; border-color: var(--color-accent-border);">
                <div class="pkg-price-current" style="color: #B45309;">Rp 449.000 <span class="pkg-price-period">/ paket</span></div>
              </div>
            </div>
            <a href="https://wa.me/6285196906349" class="btn btn-primary pkg-action-btn">Daftar CBT Pro &rsaquo;</a>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Consultation Callout Strip -->
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
            <h3 class="consultation-title">Bingung Memilih Paket yang Tepat?</h3>
            <p class="consultation-desc">
              Konsultasikan target SMA impian dan kelemahan belajarmu dengan tim kurikulum JIA untuk rekomendasi paket terbaik.
            </p>
          </div>
        </div>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20konsultasi%20pemilihan%20paket%20belajar" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 12px 26px;">
          Konsultasi Gratis via WhatsApp
        </a>
      </div>
    </div>
  </section>

</div>
