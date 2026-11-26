<div class="flex items-center justify-end gap-2">
    <a href="{{ $editUrl }}" class="px-3 py-1.5 rounded-xl bg-[#faf7fd] hover:bg-[#ffde59]/40 border border-[#e2cbf6] text-xs font-black text-[#6c5857] transition">Edit</a>
    <form method="POST" action="{{ $deleteUrl }}" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-3 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 border border-rose-200 text-xs font-black text-rose-700 transition">Hapus</button>
    </form>
</div>
