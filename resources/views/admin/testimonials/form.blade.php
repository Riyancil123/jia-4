@extends('admin.layouts.app')

@section('title', $testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni')
@section('page_title', $testimonial->exists ? 'Edit Testimoni' : 'Tambah Testimoni')

@section('header_actions')
    <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $testimonial->exists ? route('admin.testimonials.update', $testimonial) : route('admin.testimonials.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($testimonial->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Nama Siswa / Orang Tua</label>
                <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Keterangan / Sekolah</label>
                <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Rating (1-5)</label>
                <input type="number" name="rating" min="1" max="5" value="{{ old('rating', $testimonial->rating ?? 5) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Inisial Avatar (Opsional)</label>
                <input type="text" name="avatar_initial" maxlength="4" value="{{ old('avatar_initial', $testimonial->avatar_initial) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Isi Testimoni</label>
            <textarea name="quote" rows="3" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('quote', $testimonial->quote) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $testimonial->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer"><input type="checkbox" name="is_highlighted" value="1" {{ old('is_highlighted', $testimonial->is_highlighted) ? 'checked' : '' }}> Highlight Kuning</label>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $testimonial->is_active ?? true) ? 'checked' : '' }}> Aktif</label>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan Testimoni</button>
        </div>
    </form>
@endsection
