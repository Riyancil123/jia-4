<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'CMS Admin') — Jia Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
    </style>
</head>
<body class="bg-[#faf7fd] text-[#6c5857] min-h-screen flex flex-col lg:flex-row">

    @php
        $navGroups = [
            'Utama' => [
                ['route' => 'admin.dashboard', 'pattern' => 'admin.dashboard', 'icon' => 'grid', 'label' => 'Dashboard'],
                ['route' => 'admin.settings.edit', 'pattern' => 'admin.settings.*', 'icon' => 'settings', 'label' => 'Pengaturan & Promo'],
            ],
            'Konten Web' => [
                ['route' => 'admin.programs.index', 'pattern' => 'admin.programs.*', 'icon' => 'book', 'label' => 'Paket Bimbingan'],
                ['route' => 'admin.articles.index', 'pattern' => 'admin.articles.*', 'icon' => 'file-text', 'label' => 'Artikel Blog'],
                ['route' => 'admin.updates.index', 'pattern' => 'admin.updates.*', 'icon' => 'bell', 'label' => 'Kabar & Rilis'],
                ['route' => 'admin.mentors.index', 'pattern' => 'admin.mentors.*', 'icon' => 'users', 'label' => 'Mentor Akademik'],
                ['route' => 'admin.testimonials.index', 'pattern' => 'admin.testimonials.*', 'icon' => 'star', 'label' => 'Testimoni'],
            ],
            'Akademik & Jadwal' => [
                ['route' => 'admin.materials.index', 'pattern' => 'admin.materials.*', 'icon' => 'book-open', 'label' => 'Materi Belajar'],
                ['route' => 'admin.question-modules.index', 'pattern' => 'admin.question-modules.*', 'icon' => 'check-square', 'label' => 'Bank Soal HOTS'],
                ['route' => 'admin.live-classes.index', 'pattern' => 'admin.live-classes.*', 'icon' => 'video', 'label' => 'Jadwal Live Zoom'],
                ['route' => 'admin.features.index', 'pattern' => 'admin.features.*', 'icon' => 'zap', 'label' => 'Fitur Unggulan'],
                ['route' => 'admin.faqs.index', 'pattern' => 'admin.faqs.*', 'icon' => 'help-circle', 'label' => 'FAQ Halaman'],
            ],
            'Pemasaran' => [
                ['route' => 'admin.vouchers.index', 'pattern' => 'admin.vouchers.*', 'icon' => 'tag', 'label' => 'Kode Voucher'],
                ['route' => 'admin.subscribers.index', 'pattern' => 'admin.subscribers.*', 'icon' => 'mail', 'label' => 'Subscriber Newsletter'],
            ],
        ];

        $getNavSvg = function($icon) {
            $icons = [
                'grid' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="7" height="7"></rect><rect x="14" y="3" width="7" height="7"></rect><rect x="14" y="14" width="7" height="7"></rect><rect x="3" y="14" width="7" height="7"></rect></svg>',
                'settings' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>',
                'book' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>',
                'file-text' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>',
                'bell' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>',
                'users' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                'star' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
                'book-open' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>',
                'check-square' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'video' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>',
                'zap' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
                'help-circle' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
                'tag' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>',
                'mail' => '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
            ];
            return $icons[$icon] ?? '<span class="w-2 h-2 rounded-full bg-slate-400"></span>';
        };
    @endphp

    <!-- Mobile Top Bar -->
    <div class="lg:hidden bg-white border-b border-[#e2cbf6] px-4 py-3 flex items-center justify-between sticky top-0 z-40">
        <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5">
            <img src="{{ asset('images/logo_hd.png') }}" alt="Jia Learning" class="h-9 w-auto object-contain">
            <span class="font-black text-sm text-[#6c5857]">CMS Admin</span>
        </a>
        <button type="button" onclick="document.getElementById('cms-sidebar').classList.toggle('hidden')" class="px-3 py-2 rounded-xl bg-[#faf7fd] border border-[#e2cbf6] text-xs font-black inline-flex items-center gap-1.5">
            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg>
            <span>Menu</span>
        </button>
    </div>

    <!-- Sidebar -->
    <aside id="cms-sidebar" class="hidden lg:flex flex-col w-full lg:w-72 bg-white border-r border-[#e2cbf6] shrink-0 lg:min-h-screen lg:sticky lg:top-0 lg:max-h-screen overflow-y-auto z-30">
        <div class="p-5 border-b border-[#e2cbf6] hidden lg:flex items-center justify-between">
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-3">
                <div class="bg-[#faf7fd] p-1.5 rounded-xl border border-[#e2cbf6]">
                    <img src="{{ asset('images/logo_hd.png') }}" alt="Jia Learning" class="h-10 w-auto object-contain">
                </div>
                <div>
                    <span class="font-black text-sm text-[#6c5857] block leading-tight">Jia Learning</span>
                    <span class="text-[10px] font-extrabold uppercase tracking-wider text-slate-400">Content Management</span>
                </div>
            </a>
        </div>

        <nav class="p-4 space-y-5 flex-1">
            @foreach ($navGroups as $groupName => $items)
                <div class="space-y-1">
                    <span class="px-3 text-[10px] font-black uppercase tracking-wider text-slate-400 block mb-1.5">{{ $groupName }}</span>
                    @foreach ($items as $item)
                        @php $isActive = request()->routeIs($item['pattern']); @endphp
                        <a href="{{ route($item['route']) }}"
                           class="flex items-center gap-2.5 px-3.5 py-2.5 rounded-2xl text-xs font-extrabold transition {{ $isActive ? 'bg-[#ffde59] text-[#6c5857] shadow-sm border border-[#ebd04f]' : 'text-[#6c5857]/80 hover:bg-[#faf7fd] hover:text-[#6c5857]' }}">
                            <span class="shrink-0">{!! $getNavSvg($item['icon']) !!}</span>
                            <span>{{ $item['label'] }}</span>
                        </a>
                    @endforeach
                </div>
            @endforeach
        </nav>

        <div class="p-4 border-t border-[#e2cbf6] space-y-2.5 bg-[#faf7fd]/60">
            <a href="{{ route('home') }}" target="_blank" class="w-full flex items-center justify-center gap-2 px-4 py-2.5 rounded-xl bg-white border border-[#e2cbf6] hover:border-[#6c5857] text-xs font-black text-[#6c5857] transition">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>
                <span>Lihat Website Publik</span>
            </a>
            <div class="flex items-center justify-between px-2 pt-1">
                <div class="min-w-0">
                    <p class="text-xs font-black text-[#6c5857] truncate">{{ auth()->user()->name }}</p>
                    <p class="text-[10px] text-slate-400 truncate">{{ auth()->user()->email }}</p>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="text-[11px] font-black text-rose-600 hover:underline px-2 py-1">Keluar</button>
                </form>
            </div>
        </div>
    </aside>

    <!-- Main Workspace -->
    <div class="flex-1 min-w-0 flex flex-col">
        <header class="bg-white/90 backdrop-blur border-b border-[#e2cbf6] px-6 py-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
            <div>
                <h1 class="text-xl font-black text-[#6c5857]">@yield('page_title', 'Dashboard CMS')</h1>
                @hasSection('page_subtitle')
                    <p class="text-xs text-slate-500 mt-0.5">@yield('page_subtitle')</p>
                @endif
            </div>
            <div class="flex items-center gap-2">
                @yield('header_actions')
            </div>
        </header>

        <main class="p-6 max-w-7xl w-full mx-auto space-y-6 flex-1">
            @if (session('status'))
                <div class="bg-emerald-50 border-2 border-emerald-200 text-emerald-800 px-4 py-3 rounded-2xl text-xs font-bold flex items-center justify-between shadow-sm">
                    <span class="inline-flex items-center gap-2">
                        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                        <span>{{ session('status') }}</span>
                    </span>
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-rose-50 border-2 border-rose-200 text-rose-800 px-4 py-3 rounded-2xl text-xs space-y-1 shadow-sm">
                    <p class="font-black">Terjadi kesalahan input:</p>
                    <ul class="list-disc pl-5 space-y-0.5">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

</body>
</html>
