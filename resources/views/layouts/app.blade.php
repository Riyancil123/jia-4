<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', $settings['site_tagline'] ?? 'JIA Learning - Tembus SMA Impian Tanpa Bingung Hafalan Rumus')</title>
    
    <!-- Google Fonts: Outfit & Plus Jakarta Sans (Exact Match with Reference) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Benchmark Reference Style -->
    <link rel="stylesheet" href="{{ asset('css/jia-style.css') }}">
    
    <!-- Tailwind CSS for CMS & Utility Views -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        jiaPrimary: '#370052',
                        jiaPrimaryLight: '#4F1D69',
                        jiaAccent: '#FEA619',
                        jiaCream: '#FDF9F1'
                    }
                }
            }
        }
    </script>
    <style>
        body { 
            font-family: var(--font-body, 'Plus Jakarta Sans', sans-serif); 
            background-color: var(--color-bg, #FDF9F1);
            color: var(--text-main, #230836);
            margin: 0;
            padding: 0;
            scroll-behavior: smooth;
        }

        .tab-content { 
            display: none; 
            opacity: 0;
            transition: opacity 0.25s ease-in-out;
        }
        .tab-content.active { 
            display: block !important; 
            opacity: 1 !important;
        }

        .subject-tab-content { display: none; }
        .subject-tab-content.active { display: block !important; }

        /* Floating Nav Pills Interactive */
        .nav-pill-container button.nav-link {
            background: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }
    </style>
    @stack('styles')
</head>
<body class="selection:bg-[#FEA619] selection:text-[#230836]">

    <!-- Include Header Komponen -->
    @include('components.header')

    <!-- ==================== KONTEN UTAMA (VIEWS) ==================== -->
    <main class="flex-grow">
        @yield('content')
    </main>

    <!-- Include Footer Komponen -->
    @include('components.footer')

    <!-- Video Modal Popup (Interactive Player) -->
    <div class="video-modal-backdrop" id="videoModal">
      <div class="video-modal-content">
        <div class="video-modal-header">
          <div class="video-modal-title" id="videoModalTitle">Cuplikan Pembelajaran TKA</div>
          <button class="modal-close-btn" id="modalClose" aria-label="Tutup Modal">&times;</button>
        </div>
        <div class="video-player-container" style="position: relative; width: 100%; aspect-ratio: 16/9; background: #000; border-radius: 12px; overflow: hidden; display: flex; align-items: center; justify-content: center;">
          <iframe id="videoPlayerIframe" 
                  src="" 
                  title="Video Pembelajaran JIA Learning" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
                  allowfullscreen 
                  style="width: 100%; height: 100%; border: 0; display: none;"></iframe>
          <div id="videoPlayerPlaceholder" style="width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; position: relative;">
            <img src="{{ asset('images/video_math_tka.jpg') }}" alt="Video Player Preview" id="videoPlayerThumb" style="width: 100%; height: 100%; object-fit: cover; opacity: 0.85;">
            <div style="position: absolute; text-align: center; color: #FFFFFF; pointer-events: none;">
              <div style="width: 60px; height: 60px; border-radius: 50%; background: #FEA619; color: #230836; display: flex; align-items: center; justify-content: center; font-size: 1.6rem; margin: 0 auto 10px; box-shadow: 0 4px 18px rgba(254, 166, 25, 0.5);">
                ▶
              </div>
              <div style="font-weight: 700; font-size: 0.95rem;">Memuat Pemutar Video YouTube...</div>
              <div style="font-size: 0.8rem; opacity: 0.8;">Klik di luar untuk menutup</div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Benchmark JavaScript -->
    <script src="{{ asset('js/jia-script.js') }}"></script>

    <!-- ==================== SPA ROUTER & VIEW SWITCHER ==================== -->
    <script>
    function switchView(viewId, pushHistory = true) {
        const contents = document.querySelectorAll('.tab-content');
        const target = document.getElementById('view-' + viewId);
        const activeTarget = target ? target : document.getElementById('view-beranda');
        const activeId = target ? viewId : 'beranda';

        contents.forEach(el => {
            el.classList.remove('active');
            el.style.display = 'none';
        });

        if (activeTarget) {
            activeTarget.classList.add('active');
            activeTarget.style.display = 'block';
        }

        if (pushHistory && history.pushState) {
            history.pushState({ view: activeId }, "", "#" + activeId);
        }

        // Update nav pill links active state
        document.querySelectorAll('.nav-link, .mobile-nav-link').forEach(link => {
            link.classList.remove('active');
        });

        const navMap = {
            'beranda': 'nav-btn-beranda',
            'paket-bimbingan': 'nav-btn-program',
            'pahami-jia': 'nav-btn-mentor',
            'panduan-simulasi-faq': 'nav-btn-faq',
        };

        const activeNavBtnId = navMap[activeId];
        if (activeNavBtnId) {
            const btn = document.getElementById(activeNavBtnId);
            if (btn) btn.classList.add('active');
        }

        window.scrollTo({ top: 0, behavior: 'smooth' });
    }

    window.addEventListener('DOMContentLoaded', () => {
        const hash = window.location.hash.replace('#', '');
        const initialView = @json($activeView ?? 'beranda');
        if (hash) {
            switchView(hash, false);
        } else {
            switchView(initialView, false);
        }
    });

    window.addEventListener('popstate', function(event) {
        const hash = window.location.hash.replace('#', '');
        const initialView = @json($activeView ?? 'beranda');
        if (event.state && event.state.view) {
            switchView(event.state.view, false);
        } else if (hash) {
            switchView(hash, false);
        } else {
            switchView(initialView, false);
        }
    });
    </script>

    @stack('scripts')
</body>
</html>
