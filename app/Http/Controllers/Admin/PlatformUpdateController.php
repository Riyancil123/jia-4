<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlatformUpdate;
use App\Support\CmsHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for platform release notes and updates.
 */
class PlatformUpdateController extends Controller
{
    public function index(): View
    {
        $updates = PlatformUpdate::query()->orderBy('sort_order')->orderByDesc('id')->get();

        return view('admin.updates.index', compact('updates'));
    }

    public function create(): View
    {
        return view('admin.updates.form', ['update' => new PlatformUpdate(['is_published' => true])]);
    }

    public function store(Request $request): RedirectResponse
    {
        PlatformUpdate::create($this->validatedData($request));

        return redirect()->route('admin.updates.index')->with('status', 'Catatan rilis berhasil ditambahkan.');
    }

    public function edit(PlatformUpdate $update): View
    {
        return view('admin.updates.form', compact('update'));
    }

    public function update(Request $request, PlatformUpdate $update): RedirectResponse
    {
        $update->update($this->validatedData($request));

        return redirect()->route('admin.updates.index')->with('status', 'Catatan rilis berhasil diperbarui.');
    }

    public function destroy(PlatformUpdate $update): RedirectResponse
    {
        $update->delete();

        return redirect()->route('admin.updates.index')->with('status', 'Catatan rilis berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'version_badge' => ['required', 'string', 'max:100'],
            'status_badge' => ['nullable', 'string', 'max:60'],
            'release_date_label' => ['required', 'string', 'max:80'],
            'title' => ['required', 'string', 'max:255'],
            'summary' => ['required', 'string'],
            'tags_text' => ['nullable', 'string'],
            'cta_label' => ['nullable', 'string', 'max:80'],
            'cta_view' => ['nullable', 'string', 'max:80'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'version_badge' => $validated['version_badge'],
            'status_badge' => $validated['status_badge'] ?? null,
            'release_date_label' => $validated['release_date_label'],
            'title' => $validated['title'],
            'summary' => $validated['summary'],
            'tags' => CmsHelper::parseLines($validated['tags_text'] ?? ''),
            'cta_label' => $validated['cta_label'] ?? null,
            'cta_view' => $validated['cta_view'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_published' => $request->boolean('is_published'),
        ];
    }
}
