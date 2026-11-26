<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Masuk CMS Admin — Jia Learning</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <style>body { font-family: 'Plus Jakarta Sans', sans-serif; }</style>
</head>
<body class="min-h-screen bg-gradient-to-br from-[#e2cbf6] via-[#faf7fd] to-white flex items-center justify-center p-4 text-[#6c5857]">

    <div class="w-full max-w-md bg-white rounded-[2.5rem] border-2 border-[#e2cbf6] shadow-2xl p-8 sm:p-10 space-y-6">
        <div class="text-center space-y-3">
            <div class="inline-flex bg-[#faf7fd] p-3 rounded-2xl border border-[#e2cbf6] shadow-sm">
                <img src="{{ asset('images/logo_hd.png') }}" alt="Jia Learning" class="h-14 w-auto object-contain">
            </div>
            <div>
                <span class="bg-[#ffde59] text-[#6c5857] text-[10px] font-black uppercase px-3 py-1 rounded-full border border-[#ebd04f]">Jia Learning CMS</span>
                <h1 class="text-2xl font-black mt-2">Masuk Panel Pengelola</h1>
                <p class="text-xs text-slate-500 mt-1">Kelola paket belajar, artikel blog, mentor, materi, soal, dan promo website.</p>
            </div>
        </div>

        @if (session('status'))
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-2.5 rounded-2xl text-xs font-bold">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="bg-rose-50 border border-rose-200 text-rose-700 px-4 py-2.5 rounded-2xl text-xs font-bold">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.login.submit') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-xs font-extrabold mb-1.5">Email Admin</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       placeholder="admin@jialearning.app"
                       class="w-full px-4 py-3 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs font-semibold">
            </div>

            <div>
                <label for="password" class="block text-xs font-extrabold mb-1.5">Kata Sandi</label>
                <input id="password" type="password" name="password" required
                       placeholder="••••••••"
                       class="w-full px-4 py-3 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs font-semibold">
            </div>

            <label class="flex items-center gap-2 text-xs font-semibold text-slate-600 cursor-pointer">
                <input type="checkbox" name="remember" class="rounded border-[#e2cbf6]">
                <span>Ingat sesi masuk saya</span>
            </label>

            <button type="submit" class="w-full bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs py-3.5 rounded-2xl border border-[#ebd04f] shadow-md transition">
                Masuk ke CMS &rsaquo;
            </button>
        </form>

        <div class="pt-4 border-t border-slate-100 text-center">
            <a href="{{ route('home') }}" class="text-xs font-bold text-slate-500 hover:text-[#6c5857]">
                &larr; Kembali ke Website Utama
            </a>
        </div>
    </div>

</body>
</html>
