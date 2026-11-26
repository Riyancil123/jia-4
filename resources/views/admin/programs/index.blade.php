@extends('admin.layouts.app')

@section('title', 'Paket Bimbingan')
@section('page_title', 'Kelola Program & Paket Bimbingan')
@section('page_subtitle', 'Atur daftar paket belajar, modul cetak, fasilitas, dan status unggulan.')

@section('header_actions')
    <a href="{{ route('admin.programs.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Program</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6] text-[#6c5857]">
                    <tr>
                        <th class="p-4 font-black">Urutan</th>
                        <th class="p-4 font-black">Program</th>
                        <th class="p-4 font-black">Kategori</th>
                        <th class="p-4 font-black">Badge / Durasi</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($programs as $program)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 font-bold">{{ $program->sort_order }}</td>
                            <td class="p-4">
                                <div class="flex items-center gap-2.5">
                                    <span class="text-lg">{{ $program->icon }}</span>
                                    <div>
                                        <p class="font-black text-[#6c5857]">{{ $program->title }}</p>
                                        <p class="text-[11px] text-slate-400">{{ count($program->features ?? []) }} fasilitas</p>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4 font-semibold">{{ \App\Models\Program::CATEGORIES[$program->category] ?? $program->category }}</td>
                            <td class="p-4">
                                <span class="bg-[#f5eaf8] px-2.5 py-1 rounded-full text-[10px] font-black">{{ $program->badge_text ?: '-' }}</span>
                                @if ($program->is_featured)
                                    <span class="bg-[#ffde59] px-2.5 py-1 rounded-full text-[10px] font-black ml-1">Utama</span>
                                @endif
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $program->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $program->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.programs.edit', $program),
                                    'deleteUrl' => route('admin.programs.destroy', $program),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada program bimbingan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
