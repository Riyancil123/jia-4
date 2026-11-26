<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Support\CmsHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for tutoring packages and school programs.
 */
class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::query()
            ->orderBy('category')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.programs.index', compact('programs'));
    }

    public function create(): View
    {
        return view('admin.programs.form', ['program' => new Program(['is_active' => true, 'icon' => '🎯'])]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = CmsHelper::uniqueSlug(Program::class, $data['title']);
        Program::create($data);

        return redirect()->route('admin.programs.index')->with('status', 'Program bimbingan berhasil ditambahkan.');
    }

    public function edit(Program $program): View
    {
        return view('admin.programs.form', compact('program'));
    }

    public function update(Request $request, Program $program): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = CmsHelper::uniqueSlug(Program::class, $data['title'], $program->id);
        $program->update($data);

        return redirect()->route('admin.programs.index')->with('status', 'Program bimbingan berhasil diperbarui.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        $program->delete();

        return redirect()->route('admin.programs.index')->with('status', 'Program bimbingan berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'category' => ['required', 'in:' . implode(',', array_keys(Program::CATEGORIES))],
            'badge_text' => ['nullable', 'string', 'max:80'],
            'icon' => ['required', 'string', 'max:20'],
            'duration_label' => ['nullable', 'string', 'max:80'],
            'price_label' => ['nullable', 'string', 'max:80'],
            'description' => ['required', 'string'],
            'features_text' => ['nullable', 'string'],
            'cta_label' => ['required', 'string', 'max:100'],
            'cta_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'title' => $validated['title'],
            'category' => $validated['category'],
            'badge_text' => $validated['badge_text'] ?? null,
            'icon' => $validated['icon'],
            'duration_label' => $validated['duration_label'] ?? null,
            'price_label' => $validated['price_label'] ?? null,
            'description' => $validated['description'],
            'features' => CmsHelper::parseLines($validated['features_text'] ?? ''),
            'cta_label' => $validated['cta_label'],
            'cta_url' => $validated['cta_url'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ];
    }
}
