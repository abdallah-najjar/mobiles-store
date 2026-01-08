<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'name' => 'هواتف رائدة',
                'slug' => 'flagship',
                'description' => 'هواتف ذكية متميزة بأحدث التقنيات وأفضل الكاميرات وأداء من الطراز الأول.',
                'image' => 'https://images.unsplash.com/photo-1592899677977-9c10ca588bbd?w=400',
                'sort_order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'الفئة المتوسطة',
                'slug' => 'mid-range',
                'description' => 'هواتف ذكية بقيمة ممتازة مع مزايا متوازنة وأداء للاستخدام اليومي.',
                'image' => 'https://images.unsplash.com/photo-1598327105666-5b89351aff97?w=400',
                'sort_order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'هواتف اقتصادية',
                'slug' => 'budget',
                'description' => 'هواتف ذكية بأسعار معقولة توفر المزايا الأساسية دون إرهاق الميزانية.',
                'image' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?w=400',
                'sort_order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'هواتف الألعاب',
                'slug' => 'gaming',
                'description' => 'هواتف ذكية عالية الأداء مصممة خصيصاً لعشاق ألعاب الموبايل.',
                'image' => 'https://images.unsplash.com/photo-1612287230202-1ff1d85d1bdf?w=400',
                'sort_order' => 4,
                'is_active' => true,
            ],
            [
                'name' => 'هواتف الكاميرا',
                'slug' => 'camera-phones',
                'description' => 'هواتف ذكية بأنظمة كاميرا استثنائية لعشاق التصوير.',
                'image' => 'https://images.unsplash.com/photo-1585060544812-6b45742d762f?w=400',
                'sort_order' => 5,
                'is_active' => true,
            ],
            [
                'name' => 'هواتف قابلة للطي',
                'slug' => 'foldable',
                'description' => 'هواتف ذكية قابلة للطي ثورية تقدم تصاميم وتجارب فريدة.',
                'image' => 'https://images.unsplash.com/photo-1610945415295-d9bbf067e59c?w=400',
                'sort_order' => 6,
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
