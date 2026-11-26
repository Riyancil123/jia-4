<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 * Manages global website settings including hero copy, promo topbar, and contact info.
 */
class SiteSettingController extends Controller
{
    public const GROUP_LABELS = [
        'hero' => 'Hero & Statistik Beranda',
        'promo' => 'Promo Topbar & Banner Paket',
        'contact' => 'Kontak, WhatsApp & Tautan App',
        'general' => 'Identitas Lembaga & Footer',
    ];

    public function edit(): View
    {
        $groupedSettings = SiteSetting::query()
            ->orderBy('id')
            ->get()
            ->groupBy('group');

        return view('admin.settings.edit', [
            'groupedSettings' => $groupedSettings,
            'groupLabels' => self::GROUP_LABELS,
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $submitted = $request->input('settings', []);

        foreach ($submitted as $key => $val) {
            $setting = SiteSetting::where('key', $key)->first();
            if ($setting) {
                if ($setting->type === 'boolean') {
                    $setting->value = $request->boolean('settings.' . $key) ? '1' : '0';
                } else {
                    $setting->value = (string) $val;
                }
                $setting->save();
            } else {
                SiteSetting::create([
                    'key' => $key,
                    'group' => 'general',
                    'label' => ucwords(str_replace('_', ' ', $key)),
                    'type' => 'text',
                    'value' => (string) $val,
                ]);
            }
        }

        return redirect()
            ->route('admin.settings.edit')
            ->with('status', 'Pengaturan website berhasil diperbarui.');
    }
}
