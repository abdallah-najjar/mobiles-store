<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingsController extends Controller
{
    public function index(): View
    {
        $settings = Setting::pluck('value', 'key')->toArray();

        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_description' => 'nullable|string|max:500',
            'site_keywords' => 'nullable|string|max:500',
            'site_location' => 'nullable|string|max:255',
            'site_phone' => 'nullable|string|max:50',
            'site_email' => 'nullable|email|max:255',
            'site_address' => 'nullable|string|max:500',
            'site_whatsapp' => 'nullable|string|max:50',
            'site_facebook' => 'nullable|url|max:255',
            'site_instagram' => 'nullable|url|max:255',
            'site_twitter' => 'nullable|url|max:255',
            'site_youtube' => 'nullable|url|max:255',
            'site_meta_title' => 'nullable|string|max:255',
            'site_meta_description' => 'nullable|string|max:500',
            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'site_favicon' => 'nullable|image|mimes:ico,png,jpg|max:512',
            'site_footer_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageFields = ['site_logo', 'site_favicon', 'site_footer_logo'];

        foreach ($imageFields as $field) {
            if ($request->hasFile($field)) {
                $oldSetting = Setting::where('key', $field)->first();
                if ($oldSetting && $oldSetting->value) {
                    Storage::disk('public')->delete($oldSetting->value);
                }

                $path = $request->file($field)->store('settings', 'public');
                $validated[$field] = $path;
            } else {
                unset($validated[$field]);
            }
        }

        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'type' => $this->getSettingType($key)]
            );
        }

        return redirect()
            ->route('admin.settings.index')
            ->with('success', 'تم حفظ الإعدادات بنجاح');
    }

    private function getSettingType(string $key): string
    {
        if (str_contains($key, 'logo') || str_contains($key, 'favicon')) {
            return 'image';
        }

        if (str_contains($key, 'facebook') || str_contains($key, 'instagram') ||
            str_contains($key, 'twitter') || str_contains($key, 'youtube')) {
            return 'url';
        }

        return 'text';
    }
}
