<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\QuestionModule;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for HOTS Bank Soal practice modules.
 */
class QuestionModuleController extends Controller
{
    public function index(): View
    {
        $modules = QuestionModule::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.question-modules.index', compact('modules'));
    }

    public function create(): View
    {
        return view('admin.question-modules.form', [
            'module' => new QuestionModule(['is_active' => true, 'question_count' => 15, 'duration_minutes' => 25, 'hots_level' => '★ HOTS Level 2']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        QuestionModule::create($this->validatedData($request));

        return redirect()->route('admin.question-modules.index')->with('status', 'Modul Bank Soal berhasil ditambahkan.');
    }

    public function edit(QuestionModule $questionModule): View
    {
        return view('admin.question-modules.form', ['module' => $questionModule]);
    }

    public function update(Request $request, QuestionModule $questionModule): RedirectResponse
    {
        $questionModule->update($this->validatedData($request));

        return redirect()->route('admin.question-modules.index')->with('status', 'Modul Bank Soal berhasil diperbarui.');
    }

    public function destroy(QuestionModule $questionModule): RedirectResponse
    {
        $questionModule->delete();

        return redirect()->route('admin.question-modules.index')->with('status', 'Modul Bank Soal berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'category_badge' => ['required', 'string', 'max:100'],
            'hots_level' => ['required', 'string', 'max:60'],
            'title' => ['required', 'string', 'max:180'],
            'description' => ['required', 'string'],
            'question_count' => ['required', 'integer', 'min:1'],
            'duration_minutes' => ['required', 'integer', 'min:1'],
            'cta_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'category_badge' => $validated['category_badge'],
            'hots_level' => $validated['hots_level'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'question_count' => (int) $validated['question_count'],
            'duration_minutes' => (int) $validated['duration_minutes'],
            'cta_url' => $validated['cta_url'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
