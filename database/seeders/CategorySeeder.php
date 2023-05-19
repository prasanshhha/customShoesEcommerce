<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Nikes',
                'description' => 'High copy'
            ],
            [
                'name' => 'Adidas',
                'description' => 'Low copy'
            ],
            [
                'name' => 'Sneakers',
                'description' => 'High top'
            ]
        ];

        foreach($categories as $category){
            Category::create($category);
        }
    }
}
