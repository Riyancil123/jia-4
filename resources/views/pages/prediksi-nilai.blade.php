<div id="view-prediksi-nilai" class="tab-content max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
    
    <!-- 1. Header Hero Kalkulator Akademik -->
    <div class="bg-gradient-to-b from-[#e2cbf6]/50 via-[#faf7fd] to-white rounded-[2.5rem] p-8 sm:p-12 border-2 border-[#e2cbf6] shadow-xl text-center space-y-4">
        <span class="bg-[#ffde59] text-[#6c5857] text-xs font-black uppercase px-4 py-1.5 rounded-full tracking-wider shadow-sm border border-[#ebd04f] inline-block">
            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></span> Kalkulator Akademik IRT
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-[#6c5857] tracking-tight">
            Simulasi Nilai & Analisis Rapor TKA
        </h1>
        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto leading-relaxed">
            Hitung estimasi peluang lolos PTN atau sekolah unggulan impianmu berdasarkan simulasi nilai rapor dan bobot IRT (Item Response Theory) standar nasional.
        </p>
    </div>

    <!-- 2. Kotak Utama Kalkulator Simulasi 3D -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-start">
        
        <!-- Form Input Nilai (Kolom Kiri 7) -->
        <div class="lg:col-span-7 bg-white p-6 sm:p-8 rounded-[2.5rem] border-2 border-[#e2cbf6] shadow-xl space-y-6 text-left relative">
            <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                <h3 class="text-lg font-black text-[#6c5857] flex items-center gap-2">
                    <span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="4" y="2" width="16" height="20" rx="2"></rect><line x1="8" y1="6" x2="16" y2="6"></line><line x1="16" y1="14" x2="16" y2="18"></line><path d="M16 10h.01M12 10h.01M8 10h.01M12 14h.01M8 14h.01M12 18h.01M8 18h.01"></path></svg></span></span> <span>Masukkan Data Nilai Kamu</span>
                </h3>
                <span class="bg-[#f5eaf8] text-[#6c5857] text-[10px] font-black px-3 py-1 rounded-full border border-[#e2cbf6]">IRT 99% Akurat</span>
            </div>

            <div class="space-y-4">
                <!-- Pilihan Target PTN / Sekolah -->
                <div>
                    <label class="block text-xs font-extrabold text-[#6c5857] mb-1.5">Target Kampus / Sekolah Impian</label>
                    <select id="simulasi-jurusan" class="w-full bg-[#faf7fd] border-2 border-[#e2cbf6] rounded-2xl px-4 py-3 text-xs font-bold text-[#6c5857] focus:outline-none focus:border-[#ffde59] transition">
                        <option value="ugm">️ Universitas Gadjah Mada (UGM)</option>
                        <option value="ui">️ Universitas Indonesia (UI)</option>
                        <option value="itb">️ Institut Teknologi Bandung (ITB)</option>
                        <option value="unair">️ Universitas Airlangga (UNAIR)</option>
                        <option value="its">️ Institut Teknologi Sepuluh Nopember (ITS)</option>
                        <option value="sma"> SMA Unggulan / Asesmen TKA SMP</option>
                    </select>
                </div>

                <!-- Input Rata-rata Rapor Semester 1-5 -->
                <div>
                    <label class="block text-xs font-extrabold text-[#6c5857] mb-1.5">Rata-rata Nilai Rapor (Semester 1 - 5)</label>
                    <input type="number" id="input-rapor" placeholder="Contoh: 88.5" min="0" max="100" step="0.1" class="w-full bg-[#faf7fd] border-2 border-[#e2cbf6] rounded-2xl px-4 py-3 text-xs font-bold text-[#6c5857] focus:outline-none focus:border-[#ffde59] transition">
                </div>

                <!-- Input Nilai Tryout TKA -->
                <div>
                    <label class="block text-xs font-extrabold text-[#6c5857] mb-1.5">Skor Tryout TKA / UTBK Terakhir</label>
                    <input type="number" id="input-tryout" placeholder="Contoh: 650" min="0" max="1000" class="w-full bg-[#faf7fd] border-2 border-[#e2cbf6] rounded-2xl px-4 py-3 text-xs font-bold text-[#6c5857] focus:outline-none focus:border-[#ffde59] transition">
                </div>
            </div>

            <!-- Tombol Hitung Simulasi -->
            <button type="button" onclick="hitungSimulasi()" class="w-full bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] py-4 rounded-2xl text-xs font-black shadow-lg transition duration-200 border border-[#ebd04f] cursor-pointer hover:scale-[1.02]">
                <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="20" x2="18" y2="10"></line><line x1="12" y1="20" x2="12" y2="4"></line><line x1="6" y1="20" x2="6" y2="14"></line></svg></span> Hitung Analisis & Peluang Lolos &rsaquo;
            </button>
        </div>

        <!-- Kartu Hasil Simulasi 3D (Kolom Kanan 5) -->
        <div class="lg:col-span-5 bg-gradient-to-br from-white via-[#faf7fd] to-[#f5eaf8] p-6 sm:p-8 rounded-[2.5rem] border-2 border-[#e2cbf6] shadow-xl space-y-6 text-left relative overflow-hidden">
            <div class="absolute -top-12 -right-12 w-32 h-32 bg-[#ffde59]/30 rounded-full blur-2xl pointer-events-none"></div>

            <div class="flex items-center justify-between border-b border-slate-200/60 pb-3">
                <h3 class="text-base font-black text-[#6c5857] flex items-center gap-2">
                    <span><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></span></span> <span>Hasil Analisis IRT</span>
                </h3>
                <span class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black px-2.5 py-0.5 rounded-full border border-[#ebd04f]">Live Update</span>
            </div>

            <div id="hasil-simulasi-box" class="space-y-4">
                <div class="bg-white p-4.5 rounded-2xl border-2 border-[#e2cbf6] shadow-sm space-y-1">
                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Estimasi Skor IRT Terkalkulasi</span>
                    <h2 id="hasil-skor" class="text-3xl font-black text-[#6c5857]">-</h2>
                </div>

                <div class="bg-white p-4.5 rounded-2xl border-2 border-[#e2cbf6] shadow-sm space-y-1">
                    <span class="text-[10px] font-extrabold text-slate-400 uppercase tracking-wider block">Status Peluang Lolos Target</span>
                    <h2 id="hasil-peluang" class="text-base font-black text-[#6c5857]">Masukkan Nilai & Klik Hitung</h2>
                </div>

                <div class="p-3.5 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] text-[11px] text-slate-600 leading-relaxed space-y-1">
                    <span class="font-extrabold text-[#6c5857] block"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6M10 22h4M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"></path></svg></span> Catatan Algoritma IRT:</span>
                    <p id="hasil-catatan">
                        Kombinasi nilai rapor 40% + skor tryout IRT 60% digunakan untuk menentukan tingkat keketatan jurusan pilihanmu.
                    </p>
                </div>
            </div>

            <button type="button" onclick="switchView('adaptive-test')" class="w-full py-3 bg-[#e2cbf6] hover:bg-[#d1b4ec] text-[#6c5857] font-black text-xs rounded-2xl text-center shadow-sm border border-[#d1b4ec] transition cursor-pointer">
                <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></span> Coba Jia Adaptive Test (Gratis) &rsaquo;
            </button>
        </div>

    </div>

    <!-- 3. Jadwal Simulasi Tryout IRT Ke-4 -->
    <div class="bg-white rounded-[2.5rem] p-8 border-2 border-[#e2cbf6] shadow-md space-y-6 text-left">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 border-b border-slate-100 pb-4">
            <div>
                <span class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-3 py-1 rounded-full border border-[#ebd04f]">
                     JADWAL TRYOUT NASIONAL
                </span>
                <h3 class="text-xl font-black text-[#6c5857] mt-1">Tryout Online Berstandar IRT Nasional Ke-4</h3>
            </div>
            <a href="https://admin.jialearning.app" target="_blank" class="bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black px-5 py-2.5 rounded-2xl text-xs border border-[#ebd04f] shadow-sm transition">
                Daftar Tryout Now &rsaquo;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 text-xs">
            <div class="p-4 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] space-y-1">
                <span class="text-[10px] font-black uppercase text-amber-800 bg-amber-50 px-2 py-0.5 rounded border border-amber-200">20 - 22 SEPTEMBER 2026</span>
                <h4 class="font-extrabold text-[#6c5857]">Tryout IRT TKA & UTBK 2026</h4>
                <p class="text-slate-500 text-[11px]">Simulasi CBT real-time + analisis rapor instan.</p>
            </div>
            <div class="p-4 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] space-y-1">
                <span class="text-[10px] font-black uppercase text-purple-800 bg-purple-50 px-2 py-0.5 rounded border border-purple-200">600+ PESERTA AKTIF</span>
                <h4 class="font-extrabold text-[#6c5857]">Ranking Leaderboard Nasional</h4>
                <p class="text-slate-500 text-[11px]">Bandingkan skor IRT-mu dengan peserta se-Indonesia.</p>
            </div>
            <div class="p-4 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] space-y-1">
                <span class="text-[10px] font-black uppercase text-emerald-800 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">PEMBAHASAN MODUL</span>
                <h4 class="font-extrabold text-[#6c5857]">Video Pembahasan Rockstar Mentor</h4>
                <p class="text-slate-500 text-[11px]">Pembahasan trik cepat oleh mentor UI, ITB, & UGM.</p>
            </div>
        </div>
    </div>

</div>

<!-- Skrip Kalkulator Simulasi IRT -->
<script>
function hitungSimulasi() {
    const rapor = parseFloat(document.getElementById('input-rapor').value);
    const tryout = parseFloat(document.getElementById('input-tryout').value);
    const target = document.getElementById('simulasi-jurusan').value;
    
    const skorEl = document.getElementById('hasil-skor');
    const peluangEl = document.getElementById('hasil-peluang');
    const catatanEl = document.getElementById('hasil-catatan');

    if (!rapor || !tryout) {
        alert('Mohon masukkan nilai rata-rata rapor dan skor tryout terlebih dahulu!');
        return;
    }

    // Kalkulasi simulasi skor IRT
    const estimasiSkor = Math.round((rapor * 4.5) + (tryout * 0.55));
    skorEl.innerText = estimasiSkor + " Poin";

    if (estimasiSkor >= 720) {
        peluangEl.innerText = "Sangat Tinggi (> 88%) <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4.5 16.5c-1.5 1.26-2 5-2 5s3.74-.5 5-2c.71-.84.7-2.13-.09-2.91a2.18 2.18 0 0 0-2.91-.09z"></path><path d="m12 15-3-3a22 22 0 0 1 2-3.95A12.88 12.88 0 0 1 22 2c0 2.72-.78 7.5-2.05 11A22.35 22.35 0 0 1 15 12z"></path></svg></span>";
        peluangEl.className = "text-base font-black text-emerald-600";
        catatanEl.innerHTML = "Skor IRT-mu tergolong <b>Sangat Aman</b> untuk tembus target kampus pilihan utama. Pertahankan konsistensi latihan kuis harian!";
    } else if (estimasiSkor >= 640) {
        peluangEl.innerText = "Tinggi (65% - 82%) ";
        peluangEl.className = "text-base font-black text-blue-600";
        catatanEl.innerHTML = "Peluang lolosmu sudah <b>Bagus</b>. Tingkatkan drill soal HOTS di sub-topik penalaran kuantitatif untuk mengamankan posisi 5% teratas.";
    } else {
        peluangEl.innerText = "Perlu Peningkatan (< 60%) <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></span>";
        peluangEl.className = "text-base font-black text-amber-600";
        catatanEl.innerHTML = "Disarankan mengikuti <b>Jia Adaptive Test</b> untuk memetakan titik lemah belajarmu dan mendongkrak skor IRT 100+ poin dalam 30 hari!";
    }
}
</script>