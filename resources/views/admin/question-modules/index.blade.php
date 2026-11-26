@extends('admin.layouts.app')

@section('title', 'Bank Soal HOTS')
@section('page_title', 'Kelola Modul Bank Soal HOTS')

@section('header_actions')
    <a href="{{ route('admin.question-modules.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Modul Soal</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Kategori</th>
                        <th class="p-4 font-black">Judul Modul</th>
                        <th class="p-4 font-black">Soal & Durasi</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($modules as $module)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 font-bold">
                                <span class="bg-[#f5eaf8] px-2.5 py-0.5 rounded-lg text-[10px] font-black">{{ $module->category_badge }}</span>
                                <span class="block text-[10px] text-amber-600 mt-1">{{ $module->hots_level }}</span>
                            </td>
                            <td class="p-4 font-black text-[#6c5857]">{{ $module->title }}</td>
                            <td class="p-4 text-slate-500">{{ $module->question_count }} Soal • ⏱️ {{ $module->duration_minutes }} Menit</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $module->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $module->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.question-modules.edit', $module),
                                    'deleteUrl' => route('admin.question-modules.destroy', $module),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada modul bank soal.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
