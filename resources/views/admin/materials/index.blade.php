@extends('admin.layouts.app')

@section('title', 'Materi Belajar')
@section('page_title', 'Kelola Materi Belajar Konsep')

@section('header_actions')
    <a href="{{ route('admin.materials.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Materi</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Mata Pelajaran</th>
                        <th class="p-4 font-black">Topik / Judul</th>
                        <th class="p-4 font-black">Jenjang</th>
                        <th class="p-4 font-black">Video & Kuis</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($materials as $material)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 font-bold">{{ \App\Models\LearningMaterial::SUBJECTS[$material->subject] ?? $material->subject }}</td>
                            <td class="p-4">
                                <p class="font-black text-[#6c5857]">{{ $material->title }}</p>
                                <span class="text-[10px] text-slate-400">{{ $material->badge }}</span>
                            </td>
                            <td class="p-4"><span class="bg-[#f5eaf8] px-2.5 py-0.5 rounded-full text-[10px] font-black uppercase">{{ $material->level_tag }}</span></td>
                            <td class="p-4 text-slate-500">{{ $material->video_count }} • {{ $material->quiz_count }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $material->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $material->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.materials.edit', $material),
                                    'deleteUrl' => route('admin.materials.destroy', $material),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada materi belajar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
