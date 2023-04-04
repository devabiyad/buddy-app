<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::truncate();

        $categories = [
                [
                    'id' => 1,
                    'parent_id' => null,
                    'title' => 'Cloths',
                ],
                [
                    'id' => 2,
                    'parent_id' => 1,
                    'title' => 'Men',
                ],
                [
                    'id' => 3,
                    'parent_id' => 1,
                    'title' => 'Women',
                ],
                [
                    'id' => 4,
                    'parent_id' => 2,
                    'title' => 'Topwear',
                ],
                [
                    'id' => 5,
                    'parent_id' => 2,
                    'title' => 'Bottomwear',
                ],
                [
                    'id' => 6,
                    'parent_id' => 4,
                    'title' => 'Shirt',
                ],
                [
                    'id' => 7,
                    'parent_id' => 4,
                    'title' => 'Tshirt',
                ],
                [
                    'id' => 8,
                    'parent_id' => 5,
                    'title' => 'Jeans',
                ],
                [
                    'id' => 9,
                    'parent_id' => 5,
                    'title' => 'three quarters',
                ],
                [
                    'id' => 10,
                    'parent_id' => 3,
                    'title' => 'Festive',
                ],
                [
                    'id' => 11,
                    'parent_id' => 3,
                    'title' => 'Casual',
                ],
                [
                    'id' => 12,
                    'parent_id' => null,
                    'title' => 'Electronics',
                ],
                [
                    'id' => 13,
                    'parent_id' => 12,
                    'title' => 'Laptop',
                ],
                [
                    'id' => 14,
                    'parent_id' => 12,
                    'title' => 'Smartphone',
                ],
                [
                    'id' => 15,
                    'parent_id' => 14,
                    'title' => 'Android',
                ],
                [
                    'id' => 16,
                    'parent_id' => 14,
                    'title' => 'iOS',
                ],
                [
                    'id' => 17,
                    'parent_id' => 13,
                    'title' => 'Asus',
                ],
                [
                    'id' => 18,
                    'parent_id' => 13,
                    'title' => 'Hp',
                ],
            ];

        Category::insert($categories);
    }
}
