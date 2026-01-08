<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $brands = [
            [
                'name' => 'Apple',
                'slug' => 'apple',
                'logo' => 'https://www.logo.wine/a/logo/Apple_Inc./Apple_Inc.-Logo.wine.svg',
                'description' => 'شركة أبل هي شركة تكنولوجيا أمريكية متعددة الجنسيات معروفة بمنتجات آيفون وآيباد وماك.',
                'is_active' => true,
            ],
            [
                'name' => 'Samsung',
                'slug' => 'samsung',
                'logo' => 'https://www.logo.wine/a/logo/Samsung/Samsung-Logo.wine.svg',
                'description' => 'سامسونج للإلكترونيات هي شركة كورية جنوبية متعددة الجنسيات، وأحد أكبر مصنعي الهواتف الذكية في العالم.',
                'is_active' => true,
            ],
            [
                'name' => 'Xiaomi',
                'slug' => 'xiaomi',
                'logo' => 'https://www.logo.wine/a/logo/Xiaomi/Xiaomi-Logo.wine.svg',
                'description' => 'شاومي هي شركة إلكترونيات صينية معروفة بهواتفها الذكية عالية الجودة وبأسعار معقولة.',
                'is_active' => true,
            ],
            [
                'name' => 'OnePlus',
                'slug' => 'oneplus',
                'logo' => 'https://www.logo.wine/a/logo/OnePlus/OnePlus-Logo.wine.svg',
                'description' => 'ون بلس هي شركة صينية لتصنيع الهواتف الذكية معروفة بهواتفها الرائدة بأسعار تنافسية.',
                'is_active' => true,
            ],
            [
                'name' => 'Google',
                'slug' => 'google',
                'logo' => 'https://www.logo.wine/a/logo/Google/Google-Logo.wine.svg',
                'description' => 'هواتف جوجل بيكسل تقدم أنقى تجربة أندرويد مع إمكانيات كاميرا استثنائية.',
                'is_active' => true,
            ],
            [
                'name' => 'Huawei',
                'slug' => 'huawei',
                'logo' => 'https://www.logo.wine/a/logo/Huawei/Huawei-Logo.wine.svg',
                'description' => 'هواوي هي شركة تكنولوجيا صينية متعددة الجنسيات معروفة بكاميرات الهواتف الذكية المبتكرة.',
                'is_active' => true,
            ],
            [
                'name' => 'OPPO',
                'slug' => 'oppo',
                'logo' => 'https://www.logo.wine/a/logo/Oppo/Oppo-Logo.wine.svg',
                'description' => 'أوبو هي شركة صينية لتصنيع الإلكترونيات الاستهلاكية متخصصة في الهواتف الذكية.',
                'is_active' => true,
            ],
            [
                'name' => 'Realme',
                'slug' => 'realme',
                'logo' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTyfGrg-1z3tJ-I_GCdxYELrK3Ch7pWjX1Nxw&s',
                'description' => 'ريلمي هي شركة صينية لتصنيع الهواتف الذكية تقدم هواتف غنية بالمزايا بأسعار معقولة.',
                'is_active' => true,
            ],
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}