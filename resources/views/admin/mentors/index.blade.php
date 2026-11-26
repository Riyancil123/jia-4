@extends('admin.layouts.app')

@section('title', 'Rockstar Mentor')
@section('page_title', 'Kelola Rockstar Mentor & Teacher')
@section('page_subtitle', 'Atur profil pengajar yang tampil di Beranda, Materi Belajar, dan Blog.')

@section('header_actions')
    <a href="{{ route('admin.mentors.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Mentor</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Mentor</th>
                        <th class="p-4 font-black">Mapel & Kampus</th>
                        <th class="p-4 font-black">Lokasi Tampil</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($mentors as $mentor)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-xl bg-[#ffde59]/40 flex items-center justify-center text-lg border border-[#ebd04f]">{{ $mentor->avatar_emoji }}</div>
                                    <div>
                                        <p class="font-black text-[#6c5857]">{{ $mentor->name }}</p>
                                        @if ($mentor->is_featured)
                                            <span class="bg-[#ffde59] text-[10px] font-black px-2 py-0.5 rounded-full">Favorit</span>
                                        @endif
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <p class="font-bold">{{ $mentor->subject }}</p>
                                <p class="text-[11px] text-slate-400">{{ $mentor->campus }}</p>
                            </td>
                            <td class="p-4 space-x-1">
                                @if ($mentor->show_on_beranda) <span class="bg-[#f5eaf8] px-2 py-0.5 rounded text-[10px] font-bold">Beranda</span> @endif
                                @if ($mentor->show_on_materi) <span class="bg-[#f5eaf8] px-2 py-0.5 rounded text-[10px] font-bold">Materi</span> @endif
                                @if ($mentor->show_on_blog) <span class="bg-[#f5eaf8] px-2 py-0.5 rounded text-[10px] font-bold">Blog</span> @endif
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $mentor->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $mentor->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.mentors.edit', $mentor),
                                    'deleteUrl' => route('admin.mentors.destroy', $mentor),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada data mentor.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
