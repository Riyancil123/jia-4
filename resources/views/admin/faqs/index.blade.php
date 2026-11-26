@extends('admin.layouts.app')

@section('title', 'Kelola FAQ')
@section('page_title', 'Kelola Pertanyaan Umum (FAQ)')

@section('header_actions')
    <a href="{{ route('admin.faqs.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah FAQ</a>
@endsection

@section('content')
    <div class="flex flex-wrap gap-2">
        <a href="{{ route('admin.faqs.index') }}" class="px-3.5 py-1.5 rounded-xl text-xs font-black border {{ !$section ? 'bg-[#ffde59] border-[#ebd04f]' : 'bg-white border-[#e2cbf6]' }}">Semua</a>
        @foreach (\App\Models\Faq::SECTIONS as $key => $label)
            <a href="{{ route('admin.faqs.index', ['section' => $key]) }}" class="px-3.5 py-1.5 rounded-xl text-xs font-black border {{ $section === $key ? 'bg-[#ffde59] border-[#ebd04f]' : 'bg-white border-[#e2cbf6]' }}">{{ $label }}</a>
        @endforeach
    </div>

    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Halaman</th>
                        <th class="p-4 font-black">Pertanyaan</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($faqs as $faq)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4"><span class="bg-[#f5eaf8] px-2.5 py-1 rounded-full text-[10px] font-black">{{ \App\Models\Faq::SECTIONS[$faq->section] ?? $faq->section }}</span></td>
                            <td class="p-4">
                                <p class="font-black text-[#6c5857]">{{ $faq->question }}</p>
                                <p class="text-[11px] text-slate-400 truncate max-w-lg">{{ $faq->answer }}</p>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $faq->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $faq->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.faqs.edit', $faq),
                                    'deleteUrl' => route('admin.faqs.destroy', $faq),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-6 text-center text-slate-400">Belum ada FAQ.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
