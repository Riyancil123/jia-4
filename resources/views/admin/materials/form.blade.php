@extends('admin.layouts.app')

@section('title', $material->exists ? 'Edit Materi' : 'Tambah Materi')
@section('page_title', $material->exists ? 'Edit Materi Belajar' : 'Tambah Materi Belajar')

@section('header_actions')
    <a href="{{ route('admin.materials.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $material->exists ? route('admin.materials.update', $material) : route('admin.materials.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($material->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Tab Mata Pelajaran</label>
                <select name="subject" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                    @foreach (\App\Models\LearningMaterial::SUBJECTS as $key => $label)
                        <option value="{{ $key }}" {{ old('subject', $material->subject) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Filter Jenjang</label>
                <select name="level_tag" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                    @foreach (\App\Models\LearningMaterial::LEVELS as $key => $label)
                        <option value="{{ $key }}" {{ old('level_tag', $material->level_tag) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Badge Topik</label>
                <input type="text" name="badge" value="{{ old('badge', $material->badge) }}" required placeholder="Contoh: Aljabar SMP & SMA" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Judul Materi</label>
                <input type="text" name="title" value="{{ old('title', $material->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Jumlah Video Konsep</label>
                <input type="number" name="video_count" min="0" value="{{ old('video_count', $material->video_count ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Jumlah Latihan Soal</label>
                <input type="number" name="quiz_count" min="0" value="{{ old('quiz_count', $material->quiz_count ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Tingkat Kesulitan</label>
                <input type="text" name="difficulty_label" value="{{ old('difficulty_label', $material->difficulty_label) }}" placeholder="Tingkat: Dasar › Mahir" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">URL Modul LMS</label>
                <input type="url" name="cta_url" value="{{ old('cta_url', $material->cta_url ?? 'https://admin.jialearning.app') }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Deskripsi Materi</label>
            <textarea name="description" rows="3" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('description', $material->description) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 items-center">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $material->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer">
                <input type="checkbox" name="is_active" value="1" {{ old('is_active', $material->is_active ?? true) ? 'checked' : '' }}>
                <span>Aktif di Website</span>
            </label>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan Materi</button>
        </div>
    </form>
@endsection
