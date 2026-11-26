@extends('admin.layouts.app')

@section('title', 'Dashboard CMS')
@section('page_title', 'Dashboard Pengelolaan Konten')
@section('page_subtitle', 'Ringkasan data website Jia Learning yang tersimpan di database CMS.')

@section('header_actions')
    <a href="{{ route('admin.settings.edit') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm transition inline-flex items-center gap-2">
        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
        <span>Pengaturan & Promo</span>
    </a>
@endsection

@section('content')
    @php
        $cards = [
            ['label' => 'Paket Bimbingan', 'value' => $stats['programs'], 'icon' => 'book', 'route' => 'admin.programs.index'],
            ['label' => 'Artikel Blog & Video', 'value' => $stats['articles'], 'icon' => 'file-text', 'route' => 'admin.articles.index'],
            ['label' => 'Mentor Akademik', 'value' => $stats['mentors'], 'icon' => 'users', 'route' => 'admin.mentors.index'],
            ['label' => 'Materi Belajar', 'value' => $stats['materials'], 'icon' => 'book-open', 'route' => 'admin.materials.index'],
            ['label' => 'Modul Bank Soal', 'value' => $stats['questionModules'], 'icon' => 'check-square', 'route' => 'admin.question-modules.index'],
            ['label' => 'Jadwal Live Zoom', 'value' => $stats['liveClasses'], 'icon' => 'video', 'route' => 'admin.live-classes.index'],
            ['label' => 'Daftar FAQ', 'value' => $stats['faqs'], 'icon' => 'help-circle', 'route' => 'admin.faqs.index'],
            ['label' => 'Testimoni', 'value' => $stats['testimonials'], 'icon' => 'star', 'route' => 'admin.testimonials.index'],
            ['label' => 'Fitur Unggulan', 'value' => $stats['features'], 'icon' => 'zap', 'route' => 'admin.features.index'],
            ['label' => 'Catatan Rilis', 'value' => $stats['updates'], 'icon' => 'bell', 'route' => 'admin.updates.index'],
            ['label' => 'Voucher Aktif', 'value' => $stats['vouchers'], 'icon' => 'tag', 'route' => 'admin.vouchers.index'],
            ['label' => 'Subscriber Email', 'value' => $stats['subscribers'], 'icon' => 'mail', 'route' => 'admin.subscribers.index'],
        ];

        $getCardSvg = function($icon) {
            $icons = [
                'book' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"></path><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"></path></svg>',
                'file-text' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line></svg>',
                'users' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>',
                'book-open' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>',
                'check-square' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg>',
                'video' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="23 7 16 12 23 17 23 7"></polygon><rect x="1" y="5" width="15" height="14" rx="2" ry="2"></rect></svg>',
                'help-circle' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"></path><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>',
                'star' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon></svg>',
                'zap' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="13 2 3 14 12 14 11 22 21 10 12 10 13 2"></polygon></svg>',
                'bell' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>',
                'tag' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"></path><line x1="7" y1="7" x2="7.01" y2="7"></line></svg>',
                'mail' => '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>',
            ];
            return $icons[$icon] ?? '';
        };
    @endphp

    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
        @foreach ($cards as $card)
            <a href="{{ route($card['route']) }}" class="bg-white rounded-3xl p-5 border-2 border-[#e2cbf6] hover:border-[#ffde59] shadow-sm hover:shadow-md transition flex items-center justify-between">
                <div>
                    <span class="text-[11px] font-bold text-slate-400 block">{{ $card['label'] }}</span>
                    <span class="text-2xl font-black text-[#6c5857] mt-1 block">{{ $card['value'] }}</span>
                </div>
                <div class="w-11 h-11 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] flex items-center justify-center text-[#6c5857]">
                    {!! $getCardSvg($card['icon']) !!}
                </div>
            </a>
        @endforeach
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h2 class="font-black text-sm text-[#6c5857]">Artikel Blog Terbaru</h2>
                <a href="{{ route('admin.articles.create') }}" class="text-xs font-black text-[#6c5857] hover:underline">+ Tambah Artikel</a>
            </div>
            <div class="space-y-3">
                @forelse ($recentArticles as $article)
                    <div class="flex items-center justify-between gap-3 p-3 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6]/70">
                        <div class="min-w-0">
                            <p class="text-xs font-extrabold text-[#6c5857] truncate">{{ $article->title }}</p>
                            <span class="text-[10px] text-slate-400 font-bold">{{ $article->category_label }} • {{ $article->published_date_label }}</span>
                        </div>
                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-xs font-black px-3 py-1.5 rounded-xl bg-white border border-[#e2cbf6] hover:border-[#6c5857] shrink-0">Edit</a>
                    </div>
                @empty
                    <p class="text-xs text-slate-400">Belum ada artikel.</p>
                @endforelse
            </div>
        </div>

        <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 shadow-sm space-y-4">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h2 class="font-black text-sm text-[#6c5857]">Subscriber Newsletter Terbaru</h2>
                <a href="{{ route('admin.subscribers.index') }}" class="text-xs font-black text-[#6c5857] hover:underline">Lihat Semua &rsaquo;</a>
            </div>
            <div class="space-y-2.5">
                @forelse ($recentSubscribers as $subscriber)
                    <div class="flex items-center justify-between p-3 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6]/70 text-xs">
                        <span class="font-bold text-[#6c5857]">{{ $subscriber->email }}</span>
                        <span class="text-[10px] text-slate-400">{{ optional($subscriber->subscribed_at)->format('d M Y H:i') }}</span>
                    </div>
                @empty
                    <p class="text-xs text-slate-400">Belum ada subscriber newsletter yang mendaftar.</p>
                @endforelse
            </div>
        </div>
    </div>
@endsection
