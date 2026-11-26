<div id="view-panduan" class="tab-content max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
    
    <!-- 1. Hero Section & Live Search Bar -->
    <div class="bg-gradient-to-b from-[#e2cbf6]/50 via-[#faf7fd] to-white rounded-[2.5rem] p-8 sm:p-12 border-2 border-[#e2cbf6] shadow-xl text-center space-y-5">
        <span class="bg-[#ffde59] text-[#6c5857] text-xs font-black uppercase px-4 py-1.5 rounded-full tracking-wider shadow-sm border border-[#ebd04f] inline-block">
            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><polygon points="16.24 7.76 14.12 14.12 7.76 16.24 9.88 9.88 16.24 7.76"></polygon></svg></span> Pusat Informasi & Panduan Resmi
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-[#6c5857] tracking-tight">
            Pusat Panduan & Bantuan Jia Learning
        </h1>
        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto leading-relaxed">
            Temukan seluruh jawaban lengkap seputar cara pendaftaran, simulasi skor IRT, program belajar, FAQ pembayaran, hingga kontak support admin di sini.
        </p>

        <!-- Live Search Bar Panduan -->
        <div class="max-w-xl mx-auto relative pt-2">
            <div class="relative flex items-center">
                <span class="absolute left-4 text-slate-400 text-lg"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span></span>
                <input type="text" id="input-search-panduan" onkeyup="filterPanduanCards()" placeholder="Cari panduan... (contoh: Pendaftaran, Pembayaran, Zoom, LMS, Reset Password)" class="w-full pl-12 pr-4 py-3.5 rounded-2xl border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs font-semibold text-[#6c5857] bg-white shadow-md transition">
            </div>
            
            <!-- Quick Tag Buttons -->
            <div class="flex flex-wrap justify-center gap-1.5 mt-3 text-[11px] font-extrabold text-[#6c5857]">
                <span class="text-slate-400 font-bold">Populer:</span>
                <button type="button" onclick="setPanduanSearch('Pendaftaran')" class="bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] shadow-sm cursor-pointer transition"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span> Pendaftaran</button>
                <button type="button" onclick="setPanduanSearch('Pembayaran')" class="bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] shadow-sm cursor-pointer transition"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></span> QRIS & Transfer</button>
                <button type="button" onclick="setPanduanSearch('Zoom')" class="bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] shadow-sm cursor-pointer transition"> Live Zoom</button>
                <button type="button" onclick="setPanduanSearch('Password')" class="bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] shadow-sm cursor-pointer transition"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg></span> Reset Password</button>
            </div>
        </div>
    </div>

    <!-- 2. Grid 5 Pilar Utama Panduan (Card 3D Modern) -->
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-black text-[#6c5857] flex items-center gap-2">
                <span></span> <span>5 Pilar Panduan Utama</span>
            </h3>
            <span class="text-xs font-bold text-slate-400">Pilih Kategori Bantuan</span>
        </div>

        <div id="panduan-cards-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 text-left">
            
            <!-- Pilar 1: Cara Pendaftaran -->
            <div class="panduan-card bg-white p-6 sm:p-7 rounded-3xl border-2 border-[#e2cbf6] shadow-md hover:shadow-xl transition duration-300 flex flex-col justify-between space-y-4 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-[#ffde59] text-[#6c5857] flex items-center justify-center font-black text-xl border border-[#ebd04f] shadow-inner group-hover:scale-110 transition">
                            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></span>
                        </div>
                        <span class="bg-[#f5eaf8] text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full border border-[#e2cbf6]">Langkah 01</span>
                    </div>
                    <h3 class="font-extrabold text-base text-[#6c5857] group-hover:text-slate-800">1. Cara Pendaftaran Akun</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Panduan runtut cara membuat akun siswa di Web App, verifikasi data, hingga pendaftaran paket bimbingan.
                    </p>
                </div>
                <button type="button" onclick="switchView('panduan-daftar')" class="w-full text-center bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] py-2.5 rounded-2xl text-xs font-black shadow-sm border border-[#ebd04f] transition flex items-center justify-center gap-1 cursor-pointer">
                    <span>Lihat Panduan Pendaftaran</span> &rsaquo;
                </button>
            </div>

            <!-- Pilar 2: Informasi Program -->
            <div class="panduan-card bg-white p-6 sm:p-7 rounded-3xl border-2 border-[#e2cbf6] shadow-md hover:shadow-xl transition duration-300 flex flex-col justify-between space-y-4 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-[#e2cbf6] text-[#6c5857] flex items-center justify-center font-black text-xl border border-[#d1b4ec] shadow-inner group-hover:scale-110 transition">
                            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg></span>
                        </div>
                        <span class="bg-[#ffde59]/50 text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full border border-[#ebd04f]">Langkah 02</span>
                    </div>
                    <h3 class="font-extrabold text-base text-[#6c5857] group-hover:text-slate-800">2. Informasi Program Belajar</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Rincian lengkap metode bimbingan SMP & SMA, kurikulum HOTS, hingga fasilitas Rockstar Teacher.
                    </p>
                </div>
                <button type="button" onclick="switchView('panduan-program')" class="w-full text-center bg-[#e2cbf6] hover:bg-[#d1b4ec] text-[#6c5857] py-2.5 rounded-2xl text-xs font-black shadow-sm border border-[#d1b4ec] transition flex items-center justify-center gap-1 cursor-pointer">
                    <span>Detail Program Belajar</span> &rsaquo;
                </button>
            </div>

            <!-- Pilar 3: Simulasi Skor IRT -->
            <div class="panduan-card bg-white p-6 sm:p-7 rounded-3xl border-2 border-[#e2cbf6] shadow-md hover:shadow-xl transition duration-300 flex flex-col justify-between space-y-4 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-[#ffde59] text-[#6c5857] flex items-center justify-center font-black text-xl border border-[#ebd04f] shadow-inner group-hover:scale-110 transition">
                            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></span>
                        </div>
                        <span class="bg-[#f5eaf8] text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full border border-[#e2cbf6]">Langkah 03</span>
                    </div>
                    <h3 class="font-extrabold text-base text-[#6c5857] group-hover:text-slate-800">3. Simulasi & Skor IRT</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Cara membaca rapor analitik tryout, skor berbobot IRT 99% akurat, dan rekomendasi kelolosan PTN.
                    </p>
                </div>
                <button type="button" onclick="switchView('panduan-simulasi-faq')" class="w-full text-center bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] py-2.5 rounded-2xl text-xs font-black shadow-sm border border-[#ebd04f] transition flex items-center justify-center gap-1 cursor-pointer">
                    <span>Buka Simulasi IRT</span> &rsaquo;
                </button>
            </div>

            <!-- Pilar 4: FAQ & Tanya Jawab -->
            <div class="panduan-card bg-white p-6 sm:p-7 rounded-3xl border-2 border-[#e2cbf6] shadow-md hover:shadow-xl transition duration-300 flex flex-col justify-between space-y-4 group">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-[#e2cbf6] text-[#6c5857] flex items-center justify-center font-black text-xl border border-[#d1b4ec] shadow-inner group-hover:scale-110 transition">
                            
                        </div>
                        <span class="bg-[#ffde59]/50 text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full border border-[#ebd04f]">Langkah 04</span>
                    </div>
                    <h3 class="font-extrabold text-base text-[#6c5857] group-hover:text-slate-800">4. Pertanyaan Umum (FAQ)</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Jawaban instan seputar metode pembayaran QRIS, garansi 7 hari, jam buka kelas, & kendala aplikasi.
                    </p>
                </div>
                <button type="button" onclick="switchView('panduan-simulasi-faq')" class="w-full text-center bg-[#e2cbf6] hover:bg-[#d1b4ec] text-[#6c5857] py-2.5 rounded-2xl text-xs font-black shadow-sm border border-[#d1b4ec] transition flex items-center justify-center gap-1 cursor-pointer">
                    <span>Lihat Jawaban FAQ</span> &rsaquo;
                </button>
            </div>

            <!-- Pilar 5: Kontak Support CS -->
            <div class="panduan-card bg-white p-6 sm:p-7 rounded-3xl border-2 border-[#e2cbf6] shadow-md hover:shadow-xl transition duration-300 flex flex-col justify-between space-y-4 group md:col-span-2 lg:col-span-1">
                <div class="space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="w-12 h-12 rounded-2xl bg-[#ffde59] text-[#6c5857] flex items-center justify-center font-black text-xl border border-[#ebd04f] shadow-inner group-hover:scale-110 transition">
                            
                        </div>
                        <span class="bg-[#25D366] text-white text-[10px] font-black px-2.5 py-0.5 rounded-full shadow">Online CS</span>
                    </div>
                    <h3 class="font-extrabold text-base text-[#6c5857] group-hover:text-slate-800">5. Kontak Support & Helpdesk</h3>
                    <p class="text-xs text-slate-500 leading-relaxed">
                        Hubungi tim admin kami secara langsung melalui WhatsApp atau portal bantuan resmi Jia Learning.
                    </p>
                </div>
                <button type="button" onclick="switchView('panduan-support')" class="w-full text-center bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] py-2.5 rounded-2xl text-xs font-black shadow-sm border border-[#ebd04f] transition flex items-center justify-center gap-1 cursor-pointer">
                    <span>Hubungi CS WhatsApp</span> &rsaquo;
                </button>
            </div>

        </div>
    </div>

    <!-- 3. Section FAQ Cepat Langsung di Halaman Utama Panduan -->
    <div class="bg-white rounded-3xl p-8 border-2 border-[#e2cbf6] shadow-md space-y-6 text-left">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-2 border-b border-slate-100 pb-4">
            <div>
                <span class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-2.5 py-0.5 rounded-full border border-[#ebd04f]">
                    <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg></span> Jawaban Cepat
                </span>
                <h3 class="text-xl font-black text-[#6c5857] mt-1">Pertanyaan yang Sering Diajukan Siswa</h3>
            </div>
            <button type="button" onclick="switchView('panduan-simulasi-faq')" class="text-xs font-black text-[#6c5857] hover:underline cursor-pointer">
                Lihat Seluruh FAQ &rsaquo;
            </button>
        </div>

        <div class="space-y-3">
            @forelse ($faqsPanduan ?? [] as $faqItem)
                <details class="group bg-[#faf7fd] rounded-2xl border border-[#e2cbf6] p-4 cursor-pointer transition">
                    <summary class="font-extrabold text-xs text-[#6c5857] flex justify-between items-center list-none">
                        <span>{{ $faqItem['q'] }}</span>
                        <span class="text-sm font-black transition group-open:rotate-180">▾</span>
                    </summary>
                    <p class="text-xs text-slate-600 mt-2 pt-2 border-t border-[#e2cbf6]/60 leading-relaxed">
                        {{ $faqItem['a'] }}
                    </p>
                </details>
            @empty
                <details class="group bg-[#faf7fd] rounded-2xl border border-[#e2cbf6] p-4 cursor-pointer transition">
                    <summary class="font-extrabold text-xs text-[#6c5857] flex justify-between items-center list-none">
                        <span>Berapa lama proses verifikasi akun setelah pembayaran?</span>
                        <span class="text-sm font-black transition group-open:rotate-180">▾</span>
                    </summary>
                    <p class="text-xs text-slate-600 mt-2 pt-2 border-t border-[#e2cbf6]/60 leading-relaxed">
                        Pembayaran melalui QRIS dan Bank Transfer diproses secara <b>otomatis dalam 1–3 menit</b>.
                    </p>
                </details>
            @endforelse
        </div>
    </div>

    <!-- 4. Emergency WhatsApp Support Card (Bottom Banner) -->
    <div class="bg-gradient-to-r from-[#e2cbf6] via-[#faf7fd] to-[#ffde59]/40 rounded-[2.5rem] p-8 sm:p-10 border-2 border-[#e2cbf6] shadow-xl text-center space-y-4">
        <div class="inline-flex items-center gap-2 bg-white px-3.5 py-1 rounded-full border border-[#ebd04f] shadow-sm text-[10px] font-black text-[#6c5857]">
            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500 animate-ping"></span>
            <span>TIM CS READY ONLINE HASIL RESPON < 5 MENIT</span>
        </div>
        <h3 class="text-xl sm:text-2xl font-black text-[#6c5857]">Masih Punya Pertanyaan Lain?</h3>
        <p class="text-xs text-slate-600 max-w-md mx-auto leading-relaxed">
            Tim Rockstar Mentor dan admin support Jia Learning siap mendampingimu kapan saja untuk tanya jawab seputar program & konsultasi belajar.
        </p>
        <div>
            <a href="https://wa.me/6285113268957?text=Halo%20Jia%20Learning,%20saya%20butuh%20bantuan%20seputar%20panduan" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] px-7 py-3.5 rounded-2xl text-xs font-black shadow-md transition border border-[#ebd04f] hover:scale-105 active:scale-95">
                <span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg></span></span>
                <span>Tanya CS via WhatsApp Sekarang</span> &rsaquo;
            </a>
        </div>
    </div>

</div>

<script>
function setPanduanSearch(query) {
    const input = document.getElementById('input-search-panduan');
    if (input) {
        input.value = query;
        filterPanduanCards();
    }
}

function filterPanduanCards() {
    const query = document.getElementById('input-search-panduan').value.toLowerCase();
    const grid = document.getElementById('panduan-cards-grid');
    if (!grid) return;

    const cards = grid.querySelectorAll('.panduan-card');
    cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        if (text.includes(query)) {
            card.style.display = 'flex';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>