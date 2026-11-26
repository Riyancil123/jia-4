<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LiveClass;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * CRUD controller for weekly Live Zoom schedules.
 */
class LiveClassController extends Controller
{
    public function index(): View
    {
        $liveClasses = LiveClass::query()->orderBy('sort_order')->orderBy('id')->get();

        return view('admin.live-classes.index', compact('liveClasses'));
    }

    public function create(): View
    {
        return view('admin.live-classes.form', [
            'liveClass' => new LiveClass(['is_active' => true, 'badge_color' => 'rose', 'cta_label' => 'Gabung Sesi']),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        LiveClass::create($this->validatedData($request));

        return redirect()->route('admin.live-classes.index')->with('status', 'Jadwal Live Class berhasil ditambahkan.');
    }

    public function edit(LiveClass $liveClass): View
    {
        return view('admin.live-classes.form', compact('liveClass'));
    }

    public function update(Request $request, LiveClass $liveClass): RedirectResponse
    {
        $liveClass->update($this->validatedData($request));

        return redirect()->route('admin.live-classes.index')->with('status', 'Jadwal Live Class berhasil diperbarui.');
    }

    public function destroy(LiveClass $liveClass): RedirectResponse
    {
        $liveClass->delete();

        return redirect()->route('admin.live-classes.index')->with('status', 'Jadwal Live Class berhasil dihapus.');
    }

    /**
     * @return array<string, mixed>
     */
    private function validatedData(Request $request): array
    {
        $validated = $request->validate([
            'day_badge' => ['required', 'string', 'max:60'],
            'badge_color' => ['required', 'in:' . implode(',', array_keys(LiveClass::BADGE_COLORS))],
            'time_label' => ['required', 'string', 'max:60'],
            'title' => ['required', 'string', 'max:180'],
            'mentor_name' => ['required', 'string', 'max:120'],
            'quota_label' => ['required', 'string', 'max:80'],
            'cta_label' => ['required', 'string', 'max:80'],
            'cta_url' => ['nullable', 'url', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
        ]);

        return [
            'day_badge' => $validated['day_badge'],
            'badge_color' => $validated['badge_color'],
            'time_label' => $validated['time_label'],
            'title' => $validated['title'],
            'mentor_name' => $validated['mentor_name'],
            'quota_label' => $validated['quota_label'],
            'cta_label' => $validated['cta_label'],
            'cta_url' => $validated['cta_url'] ?? null,
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
            'is_active' => $request->boolean('is_active'),
        ];
    }
}
