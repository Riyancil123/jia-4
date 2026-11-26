@extends('admin.layouts.app')

@section('title', 'Pengaturan & Promo')
@section('page_title', 'Pengaturan Global & Promo Website')
@section('page_subtitle', 'Ubah teks hero beranda, statistik, promo topbar, kontak WhatsApp, serta identitas perusahaan.')

@section('content')
    <form method="POST" action="{{ route('admin.settings.update') }}" class="space-y-6">
        @csrf
        @method('PUT')

        @foreach ($groupLabels as $groupKey => $groupTitle)
            @php $items = $groupedSettings->get($groupKey, collect()); @endphp
            @if ($items->isNotEmpty())
                <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] p-6 shadow-sm space-y-4">
                    <h2 class="font-black text-sm text-[#6c5857] border-b border-slate-100 pb-3">{{ $groupTitle }}</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach ($items as $setting)
                            <div class="{{ $setting->type === 'textarea' ? 'md:col-span-2' : '' }}">
                                @if ($setting->type === 'boolean')
                                    <label class="flex items-center gap-3 p-3.5 rounded-2xl bg-[#faf7fd] border border-[#e2cbf6] cursor-pointer">
                                        <input type="checkbox" name="settings[{{ $setting->key }}]" value="1" {{ $setting->value === '1' ? 'checked' : '' }} class="w-4 h-4 accent-[#6c5857]">
                                        <span class="text-xs font-extrabold text-[#6c5857]">{{ $setting->label }}</span>
                                    </label>
                                @elseif ($setting->type === 'textarea')
                                    <label class="block text-xs font-extrabold text-[#6c5857] mb-1.5">{{ $setting->label }}</label>
                                    <textarea name="settings[{{ $setting->key }}]" rows="3" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs font-medium">{{ old('settings.' . $setting->key, $setting->value) }}</textarea>
                                @else
                                    <label class="block text-xs font-extrabold text-[#6c5857] mb-1.5">{{ $setting->label }}</label>
                                    <input type="{{ $setting->type === 'url' ? 'url' : 'text' }}" name="settings[{{ $setting->key }}]" value="{{ old('settings.' . $setting->key, $setting->value) }}" class="w-full px-4 py-2.5 rounded-2xl bg-[#faf7fd] border-2 border-[#e2cbf6] focus:border-[#ffde59] outline-none text-xs font-medium">
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        @endforeach

        <div class="flex justify-end">
            <button type="submit" class="px-6 py-3 rounded-2xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-md transition">
                Simpan Semua Pengaturan
            </button>
        </div>
    </form>
@endsection
