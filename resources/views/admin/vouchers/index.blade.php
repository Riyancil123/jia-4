@extends('admin.layouts.app')

@section('title', 'Kode Voucher')
@section('page_title', 'Kelola Kode Voucher Promo')

@section('header_actions')
    <a href="{{ route('admin.vouchers.create') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">+ Tambah Voucher</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">Kode</th>
                        <th class="p-4 font-black">Label Diskon</th>
                        <th class="p-4 font-black">Berlaku Sampai</th>
                        <th class="p-4 font-black">Status</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($vouchers as $voucher)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4"><code class="bg-[#ffde59]/40 px-2.5 py-1 rounded-lg font-black">{{ $voucher->code }}</code></td>
                            <td class="p-4">
                                <p class="font-bold text-[#6c5857]">{{ $voucher->discount_label }}</p>
                                <p class="text-[11px] text-slate-400">{{ $voucher->description }}</p>
                            </td>
                            <td class="p-4 text-slate-500">{{ $voucher->expires_at ? $voucher->expires_at->format('d M Y') : 'Tanpa Batas' }}</td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded-full text-[10px] font-black {{ $voucher->is_active ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $voucher->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td class="p-4">
                                @include('admin.partials.action-buttons', [
                                    'editUrl' => route('admin.vouchers.edit', $voucher),
                                    'deleteUrl' => route('admin.vouchers.destroy', $voucher),
                                ])
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="p-6 text-center text-slate-400">Belum ada kode voucher.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
