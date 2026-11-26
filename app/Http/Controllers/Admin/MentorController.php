<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Mentor;
use App\Support\CmsHelper;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for Rockstar Mentors and Teachers.
 */
class MentorController extends Controller
{
    public function index(): View
    {
        $mentors = Mentor::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.mentors.index', compact('mentors'));
    }

    public function create(): View
    {
        return view('admin.mentors.form', [
            'mentor' => new Mentor(['is_active' => true, 'show_on_materi' => true, 'avatar_emoji' => '👩‍🏫']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('photo_file')) {
            $data['photo'] = CmsHelper::storePublicImage($request->file('photo_file'), 'mentors');
        }

        Mentor::create($data);

        return redirect()->route('admin.mentors.index')->with('status', 'Data mentor berhasil ditambahkan.');
    }

    public function edit(Mentor $mentor): View
    {
        return view('admin.mentors.form', compact('mentor'));
    }

    public function update(Request $request, Mentor $mentor): RedirectResponse
    {
        $data = $this->validatedData($request);
        if ($request->hasFile('photo_file')) {
            $data['photo'] = CmsHelper::storePublicImage($request->file('photo_file'), 'mentors');
        } elseif ($data['photo'] === null) {
            $data['photo'] = $mentor->photo;
        }

        $mentor->update($data);

        return redirect()->route('admin.mentors.index')->with('status', 'Data mentor berhasil diperbarui.');
    }

    public function destroy(Mentor $mentor): RedirectResponse
    {
        $mentor->delete();

        return redirect()->route('admin.mentors.index')->with('status', 'Data mentor berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'subject' => ['required', 'string', 'max:150'],
            'campus' => ['required', 'string', 'max:150'],
            'avatar_emoji' => ['required', 'string', 'max:20'],
            'photo' => ['nullable', 'string', 'max:255'],
            'photo_file' => ['nullable', 'image', 'max:2048'],
            'quote' => ['nullable', 'string'],
            'achievements_text' => ['nullable', 'string'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'name' => $validated['name'],
            'subject' => $validated['subject'],
            'campus' => $validated['campus'],
            'avatar_emoji' => $validated['avatar_emoji'],
            'photo' => $validated['photo'] ?? null,
            'quote' => $validated['quote'] ?? null,
            'achievements' => CmsHelper::parseLines($validated['achievements_text'] ?? ''),
            'show_on_beranda' => $request->boolean('show_on_beranda'),
            'show_on_materi' => $request->boolean('show_on_materi'),
            'show_on_blog' => $request->boolean('show_on_blog'),
            'is_featured' => $request->boolean('is_featured'),
            'is_active' => $request->boolean('is_active'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ];
    }
}
