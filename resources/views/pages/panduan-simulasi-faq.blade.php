<!-- ==================== VIEW: TESTIMONI SISWA & PUSAT BANTUAN FAQ ==================== -->
<div id="view-panduan-simulasi-faq" class="tab-content">

  <!-- ==================== PART 1: TESTIMONI SISWA & ORANG TUA ==================== -->
  <section class="hero-section" id="testimoni-section" style="padding-bottom: 20px;">
    <div class="hero-glow-bg"></div>
    <div class="container">
      <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 40px; flex-wrap: wrap;">
        <div style="max-width: 680px;">
          <div class="badge-soft" style="margin-bottom: 16px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#FEA619" stroke="#FEA619" stroke-width="1.5">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            <span>HASIL NYATA SELEKSI TKA TERAKHIR</span>
          </div>
          <h1 class="hero-title" style="margin-bottom: 16px;">
            Bukan Testimoni Template.<br>
            <span class="text-orange">Cerita Nyata</span> Siswa & Orang<br>
            Tua JIA.
          </h1>
          <p class="hero-subtitle">
            Transparansi hasil dan perjalanan belajar nyata para pejuang SMA unggulan. Dari ketakutan menghadapi soal sulit hingga sukses lolos dengan pendampingan mentor juara berhati hangat.
          </p>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-card-border); border-radius: var(--radius-lg); padding: 18px 24px; box-shadow: var(--shadow-sm); max-width: 340px; display: flex; align-items: center; gap: 14px;">
          <div style="width: 44px; height: 44px; border-radius: 12px; background: #FFF7EA; color: #C05600; display: flex; align-items: center; justify-content: center; font-size: 1.4rem;">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="#FEA619" stroke="#FEA619" stroke-width="1.5">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
          </div>
          <div>
            <div style="font-size: 1.25rem; font-weight: 800; color: var(--color-primary); line-height: 1.1;">{{ $settings['stat_rating'] ?? '4.9 / 5.0' }}</div>
            <div style="font-size: 0.74rem; color: var(--text-muted); margin-top: 2px;">Berdasarkan {{ $settings['stat_students'] ?? '850+' }} ulasan terverifikasi siswa & wali murid</div>
          </div>
        </div>
      </div>

      <!-- 3 Key Impact Stats Cards -->
      <div class="impact-stats-grid">
        <div class="impact-stat-card">
          <div class="impact-tag">RATA-RATA KENAIKAN SKOR TKA</div>
          <div class="impact-val">+23.4 <span style="font-size: 1.2rem; font-weight: 700; color: var(--text-muted);">Poin</span></div>
          <p class="impact-desc">
            Kenaikan rata-rata skor tryout pertama dibanding skor hasil seleksi TKA riil siswa binaan JIA Learning.
          </p>
          <div class="sparkline-bar">
            <div class="sparkline-fill" style="width: 78%;"></div>
          </div>
        </div>

        <div class="impact-stat-card">
          <div class="impact-tag">TINGKAT KELULUSAN TARGET SMA</div>
          <div class="impact-val">{{ $settings['stat_pass_rate'] ?? '94.8%' }} <span style="font-size: 1.2rem; font-weight: 700; color: var(--color-teal);">Lulus</span></div>
          <p class="impact-desc">
            Dari total siswa yang mengikuti bimbingan intensif dan simulasi CBT lengkap JIA angkatan 2026.
          </p>
          <div class="sparkline-bar">
            <div class="sparkline-fill" style="width: 95%; background: var(--color-teal);"></div>
          </div>
        </div>

        <div class="impact-stat-card">
          <div class="impact-tag">KEPUASAN ORANG TUA SISWA</div>
          <div class="impact-val">4.9 <span style="font-size: 1.2rem; font-weight: 700; color: var(--text-muted);">/ 5.0</span></div>
          <p class="impact-desc">
            Rekomendasi dari para orang tua murid terhadap kejelasan laporan perkembangan belajar mingguan.
          </p>
          <div style="display: flex; align-items: center; gap: 4px; color: #F59E0B; margin-top: 10px; font-size: 0.82rem; font-weight: 700;">
            <span style="display: inline-flex; gap: 2px;">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
              <svg width="15" height="15" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
            </span>
            <span>Rating Bintang 5</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Testimonial Cards Grid -->
  <section class="section-pilar" style="padding-top: 40px; padding-bottom: 40px;">
    <div class="container">
      <div class="section-header-split">
        <div class="section-head-text">
          <div class="section-tag">ULASAN TERVERIFIKASI</div>
          <h2 class="section-title">Dengar Pengalaman Langsung Mereka</h2>
        </div>
      </div>

      <!-- Testimonial Grid -->
      <div class="testimonials-grid">
        @forelse ($testimonials as $testi)
          <div class="testi-card">
            <div>
              <div class="testi-card-header">
                <span class="badge-pill-tag orange">SISWA & WALI MURID JIA</span>
                <div class="testi-stars" style="display: inline-flex; gap: 2px;">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
              </div>
              <p class="testi-quote">
                "{{ $testi->quote }}"
              </p>
            </div>
            <div class="testi-author-row">
              <div class="testi-avatar" style="background: #FFF7EA; color: #C05600;">{{ $testi->avatar_initial ?? 'FA' }}</div>
              <div>
                <div class="testi-name">{{ $testi->name }}</div>
                <div class="testi-school">{{ $testi->role }}</div>
              </div>
            </div>
          </div>
        @empty
          <div class="testi-card">
            <div>
              <div class="testi-card-header">
                <span class="badge-pill-tag orange">LOLOS SMA PRADITA DIRGANTARA</span>
                <div class="testi-stars" style="display: inline-flex; gap: 2px;">
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                  <svg width="13" height="13" viewBox="0 0 24 24" fill="#F59E0B" stroke="#F59E0B" stroke-width="1"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>
                </div>
              </div>
              <p class="testi-quote">
                "Dulu aku paling takut sama soal HOTS matematika. Rasanya rumus banyak banget tapi gak tahu kapan dipakainya. Di JIA, Kak Azzam ngajarin konsep intinya sampai paham betul, bukan hafalan! Pas tes seleksi kemarin rasanya familiar semua."
              </p>
            </div>
            <div class="testi-author-row">
              <div class="testi-avatar" style="background: #FFF7EA; color: #C05600;">FA</div>
              <div>
                <div class="testi-name">Fadhil Athallah</div>
                <div class="testi-school">Alumni SMPN 1 Surabaya • Lolos SMA Pradita 2026</div>
              </div>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- ==================== PART 2: FAQ & PUSAT BANTUAN ==================== -->
  <section class="hero-section" id="faq-section" style="padding-top: 40px; padding-bottom: 20px; border-top: 1px solid var(--color-card-border);">
    <div class="container">
      <div style="max-width: 760px;">
        <div class="badge-soft" style="margin-bottom: 16px;">
          <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>
          <span>PUSAT BANTUAN RESMI JIA LEARNING</span>
        </div>
        <h1 class="hero-title" style="margin-bottom: 14px;">
          Pertanyaan yang Sering Ditanyakan<br>
          (FAQ)
        </h1>
        <p class="hero-subtitle">
          Temukan jawaban seputar program belajar, simulasi CBT, jadwal bimbingan, hingga fasilitas modul dan garansi kelulusan yang disediakan oleh JIA Learning.
        </p>

        <!-- Live Search Box -->
        <div class="faq-search-box">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#8E8699" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 10px;">
            <circle cx="11" cy="11" r="8"></circle>
            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
          </svg>
          <input type="text" id="faqSearchInput" class="faq-search-input" placeholder="Ketik kata kunci (misal: simulasi CBT, cara daftar, jadwal mentoring)...">
          <button type="button" class="faq-search-btn">Cari Solusi</button>
        </div>
      </div>
    </div>
  </section>

  <!-- Two Column Layout: FAQ Accordion -->
  <section class="section-pilar" style="padding-top: 10px; padding-bottom: 40px;">
    <div class="container faq-layout-grid">
      <!-- Accordion List -->
      <div class="accordion-list" id="faqAccordionList">
        @php
          $allFaqItems = \App\Models\Faq::where('is_active', true)->orderBy('sort_order')->get();
        @endphp

        @forelse ($allFaqItems as $idx => $f)
          <div class="accordion-item {{ $idx === 0 ? 'active' : '' }}" data-group="faq-items">
            <div class="accordion-header">
              <div class="accordion-question-wrap">
                <span class="accordion-num">{{ sprintf('%02d', $idx + 1) }}</span>
                <span class="accordion-question">{{ $f->question }}</span>
              </div>
              <div class="accordion-icon-toggle">+</div>
            </div>
            <div class="accordion-body">
              <div class="accordion-answer">
                {{ $f->answer }}
              </div>
            </div>
          </div>
        @empty
          <div class="accordion-item active">
            <div class="accordion-header">
              <div class="accordion-question-wrap">
                <span class="accordion-num">01</span>
                <span class="accordion-question">Apa saja yang didapatkan di program TKA Master Class?</span>
              </div>
              <div class="accordion-icon-toggle">+</div>
            </div>
            <div class="accordion-body">
              <div class="accordion-answer">
                Siswa mendapatkan modul materi digital & cetak lengkap, akses simulasi CBT 1 tahun, 40+ sesi kelas live intensif, bank 2.500+ soal HOTS berstandar seleksi SMA Unggulan, serta grup pendampingan harian 24/7 bersama mentor juara kompetisi nasional.
              </div>
            </div>
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
            <div style="font-size: 0.72rem; font-weight: 800; text-transform: uppercase; color: #C05600; letter-spacing: 0.06em; margin-bottom: 2px;">PUSAT KONSULTASI</div>
            <h3 class="consultation-title">Punya Pertanyaan yang Belum Terjawab di Atas?</h3>
            <p class="consultation-desc">
              Customer support dan konsultan akademik JIA siap menjawab pertanyaanmu setiap hari pukul 08.00–20.00 WIB via WhatsApp.
            </p>
          </div>
        </div>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%2C%20saya%20punya%20pertanyaan%20seputar%20bimbingan" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 12px 26px;">
          Tanya CS via WhatsApp
        </a>
      </div>
    </div>
  </section>

</div>
