@extends('admin.layouts.app')

@section('title', 'Jadwal Live Zoom')
@section('page_title', 'Kelola Jadwal Live Class Zoom')

@section('header_actions')
    <a href="{{ route('admin.live-classes.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Jadwal</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Hari & Jam</th>
                        <th class="p-4 font-black">Topik Kelas</th>
                        <th class="p-4 font-black">Mentor</th>
                        <th class="p-4 font-black">Kuota</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($liveClasses as $item)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4">
                                <span class="bg-[#f5eaf8] px-2.5 py-0.5 rounded-full text-[10px] font-black">{{ $item->day_badge }}</span>
                                <span class="block text-slate-400 font-bold mt-1">{{ $item->time_label }}</span>
                            </td>
                            <td class="p-4 font-black text-[#6c5857]">{{ $item->title }}</td>
                            <td class="p-4 text-slate-600">{{ $item->mentor_name }}</td>
                            <td class="p-4 font-bold text-emerald-600">{{ $item->quota_label }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $item->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.live-classes.edit', $item),
                                    'deleteUrl' => route('admin.live-classes.destroy', $item),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="p-6 text-center text-slate-400">Belum ada jadwal live class.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
