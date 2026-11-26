@extends('admin.layouts.app')

@section('title', 'Subscriber Newsletter')
@section('page_title', 'Daftar Subscriber Newsletter')
@section('page_subtitle', 'Email siswa dan orang tua yang mendaftar melalui form newsletter blog.')

@section('header_actions')
    <a href="{{ route('admin.subscribers.export') }}" class="px-4 py-2 rounded-xl bg-[#ffde59] hover:bg-[#ebd04f] text-[#6c5857] font-black text-xs border border-[#ebd04f] shadow-sm">⬇ Ekspor CSV</a>
@endsection

@section('content')
    <div class="bg-white rounded-3xl border-2 border-[#e2cbf6] shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs">
                <thead class="bg-[#faf7fd] border-b border-[#e2cbf6]">
                    <tr>
                        <th class="p-4 font-black">#</th>
                        <th class="p-4 font-black">Alamat Email</th>
                        <th class="p-4 font-black">Tanggal Terdaftar</th>
                        <th class="p-4 font-black text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-[#e2cbf6]/50">
                    @forelse ($subscribers as $subscriber)
                        <tr class="hover:bg-[#faf7fd]/60">
                            <td class="p-4 text-slate-400 font-bold">{{ $subscriber->id }}</td>
                            <td class="p-4 font-black text-[#6c5857]">{{ $subscriber->email }}</td>
                            <td class="p-4 text-slate-500">{{ optional($subscriber->subscribed_at)->format('d M Y H:i') }}</td>
                            <td class="p-4 text-right">
                                <form method="POST" action="{{ route('admin.subscribers.destroy', $subscriber) }}" onsubmit="return confirm('Hapus subscriber ini?');" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="px-3 py-1.5 rounded-xl bg-rose-50 hover:bg-rose-100 border border-rose-200 text-xs font-black text-rose-700">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4" class="p-6 text-center text-slate-400">Belum ada subscriber yang terdaftar.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($subscribers->hasPages())
            <div class="p-4 border-t border-[#e2cbf6]">{{ $subscribers->links() }}</div>
        @endif
    </div>
@endsection
