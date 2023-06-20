<?php

namespace Database\Seeders;

use App\Models\Template;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'name' => 'High Top Sneaker',
                'image' => 'w2000_q80.jpg',
                'description' => 'Some description of the shoes.',
                'price' => 4500,
                'x' => 350,
                'y' => 427,
                'topx' => 348,
                'topy' => 376,
                'center' => 348,
                'bottomx' => 348,
                'bottomy' => 450
            ],
            // [
            //     'name' => 'Caliber Sneaker',
            //     'image' => 'caliber.jpg',
            //     'price' => 4000
            // ],
        ];

        foreach($templates as $template){
            Template::create($template);
        }
    }
}
