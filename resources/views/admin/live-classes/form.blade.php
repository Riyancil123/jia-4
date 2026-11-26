@extends('admin.layouts.app')

@section('title', $liveClass->exists ? 'Edit Jadwal Live' : 'Tambah Jadwal Live')
@section('page_title', $liveClass->exists ? 'Edit Jadwal Live Zoom' : 'Tambah Jadwal Live Zoom')

@section('header_actions')
    <a href="{{ route('admin.live-classes.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $liveClass->exists ? route('admin.live-classes.update', $liveClass) : route('admin.live-classes.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($liveClass->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Badge Hari</label>
                <input type="text" name="day_badge" value="{{ old('day_badge', $liveClass->day_badge) }}" required placeholder="LIVE HARI INI / BESOK / SABTU" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Warna Badge</label>
                <select name="badge_color" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                    @foreach (\App\Models\LiveClass::BADGE_COLORS as $key => $label)
                        <option value="{{ $key }}" {{ old('badge_color', $liveClass->badge_color) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Waktu</label>
                <input type="text" name="time_label" value="{{ old('time_label', $liveClass->time_label) }}" required placeholder="19.00 WIB" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Nama Mentor</label>
                <input type="text" name="mentor_name" value="{{ old('mentor_name', $liveClass->mentor_name) }}" required placeholder="Mentor: Kak Arkan, S.Pd." class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-extrabold mb-1.5">Judul Sesi</label>
                <input type="text" name="title" value="{{ old('title', $liveClass->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Kuota</label>
                <input type="text" name="quota_label" value="{{ old('quota_label', $liveClass->quota_label) }}" required placeholder="Sisa 3 Kursi Zoom" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Teks Tombol</label>
                <input type="text" name="cta_label" value="{{ old('cta_label', $liveClass->cta_label) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">URL Sesi</label>
                <input type="url" name="cta_url" value="{{ old('cta_url', $liveClass->cta_url ?? 'https://admin.jialearning.app') }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $liveClass->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <label class="flex items-center gap-2 text-xs font-extrabold cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $liveClass->is_active ?? true) ? 'checked' : '' }}>
            <span>Aktif di Website</span>
        </label>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan Jadwal</button>
        </div>
    </form>
@endsection
