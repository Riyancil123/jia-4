@extends('admin.layouts.app')

@section('title', $feature->exists ? 'Edit Fitur' : 'Tambah Fitur')
@section('page_title', $feature->exists ? 'Edit Fitur Penunjang' : 'Tambah Fitur Penunjang')

@section('header_actions')
    <a href="{{ route('admin.features.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $feature->exists ? route('admin.features.update', $feature) : route('admin.features.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($feature->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Ikon Emoji</label>
                <input type="text" name="icon" value="{{ old('icon', $feature->icon) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Judul Fitur</label>
                <input type="text" name="title" value="{{ old('title', $feature->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $feature->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Deskripsi</label>
            <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('description', $feature->description) }}</textarea>
        </div>

        <label class="flex items-center gap-2 text-xs font-extrabold cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $feature->is_active ?? true) ? 'checked' : '' }}>
            <span>Aktif di Website</span>
        </label>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan Fitur</button>
        </div>
    </form>
@endsection
