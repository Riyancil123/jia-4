@extends('admin.layouts.app')

@section('title', 'Fitur Unggulan')
@section('page_title', 'Kelola Fitur Penunjang Belajar')

@section('header_actions')
    <a href="{{ route('admin.features.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Fitur</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Ikon</th>
                        <th class="p-4 font-black">Judul Fitur</th>
                        <th class="p-4 font-black">Deskripsi</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($features as $feature)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 text-xl">{{ $feature->icon }}</td>
                            <td class="p-4 font-black text-[#6c5857]">{{ $feature->title }}</td>
                            <td class="p-4 text-slate-500 max-w-md truncate">{{ $feature->description }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $feature->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $feature->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.features.edit', $feature),
                                    'deleteUrl' => route('admin.features.destroy', $feature),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada fitur.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
