<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Voucher;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

/**
 * CRUD controller for promotional discount vouchers.
 */
class VoucherController extends Controller
{
    public function index(): View
    {
        $vouchers = Voucher::query()->orderByDesc('id')->get();

        return view('admin.vouchers.index', compact('vouchers'));
    }

    public function create(): View
    {
        return view('admin.vouchers.form', ['voucher' => new Voucher(['is_active' => true])]);
    }

    public function store(Request $request): RedirectResponse
    {
        Voucher::create($this->validatedData($request));

        return redirect()->route('admin.vouchers.index')->with('status', 'Kode voucher berhasil ditambahkan.');
    }

    public function edit(Voucher $voucher): View
    {
        return view('admin.vouchers.form', compact('voucher'));
    }

    public function update(Request $request, Voucher $voucher): RedirectResponse
    {
        $voucher->update($this->validatedData($request, $voucher->id));

        return redirect()->route('admin.vouchers.index')->with('status', 'Kode voucher berhasil diperbarui.');
    }

    public function destroy(Voucher $voucher): RedirectResponse
    {
        $voucher->delete();

        return redirect()->route('admin.vouchers.index')->with('status', 'Kode voucher berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request, ?int $ignoreId = null): array
    {
        $request->merge(['code' => strtoupper(trim((string) $request->input('code')))]);

        $validated = $request->validate([
            'code' => ['required', 'string', 'max:64', Rule::unique('vouchers', 'code')->ignore($ignoreId)],
            'discount_label' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string', 'max:255'],
            'expires_at' => ['nullable', 'date'],
        ]);

        return [
            'code' => $validated['code'],
            'discount_label' => $validated['discount_label'],
            'description' => $validated['description'] ?? null,
            'expires_at' => $validated['expires_at'] ?? null,
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
