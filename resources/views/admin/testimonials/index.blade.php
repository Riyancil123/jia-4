@extends('admin.layouts.app')

@section('title', 'Testimoni')
@section('page_title', 'Kelola Testimoni Siswa & Orang Tua')

@section('header_actions')
    <a href="{{ route('admin.testimonials.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Testimoni</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Nama</th>
                        <th class="p-4 font-black">Peran / Sekolah</th>
                        <th class="p-4 font-black">Kutipan</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($testimonials as $item)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 font-black text-[#6c5857]">{{ $item->name }}</td>
                            <td class="p-4 text-slate-500">{{ $item->role }}</td>
                            <td class="p-4 max-w-md truncate text-slate-600">{{ $item->quote }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.testimonials.edit', $item),
                                    'deleteUrl' => route('admin.testimonials.destroy', $item),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada testimoni.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
