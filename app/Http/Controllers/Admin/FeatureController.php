<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for supporting learning features shown on Materi Belajar.
 */
class FeatureController extends Controller
{
    public function index(): View
    {
        $features = Feature::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.features.index', compact('features'));
    }

    public function create(): View
    {
        return view('admin.features.form', ['feature' => new Feature(['is_active' => true, 'icon' => '✨'])]);
    }

    public function store(Request $request): RedirectResponse
    {
        Feature::create($this->validatedData($request));

        return redirect()->route('admin.features.index')->with('status', 'Fitur penunjang berhasil ditambahkan.');
    }

    public function edit(Feature $feature): View
    {
        return view('admin.features.form', compact('feature'));
    }

    public function update(Request $request, Feature $feature): RedirectResponse
    {
        $feature->update($this->validatedData($request));

        return redirect()->route('admin.features.index')->with('status', 'Fitur penunjang berhasil diperbarui.');
    }

    public function destroy(Feature $feature): RedirectResponse
    {
        $feature->delete();

        return redirect()->route('admin.features.index')->with('status', 'Fitur penunjang berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'icon' => ['required', 'string', 'max:20'],
            'title' => ['required', 'string', 'max:120'],
            'description' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'icon' => $validated['icon'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
