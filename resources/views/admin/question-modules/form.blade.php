@extends('admin.layouts.app')

@section('title', $module->exists ? 'Edit Modul Soal' : 'Tambah Modul Soal')
@section('page_title', $module->exists ? 'Edit Modul Bank Soal' : 'Tambah Modul Bank Soal')

@section('header_actions')
    <a href="{{ route('admin.question-modules.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $module->exists ? route('admin.question-modules.update', $module) : route('admin.question-modules.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($module->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Badge Kategori</label>
                <input type="text" name="category_badge" value="{{ old('category_badge', $module->category_badge) }}" required placeholder="Contoh: SMP TKA • Aljabar" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Level HOTS</label>
                <input type="text" name="hots_level" value="{{ old('hots_level', $module->hots_level) }}" required placeholder="HOTS Level 2" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-extrabold mb-1.5">Judul Modul Soal</label>
                <input type="text" name="title" value="{{ old('title', $module->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Jumlah Butir Soal</label>
                <input type="number" name="question_count" min="1" value="{{ old('question_count', $module->question_count) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Durasi (Menit)</label>
                <input type="number" name="duration_minutes" min="1" value="{{ old('duration_minutes', $module->duration_minutes) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">URL Pengerjaan LMS</label>
                <input type="url" name="cta_url" value="{{ old('cta_url', $module->cta_url ?? 'https://admin.jialearning.app') }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $module->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Deskripsi Singkat</label>
            <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('description', $module->description) }}</textarea>
        </div>

        <label class="flex items-center gap-2 text-xs font-extrabold cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $module->is_active ?? true) ? 'checked' : '' }}>
            <span>Aktif di Website</span>
        </label>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan Modul Soal</button>
        </div>
    </form>
@endsection
