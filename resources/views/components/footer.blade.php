<!-- Site Footer (Exact Match with Reference Benchmark, Clean & Professional) -->
<footer class="site-footer">
  <div class="container">
    <div class="footer-top-grid">
      <!-- Brand Col -->
      <div class="footer-brand-col">
        <div class="footer-logo-card">
          <img src="{{ asset('images/jia_logo.png') }}" alt="JIA LEARNING">
        </div>
        <p class="footer-tagline">
          {{ $settings['footer_description'] ?? 'Pendamping belajar yang serius untuk hasil TKA yang nyata.' }}
        </p>
        <div class="footer-social-row">
          <a href="https://instagram.com/jialearning" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="Instagram">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
              <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
            </svg>
          </a>
          <a href="https://youtube.com/@jialearning" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="YouTube">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M22.54 6.42a2.78 2.78 0 0 0-1.94-2C18.88 4 12 4 12 4s-6.88 0-8.6.46a2.78 2.78 0 0 0-1.94 2A29 29 0 0 0 1 11.75a29 29 0 0 0 .46 5.33A2.78 2.78 0 0 0 3.4 19c1.72.46 8.6.46 8.6.46s6.88 0 8.6-.46a2.78 2.78 0 0 0 1.94-2 29 29 0 0 0 .46-5.25 29 29 0 0 0-.46-5.33z"></path>
              <polygon points="9.75 15.02 15.5 11.75 9.75 8.48 9.75 15.02"></polygon>
            </svg>
          </a>
          <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}" target="_blank" rel="noopener noreferrer" class="footer-social-btn" title="WhatsApp">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path>
            </svg>
          </a>
          <a href="mailto:{{ $settings['support_email'] ?? 'azzam@jialearning.com' }}" class="footer-social-btn" title="Email">
            <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
              <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
          </a>
        </div>
        <div class="footer-contact-details">
          <div>JIA Learning · +62 851-9690-6349</div>
          <div>@jialearning</div>
          <div>Senin–Minggu, 08.00–20.00 WIB</div>
        </div>
      </div>

      <!-- Col 2: Program -->
      <div>
        <h4 class="footer-column-title">PROGRAM</h4>
        <ul class="footer-nav-list">
          <li><a href="javascript:void(0)" onclick="switchView('paket-bimbingan')">TKA Starter Class</a></li>
          <li><a href="javascript:void(0)" onclick="switchView('paket-bimbingan')">E-Planner Sukses Mandiri</a></li>
          <li><a href="javascript:void(0)" onclick="switchView('paket-bimbingan')">Buku Amazing TKA</a></li>
        </ul>
      </div>

      <!-- Col 3: Perusahaan -->
      <div>
        <h4 class="footer-column-title">PERUSAHAAN</h4>
        <ul class="footer-nav-list">
          <li><a href="javascript:void(0)" onclick="switchView('beranda')">Tentang Kami</a></li>
          <li><a href="javascript:void(0)" onclick="switchView('pahami-jia')">Mentor Juara</a></li>
          <li><a href="javascript:void(0)" onclick="switchView('panduan-simulasi-faq')">Testimoni Siswa</a></li>
        </ul>
      </div>

      <!-- Col 4: Bantuan -->
      <div>
        <h4 class="footer-column-title">BANTUAN</h4>
        <ul class="footer-nav-list">
          <li><a href="javascript:void(0)" onclick="switchView('panduan-simulasi-faq')">FAQ</a></li>
          <li><a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $settings['whatsapp_number'] ?? '6285196906349') }}" target="_blank" rel="noopener noreferrer">WhatsApp Komunitas</a></li>
          <li><a href="javascript:void(0)" onclick="switchView('paket-bimbingan')">Platform Ujian (JIA Exam)</a></li>
          <li><a href="javascript:void(0)" onclick="switchView('paket-bimbingan')">Beli Buku Amazing TKA</a></li>
        </ul>
      </div>
    </div>

    <hr class="footer-bottom-divider">

    <div class="footer-bottom-bar">
      <div>© 2026 JIA Learning. All rights reserved.</div>
      <div>{{ $settings['company_address'] ?? 'Kabupaten Banyuwangi, Jawa Timur, Indonesia' }}</div>
      <div><a href="mailto:{{ $settings['support_email'] ?? 'azzam@jialearning.com' }}">{{ $settings['support_email'] ?? 'azzam@jialearning.com' }}</a></div>
    </div>
  </div>
</footer>
