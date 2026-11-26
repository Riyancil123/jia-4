@extends('admin.layouts.app')

@section('title', $article->exists ? 'Edit Artikel' : 'Tulis Artikel')
@section('page_title', $article->exists ? 'Edit Artikel Blog' : 'Tulis Artikel Blog Baru')

@section('header_actions')
    <a href="{{ route('admin.articles.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ $article->exists ? route('admin.articles.update', $article) : route('admin.articles.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($article->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="md:col-span-2">
                <label class="block text-xs font-extrabold mb-1.5">Judul Artikel</label>
                <input type="text" name="title" value="{{ old('title', $article->title) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Kategori Filter</label>
                <select name="category" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                    @foreach (\App\Models\Article::CATEGORIES as $key => $label)
                        <option value="{{ $key }}" {{ old('category', $article->category) === $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Label Badge Kategori (Opsional)</label>
                <input type="text" name="category_label" value="{{ old('category_label', $article->category_label) }}" placeholder="Contoh: Tips Seleksi SMA & TKA" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Nama Penulis</label>
                <input type="text" name="author_name" value="{{ old('author_name', $article->author_name) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Jabatan / Kampus Penulis</label>
                <input type="text" name="author_role" value="{{ old('author_role', $article->author_role) }}" placeholder="Contoh: Rockstar Teacher ITB" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Estimasi Waktu Baca</label>
                <input type="text" name="read_time" value="{{ old('read_time', $article->read_time) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Tanggal Publikasi (Label)</label>
                <input type="text" name="published_date_label" value="{{ old('published_date_label', $article->published_date_label) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Unggah Gambar Thumbnail (Opsional)</label>
                <input type="file" name="thumbnail_file" accept="image/*" class="w-full px-4 py-2 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Atau Path/URL Thumbnail</label>
                <input type="text" name="thumbnail" value="{{ old('thumbnail', $article->thumbnail) }}" placeholder="images/blog_thumb_utbk.jpg" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div class="md:col-span-2">
                <label class="block text-xs font-extrabold mb-1.5">URL Video YouTube (Opsional - Cuplikan Video)</label>
                <input type="text" name="video_url" value="{{ old('video_url', $article->video_url) }}" placeholder="Contoh: https://www.youtube.com/watch?v=GsnANfe4UQw atau https://youtu.be/..." class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
                <p class="text-[10px] text-slate-400 mt-1">Jika diisi, video dapat langsung ditonton pada popup pemutar video di beranda.</p>
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Ringkasan (Excerpt)</label>
            <textarea name="excerpt" rows="2" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('excerpt', $article->excerpt) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Isi Artikel Lengkap (Mendukung HTML dasar seperti &lt;p&gt;, &lt;h4&gt;, &lt;ul&gt;, &lt;b&gt;)</label>
            <textarea name="content" rows="8" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-mono">{{ old('content', $article->content) }}</textarea>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $article->sort_order ?? 0) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer">
                <input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $article->is_featured) ? 'checked' : '' }}>
                <span>Jadikan Artikel Utama (Highlight)</span>
            </label>
            <label class="flex items-center gap-2 text-xs font-extrabold pt-5 cursor-pointer">
                <input type="checkbox" name="is_published" value="1" {{ old('is_published', $article->is_published ?? true) ? 'checked' : '' }}>
                <span>Publikasikan ke Website</span>
            </label>
        </div>

        <div class="flex justify-end pt-2">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md inline-flex items-center gap-2">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z"></path><polyline points="17 21 17 13 7 13 7 21"></polyline><polyline points="7 3 7 8 15 8"></polyline></svg>
                <span>Simpan Artikel</span>
            </button>
        </div>
    </form>
@endsection
