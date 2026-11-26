<!-- ==================== VIEW 2: MATERI BELAJAR KONSEP INTERAKTIF ==================== -->
<div id="view-materi-belajar" class="tab-content">
    
    <!-- 1. Hero Belajar Konsep Super Interaktif -->
    <section class="relative pt-14 pb-20 bg-gradient-to-b from-[#e2cbf6]/40 via-white to-[#f5eaf8]/30 border-b border-[#e2cbf6] overflow-hidden">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    <div class="inline-flex items-center gap-2 px-3.5 py-1.5 rounded-full bg-white border border-[#e2cbf6] text-[#6c5857] text-xs font-extrabold shadow-sm">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#6c5857] animate-pulse"></span>
                        <span>Konsep Berbasis Visual & Analogi Kontekstual</span>
                    </div>

                    <h1 class="text-3xl sm:text-5xl font-black text-[#6c5857] tracking-tight leading-[1.15]">
                        Belajar Konsep Anti Monoton, <br>
                        <span class="text-[#6c5857] underline decoration-[#ffde59] decoration-4">Paham Sampai Akarnya!</span>
                    </h1>

                    <p class="text-xs sm:text-sm text-[#6c5857]/90 leading-relaxed max-w-xl mx-auto lg:mx-0">
                        Tinggalkan metode membaca ratusan lembar modul tebal yang bikin ngantuk. Di Jia Learning, kamu belajar lewat <b>video animasi seru</b>, <b>digital blackboard runtut</b>, <b>cheat sheet kilat</b>, serta <b>kuis adaptif</b> yang langsung mengunci daya ingatmu.
                    </p>

                    <div class="pt-2 flex flex-col sm:flex-row gap-3 justify-center lg:justify-start">
                        <a href="https://admin.jialearning.app" target="_blank" rel="noopener noreferrer" class="bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-sm px-8 py-3.5 rounded-full shadow-lg shadow-amber-500/25 transition text-center border border-[#ebd04f]">
                            Coba Belajar Sekarang (Gratis) &rsaquo;
                        </a>
                        <button type="button" onclick="switchView('bank-soal')" class="px-6 py-3.5 bg-white border border-[#e2cbf6] text-[#6c5857] rounded-full text-xs font-bold shadow-sm hover:bg-[#f5eaf8] transition">
                            Lanjut Drill Soal HOTS
                        </button>
                    </div>
                </div>

                <!-- Interactive Learning Quest Card -->
                <div class="lg:col-span-5">
                    <div class="bg-white rounded-3xl p-6 sm:p-7 border-2 border-[#e2cbf6] shadow-2xl text-left relative">
                        <div class="flex items-center justify-between pb-3 mb-2 border-b border-slate-100">
                            <div class="flex items-center gap-2">
                                <span class="text-lg"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg></span></span>
                                <h4 class="font-black text-xs text-[#6c5857]">Alur Paham Tuntas (4-Step Quest)</h4>
                            </div>
                            <span id="quest-progress-badge" class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full border border-[#ebd04f]">Langkah 1 / 4 (25%)</span>
                        </div>

                        <!-- Progress Bar -->
                        <div class="w-full bg-[#f5eaf8] h-2 rounded-full mb-4 overflow-hidden border border-[#e2cbf6]">
                            <div id="quest-progress-bar" class="bg-[#6c5857] h-full transition-all duration-300 w-1/4"></div>
                        </div>

                        <div class="space-y-3">
                            <div onclick="setQuestStep(1)" id="quest-step-1" class="cursor-pointer p-3 rounded-2xl bg-[#ffde59]/20 border-2 border-[#ffde59] flex items-center gap-3 transition">
                                <div class="w-8 h-8 rounded-xl bg-[#6c5857] text-white flex items-center justify-center font-bold text-xs shrink-0">1</div>
                                <div>
                                    <h5 class="text-xs font-extrabold text-[#6c5857]">Nonton Video Konsep (10-15 Menit)</h5>
                                    <p class="text-[10px] text-slate-500">Animasi storytelling + analogi dunia nyata.</p>
                                </div>
                            </div>

                            <div onclick="setQuestStep(2)" id="quest-step-2" class="cursor-pointer p-3 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] hover:border-[#6c5857] flex items-center gap-3 transition">
                                <div class="w-8 h-8 rounded-xl bg-[#6c5857] text-white flex items-center justify-center font-bold text-xs shrink-0">2</div>
                                <div>
                                    <h5 class="text-xs font-extrabold text-[#6c5857]">Baca Rangkuman & Flashcard</h5>
                                    <p class="text-[10px] text-slate-500">Ingat rumus kunci & cheat sheet 1 halaman.</p>
                                </div>
                            </div>

                            <div onclick="setQuestStep(3)" id="quest-step-3" class="cursor-pointer p-3 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] hover:border-[#6c5857] flex items-center gap-3 transition">
                                <div class="w-8 h-8 rounded-xl bg-[#6c5857] text-white flex items-center justify-center font-bold text-xs shrink-0">3</div>
                                <div>
                                    <h5 class="text-xs font-extrabold text-[#6c5857]">Kerjakan Kuis Cepat (5 Soal)</h5>
                                    <p class="text-[10px] text-slate-500">Evaluasi langsung pemahamanmu seketika.</p>
                                </div>
                            </div>

                            <div onclick="setQuestStep(4)" id="quest-step-4" class="cursor-pointer p-3 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] hover:border-[#6c5857] flex items-center gap-3 transition">
                                <div class="w-8 h-8 rounded-xl bg-[#6c5857] text-white flex items-center justify-center font-bold text-xs shrink-0">4</div>
                                <div>
                                    <h5 class="text-xs font-extrabold text-[#6c5857]">Drill Soal HOTS & Live Class</h5>
                                    <p class="text-[10px] text-slate-500">Uji analisis kasus rumit bareng mentor.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- 2. Interactive Subject & Topic Explorer -->
    <section class="py-16 bg-white border-b border-[#e2cbf6]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-10">
                <span class="text-[#6c5857] text-xs font-extrabold uppercase tracking-widest bg-[#f5eaf8] px-3.5 py-1 rounded-full border border-[#e2cbf6]">Eksplorasi Materi Belajar</span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857] mt-3">Pilih Mata Pelajaran Favoritmu</h2>
                <p class="text-xs text-slate-500 mt-1">Ribuan video materi pelajaran SMP & SMA yang dikurasi sesuai capaian kompetensi terbaru.</p>
            </div>

            <!-- Interactive Search & Filter Bar -->
            <div class="max-w-2xl mx-auto mb-8 bg-[#faf7fd] p-4 rounded-3xl border-2 border-[#e2cbf6] shadow-sm flex flex-col sm:flex-row gap-3 items-center">
                <div class="relative flex-1 w-full">
                    <span class="absolute left-3.5 top-1/2 -translate-y-1/2 text-sm"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span></span>
                    <input type="text" id="search-materi-input" onkeyup="filterMateriCards()" placeholder="Cari topik materi (contoh: Aljabar, Geometri, Literasi)..." class="w-full pl-9 pr-4 py-2.5 bg-white border border-[#e2cbf6] rounded-2xl text-xs text-[#6c5857] focus:outline-none focus:border-[#6c5857] font-semibold">
                </div>
                <select id="filter-materi-level" onchange="filterMateriCards()" class="px-4 py-2.5 bg-white border border-[#e2cbf6] rounded-2xl text-xs font-bold text-[#6c5857] focus:outline-none focus:border-[#6c5857] w-full sm:w-auto">
                    <option value="all">Semua Kategori</option>
                    <option value="smp">Materi SMP / MTs</option>
                    <option value="sma">Materi SMA / MA</option>
                    <option value="utbk">Penalaran / UTBK</option>
                </select>
            </div>

            <!-- Navigasi Tab Mapel Interaktif -->
            <div class="flex justify-center gap-2 sm:gap-3 mb-10 overflow-x-auto pb-2">
                <button type="button" onclick="selectSubjectTab('matematika')" id="btn-tab-matematika" class="px-5 py-2.5 rounded-2xl text-xs font-black transition border-2 border-[#6c5857] bg-[#6c5857] text-white shadow-sm flex items-center gap-2">
                    <span></span> Matematika & Numerasi
                </button>
                <button type="button" onclick="selectSubjectTab('indonesia')" id="btn-tab-indonesia" class="px-5 py-2.5 rounded-2xl text-xs font-black transition border-2 border-[#e2cbf6] bg-white text-[#6c5857] hover:border-[#6c5857] flex items-center gap-2">
                    <span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg></span></span> Bahasa Indonesia & Literasi
                </button>
                <button type="button" onclick="selectSubjectTab('sains')" id="btn-tab-sains" class="px-5 py-2.5 rounded-2xl text-xs font-black transition border-2 border-[#e2cbf6] bg-white text-[#6c5857] hover:border-[#6c5857] flex items-center gap-2">
                    <span></span> Sains & IPA Terpadu
                </button>
                <button type="button" onclick="selectSubjectTab('utbk')" id="btn-tab-utbk" class="px-5 py-2.5 rounded-2xl text-xs font-black transition border-2 border-[#e2cbf6] bg-white text-[#6c5857] hover:border-[#6c5857] flex items-center gap-2">
                    <span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></span></span> Penalaran Umum & UTBK
                </button>
            </div>

            @foreach (['matematika', 'indonesia', 'sains', 'utbk'] as $subjectKey)
                <div id="subject-{{ $subjectKey }}" class="subject-tab-content {{ $subjectKey === 'matematika' ? 'active' : '' }}">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        @foreach (($materialsBySubject[$subjectKey] ?? collect()) as $material)
                            <div class="bg-[#faf7fd] rounded-3xl p-6 border border-[#e2cbf6] hover:shadow-md transition flex flex-col justify-between" data-level="{{ $material->level_tag }}">
                                <div>
                                    <span class="{{ $material->level_tag === 'utbk' ? 'bg-[#ffde59] border border-[#ebd04f]' : 'bg-[#e2cbf6]' }} text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full uppercase">{{ $material->badge }}</span>
                                    <h4 class="font-extrabold text-sm text-[#6c5857] mt-3 mb-1">{{ $material->title }}</h4>
                                    <p class="text-xs text-slate-500 leading-relaxed">{{ $material->description }}</p>
                                    @if ($material->video_count || $material->quiz_count)
                                        <div class="mt-4 space-y-1.5 text-[11px] text-[#6c5857] font-semibold">
                                            <div class="flex items-center gap-2"><span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg></span> {{ $material->video_count }} Video Konsep</span><span>•</span><span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span> {{ $material->quiz_count }} Latihan Soal</span></div>
                                            <div class="flex items-center gap-2"><span> Rangkuman PDF</span><span>•</span><span>️ Flashcard Rumus</span></div>
                                        </div>
                                    @endif
                                </div>
                                <div class="mt-5 pt-3 border-t border-[#e2cbf6]/60 flex items-center justify-between">
                                    <span class="text-[11px] font-black text-[#6c5857]">{{ $material->difficulty_label ?: 'Tingkat: Terpadu' }}</span>
                                    <a href="{{ $material->cta_url ?: ($settings['lms_url'] ?? 'https://admin.jialearning.app') }}" target="_blank" class="px-3 py-1.5 bg-[#ffde59] text-[#6c5857] text-xs font-black rounded-xl hover:bg-[#ebd04f] transition border border-[#ebd04f]">Pelajari &rsaquo;</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach

        </div>
    </section>

    <!-- 3. Dua Format Belajar: Hosted Animation vs. Blackboard Drill -->
    <section class="py-16 bg-[#faf7fd] border-b border-[#e2cbf6]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-[#6c5857] text-xs font-extrabold uppercase tracking-widest bg-white px-3.5 py-1 rounded-full border border-[#d1b4ec] shadow-sm">Dua Pengalaman Belajar</span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857] mt-3">Sesuaikan dengan Gaya Belajar Kamu</h2>
                <p class="text-xs text-slate-500 mt-1">Pilih video beranimasi dengan analogi cerita atau video papan tulis fokus rumus.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div class="bg-white rounded-3xl overflow-hidden border border-[#e2cbf6] shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div class="aspect-video w-full bg-slate-900">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/iqo-X9nQKwo" title="Masterclass Bahasa Indonesia" frameborder="0" loading="lazy" allowfullscreen></iframe>
                    </div>
                    <div class="p-4 bg-white">
                        <span class="bg-[#ffde59] text-[#6c5857] text-[9px] font-black uppercase px-2.5 py-0.5 rounded-full inline-block mb-1.5 border border-[#ebd04f]">Video Hosted Live</span>
                        <h4 class="text-xs font-extrabold text-[#6c5857] leading-snug">[Trial Class #1] Masterclass Bahasa Indonesia: Teks Deskripsi</h4>
                        <span class="text-[10px] text-slate-400 block mt-1">Studi Kasus Kontekstual & Trik Menjawab</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl overflow-hidden border border-[#e2cbf6] shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div class="aspect-video w-full bg-slate-900">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/SKAuNR0PmvU" title="Soal Asli TKA Matematika" frameborder="0" loading="lazy" allowfullscreen></iframe>
                    </div>
                    <div class="p-4 bg-white">
                        <span class="bg-[#6c5857] text-white text-[9px] font-black uppercase px-2.5 py-0.5 rounded-full inline-block mb-1.5">Digital Blackboard</span>
                        <h4 class="text-xs font-extrabold text-[#6c5857] leading-snug">Bahas Soal Asli TKA Matematika 2026 (Pertidaksamaan Linear)</h4>
                        <span class="text-[10px] text-slate-400 block mt-1">Bedah Garis Bilangan Langkah-demi-Langkah</span>
                    </div>
                </div>

                <div class="bg-white rounded-3xl overflow-hidden border border-[#e2cbf6] shadow-sm flex flex-col justify-between hover:shadow-md transition">
                    <div class="aspect-video w-full bg-slate-900">
                        <iframe class="w-full h-full" src="https://www.youtube.com/embed/uHvAAlubF_g" title="Luas Juring" frameborder="0" loading="lazy" allowfullscreen></iframe>
                    </div>
                    <div class="p-4 bg-white">
                        <span class="bg-[#6c5857] text-white text-[9px] font-black uppercase px-2.5 py-0.5 rounded-full inline-block mb-1.5">Digital Blackboard</span>
                        <h4 class="text-xs font-extrabold text-[#6c5857] leading-snug">Luas Juring Lingkaran | Soal Asli TKA 2026</h4>
                        <span class="text-[10px] text-slate-400 block mt-1">Perbandingan Sudut Pusat & Eliminasi Cepat</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4. Interactive Flashcard & Cheat Sheet Preview -->
    <section class="py-16 bg-white border-b border-[#e2cbf6]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-[#6c5857] text-xs font-extrabold uppercase tracking-widest bg-[#f5eaf8] px-3.5 py-1 rounded-full border border-[#e2cbf6]">Memory Booster</span>
                <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857] mt-3">Interactive Flashcard & Cheat Sheet</h2>
                <p class="text-xs text-slate-500 mt-1">Klik kartu di bawah ini untuk melihat rumus kilat dan cara mengingat cepat!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                <div onclick="flipCard('card-1')" id="card-1" class="cursor-pointer bg-[#faf7fd] hover:bg-[#f5eaf8] rounded-3xl p-6 border-2 border-[#e2cbf6] shadow-sm transition min-h-[170px] flex flex-col justify-between">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-extrabold text-[#6c5857]">Rumus: Luas Juring</span>
                        <span class="text-[10px] text-slate-400">Klik untuk balik </span>
                    </div>
                    <div id="card-1-front" class="text-center my-auto">
                        <span class="text-base font-black text-[#6c5857]">Bagaimana membandingkan 2 Juring pada lingkaran yang sama?</span>
                    </div>
                    <div id="card-1-back" class="text-center my-auto hidden">
                        <span class="text-xs font-black text-[#6c5857] block">L₁ / L₂ = θ₁ / θ₂</span>
                        <span class="text-[10px] text-slate-500 mt-1 block">Rasio luas juring persis sama dengan rasio sudut pusatnya!</span>
                    </div>
                    <span class="text-[10px] text-center text-slate-400 font-bold">Topik Geometri Lingkaran</span>
                </div>

                <div onclick="flipCard('card-2')" id="card-2" class="cursor-pointer bg-[#faf7fd] hover:bg-[#f5eaf8] rounded-3xl p-6 border-2 border-[#ffde59] shadow-sm transition min-h-[170px] flex flex-col justify-between">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-extrabold text-[#6c5857]">Kaidah: Tanda Garis Bilangan</span>
                        <span class="text-[10px] text-slate-400">Klik untuk balik </span>
                    </div>
                    <div id="card-2-front" class="text-center my-auto">
                        <span class="text-base font-black text-[#6c5857]">Apa beda titik penuh (•) dan titik bolong (•)?</span>
                    </div>
                    <div id="card-2-back" class="text-center my-auto hidden">
                        <span class="text-xs font-black text-[#6c5857] block">• Penuh: Mengandung tanda ≤ atau ≥ (angka ikut).</span>
                        <span class="text-xs font-bold text-slate-500 mt-1 block">• Bolong: Mengandung tanda &lt; atau &gt; (angka tidak ikut).</span>
                    </div>
                    <span class="text-[10px] text-center text-slate-400 font-bold">Topik Aljabar Pertidaksamaan</span>
                </div>

                <div onclick="flipCard('card-3')" id="card-3" class="cursor-pointer bg-[#faf7fd] hover:bg-[#f5eaf8] rounded-3xl p-6 border-2 border-[#e2cbf6] shadow-sm transition min-h-[170px] flex flex-col justify-between">
                    <div class="flex justify-between items-center text-xs">
                        <span class="font-extrabold text-[#6c5857]">Literasi: Teks Deskripsi</span>
                        <span class="text-[10px] text-slate-400">Klik untuk balik </span>
                    </div>
                    <div id="card-3-front" class="text-center my-auto">
                        <span class="text-base font-black text-[#6c5857]">Kunci membedakan Deskripsi vs Resensi?</span>
                    </div>
                    <div id="card-3-back" class="text-center my-auto hidden">
                        <span class="text-xs font-black text-[#6c5857] block">Deskripsi = Gambaran rupa fisik & objek nyata.</span>
                        <span class="text-xs font-bold text-slate-500 mt-1 block">Resensi/Ulasan = Memuat opini, penilaian, & kritik subjektif.</span>
                    </div>
                    <span class="text-[10px] text-center text-slate-400 font-bold">Topik Bahasa Indonesia TKA</span>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. Grid 8 Fitur Lengkap Belajar Konsep -->
    <section class="py-16 bg-[#faf7fd] border-b border-[#e2cbf6]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857]">Fitur Penunjang Belajar Konsep Lengkap</h2>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                @foreach ($coolFeatures as $cf)
                <div class="p-5 rounded-3xl bg-white border border-[#e2cbf6] shadow-sm hover:border-[#6c5857] transition flex items-start gap-3.5">
                    <div class="text-2xl p-2.5 rounded-2xl bg-[#faf7fd] shadow-sm shrink-0 border border-[#e2cbf6]/60">
                        {{ $cf['icon'] }}
                    </div>
                    <div>
                        <h4 class="font-bold text-xs text-[#6c5857] leading-snug mb-1">{{ $cf['title'] }}</h4>
                        <p class="text-[11px] text-slate-500 leading-relaxed">{{ $cf['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 6. Rockstar Mentor -->
    <section class="py-16 bg-white border-b border-[#e2cbf6]">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-xl mx-auto mb-12">
                <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857]">Rockstar Mentor Seru dan Berpengalaman</h2>
                <p class="text-xs text-slate-500 mt-1">Lebih seru belajar bareng Rockstar Mentor Jia Learning. Yuk kenalan sama mereka!</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 max-w-5xl mx-auto">
                @foreach ($rockstarMentors as $rm)
                <div class="bg-[#faf7fd] rounded-3xl p-6 border border-[#e2cbf6] flex flex-col justify-between hover:shadow-md transition">
                    <div>
                        <div class="w-28 h-28 mx-auto rounded-3xl overflow-hidden bg-white border-2 border-[#e2cbf6] mb-4 shadow-sm">
                            <img src="{{ $rm['foto_url'] ?? asset('images/' . $rm['foto']) }}" 
                                 alt="{{ $rm['nama'] }}" 
                                 onerror="this.onerror=null; this.src='https://ui-avatars.com/api/?name={{ urlencode($rm['nama']) }}&background=e2cbf6&color=6c5857&size=300&bold=true';" 
                                 class="w-full h-full object-cover">
                        </div>

                        <h4 class="font-black text-sm text-[#6c5857] text-center">{{ $rm['nama'] }}</h4>
                        <span class="text-[11px] font-bold text-[#6c5857] block text-center mt-0.5">{{ $rm['mapel'] }}</span>
                        <span class="text-[10px] text-slate-500 block text-center mb-4">{{ $rm['kampus'] }}</span>

                        <div class="border-t border-[#e2cbf6] pt-3">
                            <ul class="space-y-1.5">
                                @foreach ($rm['prestasi'] as $p)
                                <li class="text-[11px] text-[#6c5857] flex items-start gap-1.5">
                                    <span class="text-[#6c5857] font-bold">•</span>
                                    <span>{{ $p }}</span>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- 7. FAQ Belajar Konsep -->
    <section class="py-16 bg-[#faf7fd] border-b border-[#e2cbf6]">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857]">Pertanyaan Seputar Belajar Konsep</h2>
            </div>

            <div class="space-y-3">
                @foreach ($faqs as $i => $faq)
                <div class="bg-white rounded-2xl border border-[#e2cbf6] shadow-sm overflow-hidden">
                    <button type="button" onclick="toggleFaq({{ $i }})" class="w-full text-left p-4.5 flex justify-between items-center text-xs sm:text-sm font-bold text-[#6c5857] hover:text-[#6c5857] transition">
                        <span>{{ $faq['q'] }}</span>
                        <span id="faq-icon-{{ $i }}" class="text-sm font-black transition-transform duration-200">▾</span>
                    </button>
                    <div id="faq-body-{{ $i }}" class="px-4.5 pb-4.5 pt-1 text-xs text-slate-500 leading-relaxed hidden">
                        {{ $faq['a'] }}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <script>
    function setQuestStep(stepNum) {
        const badge = document.getElementById('quest-progress-badge');
        const bar = document.getElementById('quest-progress-bar');
        
        for (let i = 1; i <= 4; i++) {
            const el = document.getElementById('quest-step-' + i);
            if (el) {
                if (i === stepNum) {
                    el.className = "cursor-pointer p-3 rounded-2xl bg-[#ffde59]/20 border-2 border-[#ffde59] flex items-center gap-3 transition shadow-sm";
                } else {
                    el.className = "cursor-pointer p-3 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] hover:border-[#6c5857] flex items-center gap-3 transition";
                }
            }
        }

        const pct = stepNum * 25;
        if (badge) badge.textContent = `Langkah ${stepNum} / 4 (${pct}%)`;
        if (bar) bar.style.width = pct + '%';
    }

    function flipCard(cardId) {
        const front = document.getElementById(cardId + '-front');
        const back = document.getElementById(cardId + '-back');
        if (front && back) {
            if (front.classList.contains('hidden')) {
                front.classList.remove('hidden');
                back.classList.add('hidden');
            } else {
                front.classList.add('hidden');
                back.classList.remove('hidden');
            }
        }
    }

    function selectSubjectTab(tabId) {
        const tabs = document.querySelectorAll('.subject-tab-content');
        tabs.forEach(t => {
            t.classList.remove('active');
            t.style.display = 'none';
        });
        
        const target = document.getElementById('subject-' + tabId);
        if (target) {
            target.classList.add('active');
            target.style.display = 'block';
        }

        const btns = ['matematika', 'indonesia', 'sains', 'utbk'];
        btns.forEach(b => {
            const btn = document.getElementById('btn-tab-' + b);
            if (btn) {
                if (b === tabId) {
                    btn.className = "px-5 py-2.5 rounded-2xl text-xs font-black transition border-2 border-[#6c5857] bg-[#6c5857] text-white shadow-sm flex items-center gap-2";
                } else {
                    btn.className = "px-5 py-2.5 rounded-2xl text-xs font-black transition border-2 border-[#e2cbf6] bg-white text-[#6c5857] hover:border-[#6c5857] flex items-center gap-2";
                }
            }
        });

        filterMateriCards();
    }

    function filterMateriCards() {
        const query = document.getElementById('search-materi-input')?.value.toLowerCase().trim() || '';
        const level = document.getElementById('filter-materi-level')?.value || 'all';
        const activeTab = document.querySelector('.subject-tab-content.active');
        if (!activeTab) return;
        
        const cards = activeTab.querySelectorAll('.grid > div');
        cards.forEach(card => {
            const text = card.innerText.toLowerCase();
            const matchesQuery = !query || text.includes(query);
            let matchesLevel = true;
            
            if (level !== 'all') {
                const cardLevel = (card.dataset.level || '').toLowerCase();
                matchesLevel = cardLevel === level.toLowerCase() || text.includes(level.toLowerCase());
            }
            
            if (matchesQuery && matchesLevel) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    function toggleFaq(index) {
        const body = document.getElementById('faq-body-' + index);
        const icon = document.getElementById('faq-icon-' + index);
        if (body) {
            if (body.classList.contains('hidden')) {
                body.classList.remove('hidden');
                if (icon) icon.style.transform = 'rotate(180deg)';
            } else {
                body.classList.add('hidden');
                if (icon) icon.style.transform = 'rotate(0deg)';
            }
        }
    }
    </script>

</div>