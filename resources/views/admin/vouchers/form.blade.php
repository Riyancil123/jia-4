@extends('admin.layouts.app')

@section('title', $voucher->exists ? 'Edit Voucher' : 'Tambah Voucher')
@section('page_title', $voucher->exists ? 'Edit Kode Voucher' : 'Tambah Kode Voucher')

@section('header_actions')
    <a href="{{ route('admin.vouchers.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $voucher->exists ? route('admin.vouchers.update', $voucher) : route('admin.vouchers.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($voucher->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Kode Voucher</label>
                <input type="text" name="code" value="{{ old('code', $voucher->code) }}" required placeholder="JIAHEMAT" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-black uppercase">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Diskon</label>
                <input type="text" name="discount_label" value="{{ old('discount_label', $voucher->discount_label) }}" required placeholder="Diskon 60%" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Deskripsi Singkat</label>
                <input type="text" name="description" value="{{ old('description', $voucher->description) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Tanggal Kedaluwarsa (Opsional)</label>
                <input type="date" name="expires_at" value="{{ old('expires_at', optional($voucher->expires_at)->format('Y-m-d')) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <label class="flex items-center gap-2 text-xs font-extrabold cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $voucher->is_active ?? true) ? 'checked' : '' }}>
            <span>Voucher Aktif</span>
        </label>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan Voucher</button>
        </div>
    </form>
@endsection
