@extends('admin.layouts.app')

@section('title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')
@section('page_title', $faq->exists ? 'Edit FAQ' : 'Tambah FAQ')

@section('header_actions')
    <a href="{{ route('admin.faqs.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" action="{{ $faq->exists ? route('admin.faqs.update', $faq) : route('admin.faqs.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($faq->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Halaman / Bagian</label>
                <select name="section" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                    @foreach (\App\Models\Faq::SECTIONS as $key => $label)
                        <option value="{{ $key }}" {{ old('section', $faq->section) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $faq->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Pertanyaan</label>
            <input type="text" name="question" value="{{ old('question', $faq->question) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Jawaban</label>
            <textarea name="answer" rows="4" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('answer', $faq->answer) }}</textarea>
        </div>

        <label class="flex items-center gap-2 text-xs font-extrabold cursor-pointer">
            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $faq->is_active ?? true) ? 'checked' : '' }}>
            <span>Aktif di Website</span>
        </label>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">Simpan FAQ</button>
        </div>
    </form>
@endsection
