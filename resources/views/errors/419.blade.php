<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="3;url={{ route('admin.login') }}">
    <title>Sesi Halaman Berakhir — Jia Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#e2cbf6] via-[#faf7fd] to-white flex items-center justify-center p-4 text-[#6c5857]">

    <div class="w-full max-w-md bg-white rounded-[2.5rem] border-2 border-[#e2cbf6] shadow-2xl p-8 sm:p-10 space-y-6 text-center">
        <div class="space-y-3">
            <div class="inline-flex bg-[#faf7fd] p-4 rounded-2xl border border-[#e2cbf6] shadow-sm text-[#6c5857]">
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21.5 2v6h-6M2.5 22v-6h6M2 11.5a10 10 0 0 1 18.8-4.3M22 12.5a10 10 0 0 1-18.8 4.2"/>
                </svg>
            </div>
            <div>
                <span class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-3 py-1 rounded-full border border-[#ebd04f]">419 • Sesi Kedaluwarsa</span>
                <h1 class="text-2xl font-black mt-3">Sesi Halaman Telah Diperbarui</h1>
                <p class="text-xs text-slate-500 mt-2 leading-relaxed">
                    Token keamanan sesi Anda telah diperbarui demi keamanan. Halaman akan otomatis beralih ke formulir login dalam <span id="countdown" class="font-black text-[#6c5857]">3</span> detik...
                </p>
            </div>
        </div>

        <div class="space-y-3 pt-2">
            <a href="{{ route('admin.login') }}" class="block w-full bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs py-3.5 rounded-2xl border border-[#ebd04f] shadow-md transition">
                Masuk Kembali ke CMS &rsaquo;
            </a>
            <a href="{{ route('home') }}" class="block text-xs font-bold text-slate-500 hover:text-[#6c5857]">
                &larr; Kembali ke Beranda Website
            </a>
        </div>
    </div>

    <script>
        let count = 3;
        const el = document.getElementById('countdown');
        const timer = setInterval(() => {
            count--;
            if (el) el.textContent = count;
            if (count <= 0) {
                clearInterval(timer);
                window.location.href = "{{ route('admin.login') }}";
            }
        }, 1000);
    </script>
</body>
</html>
