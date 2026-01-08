<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['key' => 'site_name', 'value' => 'موبايلات المواصي', 'type' => 'text'],
            ['key' => 'site_description', 'value' => 'وجهتك الموثوقة لأحدث الهواتف الذكية وملحقاتها في غزة', 'type' => 'text'],
            ['key' => 'site_keywords', 'value' => 'موبايلات, هواتف ذكية, غزة, فلسطين, المواصي', 'type' => 'text'],
            ['key' => 'site_location', 'value' => 'غزة، فلسطين', 'type' => 'text'],

            ['key' => 'site_phone', 'value' => '059-123-4567', 'type' => 'text'],
            ['key' => 'site_email', 'value' => 'info@beach-mobiles.ps', 'type' => 'text'],
            ['key' => 'site_address', 'value' => 'كافتيريا كرزة ،مواصي خانيونس ، قطاع غزة', 'type' => 'text'],
            ['key' => 'site_whatsapp', 'value' => '970599123456', 'type' => 'text'],

            ['key' => 'site_facebook', 'value' => '', 'type' => 'url'],
            ['key' => 'site_instagram', 'value' => '', 'type' => 'url'],
            ['key' => 'site_twitter', 'value' => '', 'type' => 'url'],
            ['key' => 'site_youtube', 'value' => '', 'type' => 'url'],

            ['key' => 'site_logo', 'value' => '', 'type' => 'image'],
            ['key' => 'site_favicon', 'value' => '', 'type' => 'image'],
            ['key' => 'site_footer_logo', 'value' => '', 'type' => 'image'],

            ['key' => 'site_meta_title', 'value' => 'موبايلات المواصي - غزة', 'type' => 'text'],
            ['key' => 'site_meta_description', 'value' => 'موبايلات المواصي - وجهتك الموثوقة لأحدث الهواتف الذكية وملحقاتها في غزة', 'type' => 'text'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                [
                    'value' => $setting['value'],
                    'type' => $setting['type']
                ]
            );
        }
    }
}