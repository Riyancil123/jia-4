@extends('admin.layouts.app')

@section('title', $update->exists ? 'Edit Update' : 'Tambah Update')
@section('page_title', $update->exists ? 'Edit Catatan Rilis' : 'Tambah Catatan Rilis')

@section('header_actions')
    <a href="{{ route('admin.updates.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $update->exists ? route('admin.updates.update', $update) : route('admin.updates.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($update->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Badge Versi / Kategori</label>
                <input type="text" name="version_badge" value="{{ old('version_badge', $update->version_badge) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Badge Status (Opsional)</label>
                <input type="text" name="status_badge" value="{{ old('status_badge', $update->status_badge) }}" placeholder="Contoh: Aktif" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Tanggal</label>
                <input type="text" name="release_date_label" value="{{ old('release_date_label', $update->release_date_label) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $update->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-extrabold mb-1.5">Judul Pembaruan</label>
                <input type="text" name="title" value="{{ old('title', $update->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Teks Tautan Fitur (Opsional)</label>
                <input type="text" name="cta_label" value="{{ old('cta_label', $update->cta_label) }}" placeholder="Coba Fitur" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Target View Slug (Opsional)</label>
                <input type="text" name="cta_view" value="{{ old('cta_view', $update->cta_view) }}" placeholder="adaptive-test" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Ringkasan Pembaruan</label>
            <textarea name="summary" rows="3" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('summary', $update->summary) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Tag Highlight (1 baris = 1 tag)</label>
            <textarea name="tags_text" rows="3" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('tags_text', implode("\n", $update->tags ?? [])) }}</textarea>
        </div>

        <label class="flex items-center gap-2 text-xs font-extrabold cursor-pointer">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $update->is_published ?? true) ? 'checked' : '' }}>
            <span>Publikasikan</span>
        </label>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">
                Simpan Catatan Rilis
            </button>
        </div>
    </form>
@endsection
