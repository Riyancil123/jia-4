<!-- ==================== VIEW: MENTOR JUARA & TIM AKADEMIK ==================== -->
<div id="view-pahami-jia" class="tab-content">

  <!-- Hero Section -->
  <section class="hero-section" style="padding-bottom: 20px;">
    <div class="hero-glow-bg"></div>
    <div class="container">
      <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 40px; flex-wrap: wrap;">
        <div style="max-width: 680px;">
          <div class="badge-soft" style="margin-bottom: 16px;">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="#FEA619" stroke="#FEA619" stroke-width="1.5">
              <polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
            </svg>
            <span>MENTOR BERPENGALAMAN & BERPRESTASI NASIONAL</span>
          </div>
          <h1 class="hero-title" style="margin-bottom: 16px;">
            Belajar Langsung dari <span class="text-orange">Mentor Juara</span><br>
            Kompetisi Nasional & Pakar Kurikulum<br>
            TKA
          </h1>
          <p class="hero-subtitle">
            Tim pengajar kami bukan sekadar pengajar biasa, melainkan para peraih medali olimpiade sains/matematika nasional, alumni perguruan tinggi ternama, dan praktisi pembuat modul seleksi TKA berpengalaman.
          </p>
        </div>

        <div style="background: #FFFFFF; border: 1px solid var(--color-card-border); border-radius: var(--radius-lg); padding: 18px 22px; box-shadow: var(--shadow-sm); max-width: 340px;">
          <div style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px;">
            <div class="avatar-stack">
              <img src="{{ asset('images/mentor_azzam.jpg') }}" alt="Kak Azzam">
              <img src="{{ asset('images/mentor_jingga.jpg') }}" alt="Kak Jingga">
            </div>
            <div style="font-size: 0.8rem; font-weight: 700; color: var(--color-primary);">100% Mentor Terverifikasi</div>
          </div>
          <div style="font-size: 0.74rem; color: var(--text-muted); line-height: 1.45;">
            Dipercaya lebih dari 1.200+ siswa dan orang tua di seluruh Indonesia untuk bimbingan masuk SMA unggulan.
          </div>
        </div>
      </div>

      <!-- 4 Stats Cards Row -->
      <div class="stats-cards-row">
        <div class="stat-metric-card">
          <div class="stat-metric-icon">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 10v6M2 10l10-5 10 5-10 5z"></path><path d="M6 12v5c3 3 9 3 12 0v-5"></path></svg>
          </div>
          <div>
            <div class="stat-metric-val">10+</div>
            <div class="stat-metric-label">Pakar Kurikulum</div>
            <div class="stat-metric-sub">Yang telah meriset ribuan soal seleksi SMA</div>
          </div>
        </div>

        <div class="stat-metric-card">
          <div class="stat-metric-icon" style="background: #EFE4F5; color: var(--color-primary);">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="8" r="7"></circle><polyline points="8.21 13.89 7 23 12 20 17 23 15.79 13.88"></polyline></svg>
          </div>
          <div>
            <div class="stat-metric-val">100%</div>
            <div class="stat-metric-label">Juara OSN & Prestasi</div>
            <div class="stat-metric-sub">Peraih medali olimpiade & alumni PTN Top</div>
          </div>
        </div>

        <div class="stat-metric-card">
          <div class="stat-metric-icon" style="background: #FEF3C7; color: #D97706;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 14 14"></polyline></svg>
          </div>
          <div>
            <div class="stat-metric-val">8+ Thn</div>
            <div class="stat-metric-label">Pengalaman Mengajar</div>
            <div class="stat-metric-sub">Spesialis bimbingan masuk SMA Unggulan</div>
          </div>
        </div>

        <div class="stat-metric-card">
          <div class="stat-metric-icon" style="background: #D1FAE5; color: #065F46;">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg>
          </div>
          <div>
            <div class="stat-metric-val">{{ $settings['stat_students'] ?? '850+' }}</div>
            <div class="stat-metric-label">Alumni Tembus Target</div>
            <div class="stat-metric-sub">Siswa sukses masuk SMA impian binaan mentor</div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section: Mentor Ahli & Pengembang Modul (CMS-Connected) -->
  <section class="section-pilar" style="padding-top: 50px;">
    <div class="container">
      <div class="section-header-split">
        <div class="section-head-text">
          <div class="section-tag">TIM AKADEMIK JIA</div>
          <h2 class="section-title">Mentor Ahli & Pengembang Modul</h2>
        </div>
        <p class="section-desc" style="max-width: 480px;">
          Setiap materi disusun, direvisi, dan diajarkan langsung oleh mentor yang memiliki rekam jejak terbukti di bidangnya.
        </p>
      </div>

      <div class="mentor-grid">
        @php
          $allDisplayMentors = $berandaMentors->isNotEmpty() ? $berandaMentors : \App\Models\Mentor::where('is_active', true)->orderBy('sort_order')->get();
        @endphp

        @forelse ($allDisplayMentors as $mentor)
          <div class="mentor-card">
            <div class="mentor-avatar-col">
              <img src="{{ asset($mentor->photo ?: 'images/mentor_azzam.jpg') }}" alt="{{ $mentor->name }}" class="mentor-avatar-img">
              <span class="mentor-tag-subtes">{{ strtoupper($mentor->subject) }}</span>
            </div>
            <div class="mentor-info-col">
              <h3 class="mentor-name">{{ $mentor->name }}</h3>
              <div class="mentor-role">{{ $mentor->campus }}</div>
              
              <div class="mentor-achievement-box">
                <ul>
                  @foreach ($mentor->achievements ?? [] as $ach)
                    <li style="display: flex; align-items: flex-start; gap: 8px;">
                      <span style="color: #0D9488; flex-shrink: 0; margin-top: 3px;">
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                      </span>
                      <span>{{ $ach }}</span>
                    </li>
                  @endforeach
                </ul>
              </div>

              @if ($mentor->quote)
                <div class="mentor-quote-box" style="font-size: 0.78rem; font-style: italic; color: var(--text-muted); margin-bottom: 14px; padding: 10px 14px; background: #FAF7F0; border-radius: 10px; border-left: 3px solid var(--color-accent);">
                  "{{ $mentor->quote }}"
                </div>
              @endif

              <div class="mentor-actions-row">
                <a href="#cuplikan" onclick="switchView('beranda')" class="mentor-action-link">Lihat Video Mengajar &nearr;</a>
                <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text={{ urlencode('Halo Admin JIA, saya ingin tanya tentang bimbingan ' . $mentor->name) }}" target="_blank" rel="noopener noreferrer" class="mentor-action-link" style="color: var(--color-accent-text);">
                  Tanya {{ explode(',', $mentor->name)[0] }} &rarr;
                </a>
              </div>
            </div>
          </div>
        @empty
          <!-- Fallback Mentors if empty -->
          <div class="mentor-card">
            <div class="mentor-avatar-col">
              <img src="{{ asset('images/mentor_azzam.jpg') }}" alt="Kak Azzam, S.Si." class="mentor-avatar-img">
              <span class="mentor-tag-subtes">MATEMATIKA & LOGIKA</span>
            </div>
            <div class="mentor-info-col">
              <h3 class="mentor-name">Kak Azzam, S.Si.</h3>
              <div class="mentor-role">Head Mentor Matematika & Penalaran Logis</div>
              <div class="mentor-achievement-box">
                <ul>
                  <li style="display: flex; align-items: flex-start; gap: 8px;">
                    <span style="color: #0D9488; flex-shrink: 0; margin-top: 3px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    <span>Peraih Medali Emas OSN Matematika Nasional</span>
                  </li>
                  <li style="display: flex; align-items: flex-start; gap: 8px;">
                    <span style="color: #0D9488; flex-shrink: 0; margin-top: 3px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    <span>Alumnus Matematika ITB dengan predikat Cumlaude</span>
                  </li>
                  <li style="display: flex; align-items: flex-start; gap: 8px;">
                    <span style="color: #0D9488; flex-shrink: 0; margin-top: 3px;"><svg width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    <span>7+ Tahun membimbing ribuan siswa tembus SMA Pradita & Taruna Nusantara</span>
                  </li>
                </ul>
              </div>
              <div class="mentor-actions-row">
                <a href="#cuplikan" onclick="switchView('beranda')" class="mentor-action-link">Lihat Video Mengajar &nearr;</a>
                <a href="https://wa.me/6285196906349" class="mentor-action-link" style="color: var(--color-accent-text);">Tanya Kak Azzam &rarr;</a>
              </div>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </section>

  <!-- Section: Update Platform & Catatan Rilis (CMS-Connected) -->
  @if (isset($platformUpdates) && $platformUpdates->count())
  <section class="section-pilar" style="padding-top: 30px; padding-bottom: 30px;">
    <div class="container">
      <div class="section-header-split">
        <div class="section-head-text">
          <div class="section-tag">CATATAN RILIS RESMI</div>
          <h2 class="section-title">Pembaruan & Inovasi Platform</h2>
        </div>
      </div>
      <div style="display: grid; gap: 16px; margin-top: 20px;">
        @foreach ($platformUpdates as $update)
          <div style="background: #FFFFFF; border: 1px solid var(--color-card-border); border-radius: var(--radius-lg); padding: 20px 24px;">
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 8px;">
              <span class="badge-pill-tag purple">{{ $update->version_badge }}</span>
              <span style="font-size: 0.75rem; color: var(--text-muted);">{{ $update->release_date_label }}</span>
            </div>
            <h3 style="font-size: 1.1rem; font-weight: 800; color: var(--color-primary); margin-bottom: 6px;">{{ $update->title }}</h3>
            <p style="font-size: 0.85rem; color: var(--text-muted); line-height: 1.5;">{{ $update->summary }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>
  @endif

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
            <div style="font-size: 0.72rem; font-weight: 800; text-transform: uppercase; color: #C05600; letter-spacing: 0.06em; margin-bottom: 2px;">KONSULTASI BELAJAR</div>
            <h3 class="consultation-title">Ingin Dibimbing Langsung oleh Mentor Juara?</h3>
            <p class="consultation-desc">
              Daftarkan diri di program Master Class VIP dan dapatkan sesi pendampingan tanya jawab tugas sekolah maupun soal HOTS setiap hari.
            </p>
          </div>
        </div>
        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20dibimbing%20mentor%20juara" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="padding: 12px 26px;">
          Daftar Bimbingan Mentor &rsaquo;
        </a>
      </div>
    </div>
  </section>

</div>
