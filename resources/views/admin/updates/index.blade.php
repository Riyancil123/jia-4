@extends('admin.layouts.app')

@section('title', 'Kabar & Rilis')
@section('page_title', 'Kelola Catatan Rilis & Pembaruan Platform')
@section('page_subtitle', 'Mengatur daftar update yang tampil di halaman Pahami Berita & Update Jia.')

@section('header_actions')
    <a href="{{ route('admin.updates.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Update</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Versi / Badge</th>
                        <th class="p-4 font-black">Judul Update</th>
                        <th class="p-4 font-black">Tanggal</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($updates as $update)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 font-black">{{ $update->version_badge }}</td>
                            <td class="p-4 font-bold text-[#6c5857]">{{ $update->title }}</td>
                            <td class="p-4 text-slate-500">{{ $update->release_date_label }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $update->is_published ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $update->is_published ? 'Aktif' : 'Draft' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.updates.edit', $update),
                                    'deleteUrl' => route('admin.updates.destroy', $update),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada catatan rilis.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
