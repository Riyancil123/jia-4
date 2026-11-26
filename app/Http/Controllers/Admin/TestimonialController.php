<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for student and parent testimonials.
 */
class TestimonialController extends Controller
{
    public function index(): View
    {
        $testimonials = Testimonial::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create(): View
    {
        return view('admin.testimonials.form', ['testimonial' => new Testimonial(['is_active' => true, 'rating' => 5])]);
    }

    public function store(Request $request): RedirectResponse
    {
        Testimonial::create($this->validatedData($request));

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimoni berhasil ditambahkan.');
    }

    public function edit(Testimonial $testimonial): View
    {
        return view('admin.testimonials.form', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial): RedirectResponse
    {
        $testimonial->update($this->validatedData($request));

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimoni berhasil diperbarui.');
    }

    public function destroy(Testimonial $testimonial): RedirectResponse
    {
        $testimonial->delete();

        return redirect()->route('admin.testimonials.index')->with('status', 'Testimoni berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'role' => ['required', 'string', 'max:160'],
            'quote' => ['required', 'string'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'avatar_initial' => ['nullable', 'string', 'max:4'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        $initial = ! empty($validated['avatar_initial'])
            ? $validated['avatar_initial']
            : mb_strtoupper(mb_substr($validated['name'], 0, 1));

        return [
            'name' => $validated['name'],
            'role' => $validated['role'],
            'quote' => $validated['quote'],
            'rating' => (int) $validated['rating'],
            'avatar_initial' => $initial,
            'is_highlighted' => $request->boolean('is_highlighted'),
            'is_active' => $request->boolean('is_active'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ];
    }
}
