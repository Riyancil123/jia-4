<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LearningMaterial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for subject concept learning materials.
 */
class LearningMaterialController extends Controller
{
    public function index(): View
    {
        $materials = LearningMaterial::query()
            ->orderBy('subject')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.materials.index', compact('materials'));
    }

    public function create(): View
    {
        return view('admin.materials.form', [
            'material' => new LearningMaterial(['is_active' => true, 'video_count' => 4, 'quiz_count' => 12]),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        LearningMaterial::create($this->validatedData($request));

        return redirect()->route('admin.materials.index')->with('status', 'Materi belajar berhasil ditambahkan.');
    }

    public function edit(LearningMaterial $material): View
    {
        return view('admin.materials.form', compact('material'));
    }

    public function update(Request $request, LearningMaterial $material): RedirectResponse
    {
        $material->update($this->validatedData($request));

        return redirect()->route('admin.materials.index')->with('status', 'Materi belajar berhasil diperbarui.');
    }

    public function destroy(LearningMaterial $material): RedirectResponse
    {
        $material->delete();

        return redirect()->route('admin.materials.index')->with('status', 'Materi belajar berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'subject' => ['required', 'in:' . implode(',', array_keys(LearningMaterial::SUBJECTS))],
            'level_tag' => ['required', 'in:' . implode(',', array_keys(LearningMaterial::LEVELS))],
            'badge' => ['required', 'string', 'max:100'],
            'title' => ['required', 'string', 'max:180'],
            'description' => ['required', 'string'],
            'video_count' => ['nullable', 'integer', 'min:0'],
            'quiz_count' => ['nullable', 'integer', 'min:0'],
            'difficulty_label' => ['nullable', 'string', 'max:100'],
            'cta_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'subject' => $validated['subject'],
            'level_tag' => $validated['level_tag'],
            'badge' => $validated['badge'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'video_count' => (int) ($validated['video_count'] ?? 0),
            'quiz_count' => (int) ($validated['quiz_count'] ?? 0),
            'difficulty_label' => $validated['difficulty_label'] ?? null,
            'cta_url' => $validated['cta_url'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
