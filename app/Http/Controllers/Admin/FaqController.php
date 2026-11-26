<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for frequently asked questions across sections.
 */
class FaqController extends Controller
{
    public function index(Request $request): View
    {
        $section = $request->query('section');
        $faqs = Faq::query()
            ->when($section && array_key_exists($section, Faq::SECTIONS), fn ($q) => $q->where('section', $section))
            ->orderBy('section')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();

        return view('admin.faqs.index', compact('faqs', 'section'));
    }

    public function create(): View
    {
        return view('admin.faqs.form', ['faq' => new Faq(['is_active' => true, 'section' => 'adaptive-test'])]);
    }

    public function store(Request $request): RedirectResponse
    {
        Faq::create($this->validatedData($request));

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ berhasil ditambahkan.');
    }

    public function edit(Faq $faq): View
    {
        return view('admin.faqs.form', compact('faq'));
    }

    public function update(Request $request, Faq $faq): RedirectResponse
    {
        $faq->update($this->validatedData($request));

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ berhasil diperbarui.');
    }

    public function destroy(Faq $faq): RedirectResponse
    {
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('status', 'FAQ berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'section' => ['required', 'in:' . implode(',', array_keys(Faq::SECTIONS))],
            'question' => ['required', 'string', 'max:255'],
            'answer' => ['required', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'section' => $validated['section'],
            'question' => $validated['question'],
            'answer' => $validated['answer'],
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
