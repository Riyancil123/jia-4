@if (($settings['promo_active'] ?? '1') === '1' && !empty($settings['topbar_text']))
<!-- Promo Topbar Strip -->
<div class="site-promo-topbar" style="background: var(--color-accent, #FEA619); color: var(--color-primary, #370052); font-size: 0.75rem; font-weight: 700; padding: 6px 16px; text-align: center; border-bottom: 1px solid var(--color-accent-border, #FDE68A);">
  <div class="container" style="display: flex; align-items: center; justify-content: center; gap: 8px; flex-wrap: wrap;">
    <span style="background: var(--color-primary, #370052); color: #fff; padding: 2px 8px; border-radius: 9999px; font-size: 0.68rem; font-weight: 800; text-transform: uppercase;">{{ $settings['topbar_badge'] ?? 'PROMO' }}</span>
    <span>{{ $settings['topbar_text'] }}</span>
  </div>
</div>
@endif

<!-- Site Header (Exact Match with Reference Benchmark, Clean & Professional) -->
<header class="site-header" id="header-utama">
  <div class="container navbar">
    <!-- Brand Logo -->
    <a href="javascript:void(0)" onclick="switchView('beranda')" class="brand-logo" id="headerLogo">
      <div class="brand-icon">J</div>
      <div class="brand-text-wrap">
        <div class="brand-title">JIA <span>Learning</span></div>
        <div class="brand-subtitle">{{ $settings['company_business_field'] ?? 'Bimbingan Belajar TKA SMP/MTs' }}</div>
      </div>
    </a>

    <!-- Floating Nav Pills -->
    <nav class="nav-pill-container" aria-label="Main Navigation">
      <button type="button" onclick="switchView('beranda')" class="nav-link active" id="nav-btn-beranda">Beranda</button>
      <button type="button" onclick="switchView('paket-bimbingan')" class="nav-link" id="nav-btn-program">Program</button>
      <button type="button" onclick="switchView('pahami-jia')" class="nav-link" id="nav-btn-mentor">Mentor</button>
      <button type="button" onclick="switchView('panduan-simulasi-faq')" class="nav-link" id="nav-btn-testimoni">Testimoni</button>
      <button type="button" onclick="switchView('panduan-simulasi-faq')" class="nav-link" id="nav-btn-faq">FAQ</button>
    </nav>

    <!-- Right Actions -->
    <div class="header-actions">
      <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%2C%20saya%20ingin%20daftar%20program%20TKA%202027" target="_blank" rel="noopener noreferrer" class="btn btn-header-cta" id="ctaHeaderBtn">
        Daftar Sekarang &rsaquo;
      </a>
      <div class="user-avatar-btn" title="Akun Siswa">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
          <circle cx="12" cy="7" r="4"></circle>
        </svg>
      </div>
      <button class="mobile-toggle" id="mobileMenuToggle" aria-label="Buka Menu Navigasi" style="display: flex; align-items: center; justify-content: center;">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round">
          <line x1="3" y1="6" x2="21" y2="6"></line>
          <line x1="3" y1="12" x2="21" y2="12"></line>
          <line x1="3" y1="18" x2="21" y2="18"></line>
        </svg>
      </button>
    </div>
  </div>

  <!-- Mobile Drawer Menu -->
  <div class="mobile-menu-drawer" id="mobileDrawer">
    <a href="javascript:void(0)" onclick="switchView('beranda'); toggleMobileMenu(false);" class="mobile-nav-link active">Beranda</a>
    <a href="javascript:void(0)" onclick="switchView('paket-bimbingan'); toggleMobileMenu(false);" class="mobile-nav-link">Program Belajar</a>
    <a href="javascript:void(0)" onclick="switchView('pahami-jia'); toggleMobileMenu(false);" class="mobile-nav-link">Mentor Juara</a>
    <a href="javascript:void(0)" onclick="switchView('panduan-simulasi-faq'); toggleMobileMenu(false);" class="mobile-nav-link">Testimoni Siswa & Orang Tua</a>
    <a href="javascript:void(0)" onclick="switchView('panduan-simulasi-faq'); toggleMobileMenu(false);" class="mobile-nav-link">FAQ & Pusat Bantuan</a>
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}?text=Halo%20Admin%20JIA%20Learning" target="_blank" rel="noopener noreferrer" class="btn btn-primary" style="margin-top: 10px;">Daftar Sekarang</a>
  </div>
</header>
