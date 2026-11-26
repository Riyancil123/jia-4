@extends('admin.layouts.app')

@section('title', $program->exists ? 'Edit Program' : 'Tambah Program')
@section('page_title', $program->exists ? 'Edit Program Bimbingan' : 'Tambah Program Bimbingan')

@section('header_actions')
    <a href="{{ route('admin.programs.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $program->exists ? route('admin.programs.update', $program) : route('admin.programs.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($program->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Nama Program</label>
                <input type="text" name="title" value="{{ old('title', $program->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Kategori</label>
                <select name="category" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                    @foreach (\App\Models\Program::CATEGORIES as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $program->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Ikon Emoji</label>
                <input type="text" name="icon" value="{{ old('icon', $program->icon) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Teks Badge</label>
                <input type="text" name="badge_text" value="{{ old('badge_text', $program->badge_text) }}" placeholder="Contoh: 1 Tahun Penuh" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Durasi</label>
                <input type="text" name="duration_label" value="{{ old('duration_label', $program->duration_label) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Harga (Opsional)</label>
                <input type="text" name="price_label" value="{{ old('price_label', $program->price_label) }}" placeholder="Contoh: Rp 49rb/bln" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Teks Tombol CTA</label>
                <input type="text" name="cta_label" value="{{ old('cta_label', $program->cta_label ?? 'Daftar Sekarang') }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">URL Tujuan CTA</label>
                <input type="url" name="cta_url" value="{{ old('cta_url', $program->cta_url ?? 'http://jialearning.app/') }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Deskripsi Program</label>
            <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('description', $program->description) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Daftar Fasilitas (1 baris = 1 poin)</label>
            <textarea name="features_text" rows="5" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('features_text', implode("\n", $program->features ?? [])) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan Tampil</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $program->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $program->is_featured) ? 'checked' : '' }}>
                <span>Tandai Rekomendasi Utama</span>
            </label>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $program->is_active ?? true) ? 'checked' : '' }}>
                <span>Aktif di Website</span>
            </label>
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">
                Simpan Program
            </button>
        </div>
    </form>
@endsection
