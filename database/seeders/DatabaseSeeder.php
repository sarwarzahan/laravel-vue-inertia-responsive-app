<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Graphics'],
            ['name' => 'Fonts'],
            ['name' => 'Templates'],
            ['name' => 'Add-ons'],
            ['name' => 'Photos'],
            ['name' => 'Web Themes'],
            ['name' => '3D'],
        ];
        DB::table('shop_categories')->insert($data);
        
        $data = [
            ['category' => 'perspective-quality', 'option' => 'Global Trend'],
            ['category' => 'perspective-quality', 'option' => 'National Mandate'],
            ['category' => 'perspective-quality', 'option' => 'Industry Trend'],
            ['category' => 'perspective-quality', 'option' => 'Organizational Strategy'],
            ['category' => 'perspective-quality', 'option' => 'Operational Strategy'],
            ['category' => 'perspective-quality', 'option' => 'Personal Philosophy'],
            ['category' => 'seller-experience', 'option' => 'Very Positive'],
            ['category' => 'seller-experience', 'option' => 'Positive'],
            ['category' => 'seller-experience', 'option' => 'Neutral'],
            ['category' => 'seller-experience', 'option' => 'Negative'],
            ['category' => 'business-marketing', 'option' => 'Expert'],
            ['category' => 'business-marketing', 'option' => 'Novice'],
            ['category' => 'business-marketing', 'option' => 'No Experience'],
        ];
        DB::table('application_answer_options')->insert($data);
    }
}
