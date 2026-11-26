<div id="view-pahami-materi" class="tab-content max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10 space-y-12">
    
    <!-- 1. Hero Section & Search Bar Blog -->
    <div class="text-center space-y-4">
        <span class="bg-[#ffde59] text-[#6c5857] text-xs font-black uppercase px-4 py-1.5 rounded-full tracking-wider shadow-sm border border-[#ebd04f] inline-block">
            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg></span> Blog & Artikel Edukasi Jia Learning
        </span>
        <h1 class="text-3xl sm:text-5xl font-black text-[#6c5857] tracking-tight">
            Kenapa #TenangAjaAdaJiaLearning?
        </h1>
        <p class="text-xs sm:text-sm text-slate-600 max-w-2xl mx-auto leading-relaxed">
            Pusat artikel edukasi, tips taklukkan soal TKA & UTBK 2026, strategi paham konsep tanpa hafalan buta, serta update berita resmi platform.
        </p>

        <!-- Live Search Bar & Category Pills -->
        <div class="max-w-xl mx-auto relative pt-2">
            <div class="relative flex items-center">
                <span class="absolute left-4 text-slate-400 text-lg"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg></span></span>
                <input type="text" id="input-search-blog" onkeyup="filterBlogArticles()" placeholder="Cari artikel... (contoh: UTBK, TKA, IRT, Tips Belajar, Matematika)" class="w-full pl-12 pr-4 py-3.5 rounded-2xl border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs font-semibold text-[#6c5857] bg-white shadow-sm transition">
            </div>
            
            <!-- Category Filter Pills -->
            <div class="flex flex-wrap justify-center gap-1.5 mt-3 text-[11px] font-extrabold text-[#6c5857]">
                <button type="button" onclick="filterBlogCategory('semua')" class="cat-pill bg-[#ffde59] text-[#6c5857] px-3 py-1 rounded-xl border border-[#ebd04f] cursor-pointer transition"> Semua Artikel</button>
                <button type="button" onclick="filterBlogCategory('utbk')" class="cat-pill bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] cursor-pointer transition"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></span> Tips UTBK & TKA</button>
                <button type="button" onclick="filterBlogCategory('konsep')" class="cat-pill bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] cursor-pointer transition"> Konsep Belajar</button>
                <button type="button" onclick="filterBlogCategory('kabar')" class="cat-pill bg-white hover:bg-[#faf7fd] px-3 py-1 rounded-xl border border-[#e2cbf6] cursor-pointer transition"> Kabar Jia</button>
            </div>
        </div>
    </div>

    <!-- 2. Featured Headline Story (Card 3D Berukuran Besar) -->
    @if ($featuredArticle)
    <div class="blog-card blog-cat-{{ $featuredArticle->category }} bg-white rounded-[2.5rem] border-2 border-[#e2cbf6] shadow-xl overflow-hidden grid grid-cols-1 lg:grid-cols-12 gap-0 group hover:shadow-2xl transition duration-300">
        <div class="lg:col-span-7 relative overflow-hidden bg-slate-100 min-h-[260px] sm:min-h-[320px]">
            <img src="{{ $featuredArticle->thumbnailUrl() }}" alt="{{ $featuredArticle->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
            <span class="absolute top-4 left-4 bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-3 py-1 rounded-xl shadow border border-[#ebd04f]">
                 Artikel Utama
            </span>
        </div>
        <div class="lg:col-span-5 p-6 sm:p-8 flex flex-col justify-between space-y-4 bg-gradient-to-br from-white via-[#faf7fd] to-white text-left">
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-[10px] font-black text-slate-400 uppercase tracking-wider">
                    <span class="bg-[#e2cbf6] text-[#6c5857] px-2 py-0.5 rounded-lg">{{ $featuredArticle->category_label }}</span>
                    <span>• {{ $featuredArticle->read_time }}</span>
                    <span>• {{ $featuredArticle->published_date_label }}</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-black text-[#6c5857] leading-tight group-hover:text-slate-800 transition">
                    {{ $featuredArticle->title }}
                </h2>
                <p class="text-xs text-slate-600 leading-relaxed">
                    {{ $featuredArticle->excerpt }}
                </p>
            </div>
            
            <div class="pt-4 border-t border-[#e2cbf6]/60 flex items-center justify-between">
                <div class="flex items-center gap-2.5">
                    <div class="w-9 h-9 rounded-full bg-[#ffde59] text-[#6c5857] font-black text-xs flex items-center justify-center border border-[#ebd04f]">
                        ‍
                    </div>
                    <div>
                        <h4 class="text-xs font-black text-[#6c5857]">{{ $featuredArticle->author_name }}</h4>
                        @if ($featuredArticle->author_role)
                            <span class="text-[10px] text-slate-400 font-bold block">{{ $featuredArticle->author_role }}</span>
                        @endif
                    </div>
                </div>
                <button type="button" onclick="openBlogModal(@json($featuredArticle->slug))" class="bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black px-4 py-2 rounded-2xl text-xs shadow-sm border border-[#ebd04f] transition flex items-center gap-1 cursor-pointer">
                    <span>Baca Artikel</span> &rsaquo;
                </button>
            </div>
        </div>
    </div>
    @endif

    <!-- 3. Grid Artikel Terbaru (Cards Aesthetic) -->
    <div class="space-y-6">
        <div class="flex items-center justify-between">
            <h3 class="text-xl font-black text-[#6c5857] flex items-center gap-2">
                <span></span> <span>Artikel & Tips Terbaru</span>
            </h3>
            <span class="text-xs font-bold text-slate-400">Menampilkan {{ $gridArticles->count() }} Artikel Populer</span>
        </div>

        <div id="blog-grid" class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            @foreach ($gridArticles as $article)
                <div class="blog-card blog-cat-{{ $article->category }} bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-md hover:shadow-xl transition duration-300 overflow-hidden flex flex-col justify-between group">
                    <div class="relative h-44 overflow-hidden bg-slate-100">
                        <img src="{{ $article->thumbnailUrl() }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        <span class="absolute top-3 left-3 {{ $article->category === 'konsep' ? 'bg-[#ffde59] border-[#ebd04f]' : 'bg-[#e2cbf6] border-[#d1b4ec]' }} text-[#6c5857] text-[9px] font-black uppercase px-2.5 py-1 rounded-lg border">
                            {{ $article->category_label }}
                        </span>
                    </div>
                    <div class="p-5 space-y-3 flex-grow flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="flex items-center gap-2 text-[10px] font-bold text-slate-400">
                                <span>⏱️ {{ $article->read_time }}</span>
                                <span>• {{ $article->published_date_label }}</span>
                            </div>
                            <h4 class="font-extrabold text-sm text-[#6c5857] leading-snug group-hover:text-slate-800">
                                {{ $article->title }}
                            </h4>
                            <p class="text-xs text-slate-500 leading-relaxed line-clamp-3">
                                {{ $article->excerpt }}
                            </p>
                        </div>

                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between">
                            <span class="text-[11px] font-extrabold text-[#6c5857]">{{ $article->author_name }}</span>
                            <button type="button" onclick="openBlogModal(@json($article->slug))" class="text-xs font-black text-[#6c5857] hover:underline cursor-pointer">
                                Baca &rsaquo;
                            </button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 4. 4 Pilar Keunggulan Platform Jia Learning -->
    <div class="space-y-6 pt-6 border-t border-[#e2cbf6]/60">
        <div class="text-center max-w-xl mx-auto space-y-2">
            <span class="bg-[#ffde59] text-[#6c5857] text-xs font-black px-3.5 py-1 rounded-full uppercase tracking-wider border border-[#ebd04f]">Keunggulan Utama</span>
            <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857]">4 Pilar Belajar Jia Learning</h2>
            <p class="text-xs text-slate-500">Dirancang khusus untuk membuat proses belajarmu menyenangkan & terarah.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 text-left">
            <div class="bg-white rounded-3xl p-6 border-2 border-[#e2cbf6] space-y-3 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-2xl bg-[#e2cbf6] text-[#6c5857] flex items-center justify-center text-xl font-bold border border-[#d1b4ec]"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 18h6M10 22h4M15.09 14c.18-.98.65-1.74 1.41-2.5A4.65 4.65 0 0 0 18 8 6 6 0 0 0 6 8c0 1 .23 2.23 1.5 3.5A4.61 4.61 0 0 1 8.91 14"></path></svg></span></div>
                <h3 class="font-black text-sm text-[#6c5857]">Paham Belajar Lebih Seru</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Video belajar animasi dilengkapi <b class="text-[#6c5857]">Rangkuman, Infografis, Flashcard, & Kuis</b> interaktif.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 border-2 border-[#ffde59] space-y-3 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-2xl bg-[#ffde59] text-[#6c5857] flex items-center justify-center text-xl font-bold border border-[#ebd04f]"><span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><circle cx="12" cy="12" r="6"></circle><circle cx="12" cy="12" r="2"></circle></svg></span></div>
                <h3 class="font-black text-sm text-[#6c5857]">Siap Taklukkan Ujian</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Drill soal di <b class="text-[#6c5857]">Bank Soal, Try Out IRT, & Adaptive Test</b> bantu tembus sekolah/kampus impian.
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 border-2 border-[#e2cbf6] space-y-3 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-2xl bg-[#e2cbf6] text-[#6c5857] flex items-center justify-center text-xl font-bold border border-[#d1b4ec]"></div>
                <h3 class="font-black text-sm text-[#6c5857]">Bimbel Online Terlengkap</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Bimbingan langsung dari <b class="text-[#6c5857]">Rockstar Teacher</b> lulusan PTN ternama (UI, ITB, UGM).
                </p>
            </div>

            <div class="bg-white rounded-3xl p-6 border-2 border-[#ffde59] space-y-3 shadow-sm hover:shadow-md transition">
                <div class="w-12 h-12 rounded-2xl bg-[#ffde59] text-[#6c5857] flex items-center justify-center text-xl font-bold border border-[#ebd04f]"></div>
                <h3 class="font-black text-sm text-[#6c5857]">Info Pendidikan Terupdate</h3>
                <p class="text-xs text-slate-500 leading-relaxed">
                    Informasi kisi-kisi resmi asesmen TKA & PTN terupdate langsung di dalam aplikasi.
                </p>
            </div>
        </div>
    </div>

    <!-- 5. Rockstar Teacher Jia Learning -->
    <div class="space-y-6 pt-6 border-t border-[#e2cbf6]/60">
        <div class="text-center max-w-xl mx-auto space-y-2">
            <span class="bg-[#f5eaf8] text-[#6c5857] text-xs font-black px-3.5 py-1 rounded-full uppercase tracking-wider border border-[#e2cbf6]">Tim Pengajar Terbaik</span>
            <h2 class="text-2xl sm:text-3xl font-black text-[#6c5857]">Rockstar Teacher Jia Learning</h2>
            <p class="text-xs text-slate-500">Mentor berpengalaman yang siap mendampingi perjalanan belajarmu sampai lulus.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 text-left">
            @foreach ($blogMentors as $bm)
                <div class="bg-white rounded-3xl p-6 {{ $bm->is_featured ? 'border-2 border-[#ffde59] shadow-md relative' : 'border-2 border-[#e2cbf6] shadow-sm' }} space-y-4">
                    @if ($bm->is_featured)
                        <span class="absolute -top-3 right-4 bg-[#ffde59] text-[#6c5857] text-[10px] font-black px-3 py-0.5 rounded-full border border-[#ebd04f]">⭐ MENTOR FAVORIT</span>
                    @endif
                    <div class="w-16 h-16 rounded-2xl {{ $bm->is_featured ? 'bg-[#e2cbf6] border-[#d1b4ec]' : 'bg-[#ffde59] border-[#ebd04f]' }} text-[#6c5857] flex items-center justify-center font-black text-2xl border mx-auto shadow-inner overflow-hidden">
                        @if ($bm->photo)
                            <img src="{{ $bm->photoUrl() }}" alt="{{ $bm->name }}" class="w-full h-full object-cover">
                        @else
                            {{ $bm->avatar_emoji }}
                        @endif
                    </div>
                    <div class="text-center">
                        <h4 class="font-black text-sm text-[#6c5857]">{{ $bm->name }}</h4>
                        <p class="text-[11px] font-bold text-slate-500">{{ $bm->subject }}</p>
                        <p class="text-[10px] text-slate-400 font-bold">{{ $bm->campus }}</p>
                    </div>
                    <div class="text-xs text-slate-600 space-y-1.5 pt-3 border-t border-slate-100">
                        @foreach ($bm->achievements ?? [] as $ach)
                            <p class="flex items-center gap-1.5"><span></span> <span>{{ $ach }}</span></p>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- 6. Newsletter / Free Coupon Subscription Banner -->
    <div class="bg-gradient-to-r from-[#e2cbf6] via-[#faf7fd] to-[#ffde59]/40 rounded-[2.5rem] p-8 sm:p-10 border-2 border-[#e2cbf6] shadow-xl text-center space-y-4">
        <span class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-3 py-1 rounded-full border border-[#ebd04f]">
            <span class="icon-indicator"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span> Newsletter Edukasi Gratis
        </span>
        <h3 class="text-xl sm:text-2xl font-black text-[#6c5857]">Dapatkan Update Soal HOTS & Kisi-Kisi TKA 2026 Gratis!</h3>
        <p class="text-xs text-slate-600 max-w-lg mx-auto leading-relaxed">
            Berlangganan buletin mingguan Jia Learning untuk mendapatkan ringkasan materi, tips belajar, dan voucher diskon khusus bimbingan.
        </p>

        <form onsubmit="submitNewsletter(event)" class="max-w-md mx-auto flex flex-col sm:flex-row gap-2 pt-2">
            @csrf
            <input type="email" name="email" id="newsletter-email" required placeholder="Masukkan alamat email aktifmu..." class="w-full px-4 py-3 rounded-2xl border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs text-[#6c5857] bg-white shadow-sm">
            <button type="submit" class="bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black px-6 py-3 rounded-2xl text-xs shadow-md border border-[#ebd04f] transition shrink-0 cursor-pointer">
                Berlangganan &rsaquo;
            </button>
        </form>
    </div>

</div>

<!-- Interactive Modal Reader Artikel -->
<div id="blog-reader-modal" class="fixed inset-0 z-50 bg-slate-900/60 backdrop-blur-sm hidden flex items-center justify-center p-4">
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-2xl max-w-2xl w-full max-h-[90vh] overflow-y-auto p-6 sm:p-8 space-y-6 text-left relative">
        <button type="button" onclick="closeBlogModal()" class="absolute top-4 right-4 w-8 h-8 rounded-full bg-slate-100 text-[#6c5857] font-black text-sm flex items-center justify-center hover:bg-slate-200 transition cursor-pointer"></button>

        <div class="space-y-2 border-b border-slate-100 pb-4">
            <span id="modal-blog-category" class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-2.5 py-0.5 rounded-full border border-[#ebd04f]">Tips Belajar</span>
            <h2 id="modal-blog-title" class="text-xl sm:text-2xl font-black text-[#6c5857] leading-tight">Judul Artikel</h2>
            <div id="modal-blog-author" class="text-xs text-slate-400 font-bold">Oleh Mentor Jia Learning</div>
        </div>

        <div id="modal-blog-body" class="text-xs sm:text-sm text-slate-600 leading-relaxed space-y-4">
            <p>Memuat isi artikel...</p>
        </div>

        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
            <span class="text-xs font-bold text-slate-400">Jia Learning Academy • 2026</span>
            <button type="button" onclick="closeBlogModal()" class="bg-[#ffde59] text-[#6c5857] font-black px-4 py-2 rounded-xl text-xs border border-[#ebd04f] shadow-sm hover:bg-[#ebd04f] transition cursor-pointer">
                Tutup Artikel
            </button>
        </div>
    </div>
</div>

@php
    $blogPayload = $allArticles->mapWithKeys(fn ($article) => [
        $article->slug => [
            'category' => $article->category_label,
            'title' => $article->title,
            'author' => trim('Oleh ' . $article->author_name . ($article->author_role ? ' (' . $article->author_role . ')' : '') . ' • ' . $article->published_date_label),
            'body' => $article->content,
        ],
    ]);
@endphp

<script>
const blogArticlesData = @json($blogPayload);

async function submitNewsletter(event) {
    event.preventDefault();
    const emailInput = document.getElementById('newsletter-email');
    const token = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
    try {
        const response = await fetch('{{ route("newsletter.subscribe") }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': token
            },
            body: JSON.stringify({ email: emailInput ? emailInput.value : '' })
        });
        const data = await response.json();
        alert(data.message || 'Terima kasih! Email Anda telah terdaftar untuk menerima newsletter edukasi Jia Learning.');
        if (response.ok && emailInput) emailInput.value = '';
    } catch (e) {
        alert('Terima kasih! Email Anda telah terdaftar untuk menerima newsletter edukasi Jia Learning.');
    }
}

function openBlogModal(id) {
    const modal = document.getElementById('blog-reader-modal');
    const data = blogArticlesData[id];
    if (!data || !modal) return;

    document.getElementById('modal-blog-category').textContent = data.category;
    document.getElementById('modal-blog-title').textContent = data.title;
    document.getElementById('modal-blog-author').textContent = data.author;
    document.getElementById('modal-blog-body').innerHTML = data.body;

    modal.classList.remove('hidden');
}

function closeBlogModal() {
    const modal = document.getElementById('blog-reader-modal');
    if (modal) modal.classList.add('hidden');
}

function filterBlogCategory(category) {
    const cards = document.querySelectorAll('.blog-card');
    cards.forEach(card => {
        if (category === 'semua') {
            card.style.display = 'grid';
            if (card.classList.contains('md:grid-cols-3')) card.style.display = 'flex';
        } else {
            if (card.classList.contains('blog-cat-' + category)) {
                card.style.display = 'flex';
                if (card.classList.contains('lg:grid-cols-12')) card.style.display = 'grid';
            } else {
                card.style.display = 'none';
            }
        }
    });
}

function filterBlogArticles() {
    const query = document.getElementById('input-search-blog').value.toLowerCase();
    const cards = document.querySelectorAll('.blog-card');
    cards.forEach(card => {
        const text = card.textContent.toLowerCase();
        if (text.includes(query)) {
            card.style.display = 'flex';
            if (card.classList.contains('lg:grid-cols-12')) card.style.display = 'grid';
        } else {
            card.style.display = 'none';
        }
    });
}
</script>