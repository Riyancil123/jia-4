/**
 * JIA Learning - Interactive Logic
 * Handles Accordions, Filtering, Video Modal, Tabs, and Live Timers
 */

document.addEventListener('DOMContentLoaded', () => {
  // 1. Mobile Menu Toggle with Backdrop & Outside Click
  const mobileToggle = document.getElementById('mobileMenuToggle');
  const mobileDrawer = document.getElementById('mobileDrawer');
  let drawerBackdrop = document.getElementById('drawerBackdrop');

  if (!drawerBackdrop) {
    drawerBackdrop = document.createElement('div');
    drawerBackdrop.id = 'drawerBackdrop';
    drawerBackdrop.className = 'mobile-drawer-backdrop';
    document.body.appendChild(drawerBackdrop);
  }

  function toggleMobileMenu(open) {
    if (!mobileDrawer) return;
    const shouldOpen = open !== undefined ? open : !mobileDrawer.classList.contains('open');
    mobileDrawer.classList.toggle('open', shouldOpen);
    drawerBackdrop.classList.toggle('open', shouldOpen);
    if (mobileToggle) {
      mobileToggle.innerHTML = shouldOpen 
        ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>'
        : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>';
    }
  }

  if (mobileToggle && mobileDrawer) {
    mobileToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      toggleMobileMenu();
    });

    drawerBackdrop.addEventListener('click', () => {
      toggleMobileMenu(false);
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape') toggleMobileMenu(false);
    });
  }

  // 1b. Mobile Floating Bottom Action Bar Injection (if not already present in HTML)
  if (!document.querySelector('.mobile-bottom-bar')) {
    const bottomBar = document.createElement('div');
    bottomBar.className = 'mobile-bottom-bar';
    bottomBar.id = 'mobileBottomBar';
    bottomBar.innerHTML = `
      <div class="mobile-bottom-inner">
        <div class="mobile-bottom-info">
          <span class="mobile-bottom-badge">TRY OUT CBT 2027</span>
          <span class="mobile-bottom-title">Simulasi Ujian Gratis</span>
        </div>
        <a href="program.html" class="btn btn-primary mobile-bottom-cta">
          Daftar CBT &rsaquo;
        </a>
      </div>
    `;
    document.body.appendChild(bottomBar);
  }

  // 1c. Swipe Hint Indicator for Mobile Carousels
  if (window.innerWidth <= 768) {
    const swipeTargets = document.querySelectorAll('.pilar-cards-grid, .video-grid, .testimonials-grid, .roadmap-grid, .mentor-grid, .ekosistem-grid');
    swipeTargets.forEach(target => {
      if (target && !target.previousElementSibling?.classList?.contains('swipe-hint')) {
        const hint = document.createElement('div');
        hint.className = 'swipe-hint';
        hint.innerHTML = '<span style="display:inline-flex; vertical-align:middle; margin-right:4px;"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"></path><path d="m12 5 7 7-7 7"></path></svg></span> Geser ke samping untuk lihat opsi lain';
        target.parentNode.insertBefore(hint, target);
      }
    });
  }

  // 2. Sticky Navbar scroll effect
  const siteHeader = document.querySelector('.site-header');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      siteHeader?.classList.add('scrolled');
    } else {
      siteHeader?.classList.remove('scrolled');
    }
  });

  // 3. Hero CBT Mockup Interactive Tabs
  const cbtTabs = document.querySelectorAll('.cbt-tab-btn');
  const cbtTestTitle = document.querySelector('.cbt-test-title');
  const cbtScoreTarget = document.querySelector('.cbt-score-target strong');

  if (cbtTabs.length) {
    const tabContents = {
      jadwal: {
        title: 'Try Out Akbar TKA Seri 1 - 2027',
        target: '850+ Poin'
      },
      analisis: {
        title: 'Rapor Kemampuan Subtes & Analisis Kelemahan',
        target: 'Top 5% Nasional'
      },
      soal: {
        title: 'Bedah 30 Soal HOTS Matematika & Sains',
        target: 'Target Akurasi 90%'
      },
      profil: {
        title: 'Portofolio Nilai Pejuang SMA Unggulan',
        target: 'Target: SMA Pradita'
      }
    };

    cbtTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        cbtTabs.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');
        const key = tab.getAttribute('data-tab');
        if (tabContents[key] && cbtTestTitle && cbtScoreTarget) {
          cbtTestTitle.textContent = tabContents[key].title;
          cbtScoreTarget.textContent = tabContents[key].target;
        }
      });
    });
  }

  // 4. Hero Countdown Timer
  const timerBadge = document.getElementById('cbtTimer');
  if (timerBadge) {
    let secondsLeft = 42 * 60 + 15; // 42 minutes 15 seconds
    setInterval(() => {
      if (secondsLeft > 0) {
        secondsLeft--;
        const mins = Math.floor(secondsLeft / 60);
        const secs = secondsLeft % 60;
        timerBadge.textContent = `${String(mins).padStart(2, '0')}:${String(secs).padStart(2, '0')}`;
      }
    }, 1000);
  }

  // 5. FAQ Accordion Expand / Collapse
  const accordionItems = document.querySelectorAll('.accordion-item');
  if (accordionItems.length) {
    accordionItems.forEach(item => {
      const header = item.querySelector('.accordion-header');
      if (header) {
        header.addEventListener('click', () => {
          const isActive = item.classList.contains('active');
          
          // Optional: close other accordions
          accordionItems.forEach(other => {
            if (other !== item) other.classList.remove('active');
          });

          item.classList.toggle('active', !isActive);
        });
      }
    });
  }

  // 6. FAQ Search Filter
  const faqSearchInput = document.getElementById('faqSearchInput');
  if (faqSearchInput && accordionItems.length) {
    faqSearchInput.addEventListener('input', (e) => {
      const query = e.target.value.toLowerCase().trim();
      accordionItems.forEach(item => {
        const text = item.textContent.toLowerCase();
        if (text.includes(query)) {
          item.style.display = 'block';
        } else {
          item.style.display = 'none';
        }
      });
    });
  }

  // 7. Generic Filter Tabs (Program, Testimoni, FAQ categories)
  const filterTabs = document.querySelectorAll('.filter-tab');
  if (filterTabs.length) {
    filterTabs.forEach(tab => {
      tab.addEventListener('click', () => {
        const group = tab.parentElement.querySelectorAll('.filter-tab');
        group.forEach(t => t.classList.remove('active'));
        tab.classList.add('active');

        const category = tab.getAttribute('data-filter');
        const filterGroup = tab.parentElement.getAttribute('data-target-group');

        if (filterGroup) {
          const cards = document.querySelectorAll(`[data-group="${filterGroup}"]`);
          cards.forEach(card => {
            const cardCat = card.getAttribute('data-category');
            if (!category || category === 'all' || cardCat === category || cardCat?.includes(category)) {
              card.style.display = '';
            } else {
              card.style.display = 'none';
            }
          });
        }
      });
    });
  }

  // 8. Video Modal Popup (Interactive YouTube Player)
  const videoCards = document.querySelectorAll('.video-card');
  const videoModal = document.getElementById('videoModal');
  const modalClose = document.getElementById('modalClose');
  const videoModalTitle = document.getElementById('videoModalTitle');
  const videoPlayerIframe = document.getElementById('videoPlayerIframe');
  const videoPlayerPlaceholder = document.getElementById('videoPlayerPlaceholder');

  function closeVideoModal() {
    if (!videoModal) return;
    videoModal.classList.remove('open');
    if (videoPlayerIframe) {
      videoPlayerIframe.src = '';
      videoPlayerIframe.style.display = 'none';
    }
    if (videoPlayerPlaceholder) {
      videoPlayerPlaceholder.style.display = 'flex';
    }
  }

  if (videoCards.length && videoModal) {
    videoCards.forEach(card => {
      card.addEventListener('click', () => {
        const title = card.getAttribute('data-video-title') || card.querySelector('.video-card-title')?.textContent || 'Cuplikan Pembelajaran TKA';
        const embedUrl = card.getAttribute('data-video-embed');
        const ytId = card.getAttribute('data-video-id');

        if (videoModalTitle) videoModalTitle.textContent = title;

        const finalEmbed = embedUrl || (ytId ? `https://www.youtube-nocookie.com/embed/${ytId}?autoplay=1` : 'https://www.youtube-nocookie.com/embed/GsnANfe4UQw?autoplay=1');

        if (videoPlayerIframe) {
          videoPlayerIframe.src = finalEmbed;
          videoPlayerIframe.style.display = 'block';
          if (videoPlayerPlaceholder) videoPlayerPlaceholder.style.display = 'none';
        }

        videoModal.classList.add('open');
      });
    });

    if (modalClose) {
      modalClose.addEventListener('click', closeVideoModal);
    }

    videoModal.addEventListener('click', (e) => {
      if (e.target === videoModal) {
        closeVideoModal();
      }
    });

    document.addEventListener('keydown', (e) => {
      if (e.key === 'Escape' && videoModal.classList.contains('open')) {
        closeVideoModal();
      }
    });
  }
});
