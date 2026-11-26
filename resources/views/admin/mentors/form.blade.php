@extends('admin.layouts.app')

@section('title', $mentor->exists ? 'Edit Mentor' : 'Tambah Mentor')
@section('page_title', $mentor->exists ? 'Edit Profil Mentor' : 'Tambah Profil Mentor')

@section('header_actions')
    <a href="{{ route('admin.mentors.index') }}" class="px-4 py-2 rounded-xl bg-white border border-[#e2cbf6] text-xs font-black">← Kembali</a>
@endsection

@section('content')
    <form method="POST" enctype="multipart/form-data" action="{{ $mentor->exists ? route('admin.mentors.update', $mentor) : route('admin.mentors.store') }}" class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 sm:p-8 shadow-sm space-y-5">
        @csrf
        @if ($mentor->exists) @method('PUT') @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Nama Lengkap & Gelar</label>
                <input type="text" name="name" value="{{ old('name', $mentor->name) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Mata Pelajaran / Peran</label>
                <input type="text" name="subject" value="{{ old('subject', $mentor->subject) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Asal Kampus / Alumni</label>
                <input type="text" name="campus" value="{{ old('campus', $mentor->campus) }}" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Inisial Avatar (Contoh: AZ, JG)</label>
                <input type="text" name="avatar_emoji" value="{{ old('avatar_emoji', $mentor->avatar_emoji ?? 'AZ') }}" placeholder="AZ" required class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Unggah Foto Mentor (Opsional)</label>
                <input type="file" name="photo_file" accept="image/*" class="w-full px-4 py-2 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <div>
                <label class="block text-xs font-extrabold mb-1.5">Atau Nama File / URL Foto</label>
                <input type="text" name="photo" value="{{ old('photo', $mentor->photo) }}" placeholder="mentor-arkan.jpg" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Kutipan / Metode Mengajar (Tampil di Beranda)</label>
            <textarea name="quote" rows="2" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('quote', $mentor->quote) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-extrabold mb-1.5">Daftar Prestasi / Keunggulan (1 baris = 1 poin)</label>
            <textarea name="achievements_text" rows="4" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">{{ old('achievements_text', implode("\n", $mentor->achievements ?? [])) }}</textarea>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-3 items-center">
            <div>
                <label class="block text-xs font-extrabold mb-1">Urutan</label>
                <input type="number" name="sort_order" min="0" value="{{ old('sort_order', $mentor->sort_order ?? 0) }}" class="w-full px-3 py-2 rounded-xl bg-[#faf7fd] border-2 border-[#e2cbf6] text-xs font-semibold">
            </div>
            <label class="flex items-center gap-2 text-xs font-bold pt-4 cursor-pointer"><input type="checkbox" name="show_on_beranda" value="1" {{ old('show_on_beranda', $mentor->show_on_beranda) ? 'checked' : '' }}> Beranda</label>
            <label class="flex items-center gap-2 text-xs font-bold pt-4 cursor-pointer"><input type="checkbox" name="show_on_materi" value="1" {{ old('show_on_materi', $mentor->show_on_materi ?? true) ? 'checked' : '' }}> Materi</label>
            <label class="flex items-center gap-2 text-xs font-bold pt-4 cursor-pointer"><input type="checkbox" name="show_on_blog" value="1" {{ old('show_on_blog', $mentor->show_on_blog) ? 'checked' : '' }}> Blog</label>
            <label class="flex items-center gap-2 text-xs font-bold pt-4 cursor-pointer"><input type="checkbox" name="is_featured" value="1" {{ old('is_featured', $mentor->is_featured) ? 'checked' : '' }}> Favorit</label>
            <label class="flex items-center gap-2 text-xs font-bold pt-4 cursor-pointer"><input type="checkbox" name="is_active" value="1" {{ old('is_active', $mentor->is_active ?? true) ? 'checked' : '' }}> Aktif</label>
        </div>

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md">
                Simpan Mentor
            </button>
        </div>
    </form>
@endsection
