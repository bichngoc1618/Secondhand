<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Tạo danh mục mẫu
        $categories = [
            ['name' => 'Recycled Plastics', 'images' => 'home2.jpg', 'describe' => 'Products made from 100% recycled plastics.'],
            ['name' => 'Eco Friendly Paper', 'images' => 'home3.jpg', 'describe' => 'Sustainable paper products.'],
            ['name' => 'Organic Fabric', 'images' => 'home4.jpg', 'describe' => 'Clothes made from natural organic fabrics.'],
            ['name' => 'Green Electronics', 'images' => 'home8.jpg', 'describe' => 'Refurbished electronics for a green earth.'],
        ];

        foreach ($categories as $cat) {
            \Illuminate\Support\Facades\DB::table('categories')->insert($cat);
        }

        // Mảng các ảnh mẫu xịn xò vừa tạo
        $productImages = [
            'eco_fabric_1786297771754.png',
            'eco_paper_1786297759960.png',
            'eco_plastic_1786297749888.png',
            'eco_tech_1786297782884.png'
        ];

        // Tạo sản phẩm mẫu
        for ($i = 1; $i <= 8; $i++) {
            \Illuminate\Support\Facades\DB::table('product')->insert([
                'categories_id' => rand(1, 4),
                'price' => rand(10, 100),
                'title' => 'Eco Product ' . $i,
                'thumbnail' => $productImages[array_rand($productImages)], // Chọn ảnh ngẫu nhiên
                'description' => 'This is an amazing eco-friendly product that helps save the earth.',
                'status' => 'Popular', // Chữ Popular để nó hiện lên trang chủ
                'sale' => rand(0, 50), // Có lúc giảm giá có lúc không
            ]);
        }
    }
}
