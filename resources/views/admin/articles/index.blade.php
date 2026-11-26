@extends('admin.layouts.app')

@section('title', 'Artikel Blog')
@section('page_title', 'Kelola Artikel Blog & Kabar Jia')
@section('page_subtitle', 'Tambah, sunting, atau unggah gambar artikel yang tampil pada halaman Blog.')

@section('header_actions')
    <a href="{{ route('admin.articles.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tulis Artikel</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Artikel</th>
                        <th class="p-4 font-black">Kategori</th>
                        <th class="p-4 font-black">Penulis</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($articles as $article)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <img src="{{ $article->thumbnailUrl() }}" alt="" class="w-14 h-10 rounded-xl object-cover border border-[#e2cbf6] shrink-0">
                                    <div>
                                        <p class="font-black text-[#6c5857]">{{ $article->title }}</p>
                                        <p class="text-[10px] text-slate-400">{{ $article->published_date_label }} • {{ $article->read_time }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="bg-[#f5eaf8] px-2.5 py-1 rounded-full text-[10px] font-black">{{ $article->category_label }}</span>
                                @if ($article->is_featured)
                                    <span class="bg-[#ffde59] px-2.5 py-1 rounded-full text-[10px] font-black ml-1">Utama</span>
                                @endif
                            </td>
                            <td class="p-4 font-semibold">{{ $article->author_name }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $article->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $article->is_published ? 'Terbit' : 'Draft' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.articles.edit', $article),
                                    'deleteUrl' => route('admin.articles.destroy', $article),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada artikel blog.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
