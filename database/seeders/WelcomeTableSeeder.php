<?php

namespace Database\Seeders;

use App\Models\welcome;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WelcomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        welcome::create([
            'name' => 'Yummy',
            'logo_path' => 'Images/menu-item-1.png',
            'main_path' => 'Images/menu-item-1.png',
            'hight_light'=>'Enjoy Your Healthy
            Delicious Food.',
            'description'=>'Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum quaerat. .'
        ]);
    }
}
