<?php

namespace Database\Seeders;

use App\Models\contactus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactUsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        contactus::create([
            'email' => 'example@gmail.com',
            'link' => 'https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d6973.598007474957!2d31.090370999999998!3d29.082083875!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1704893541604!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade',
            'number' => '+201110562097',
            'opening_hour'=>'All Days From 8 PM TO 1AM',
            'instgram' => '#',
            'facebook' => '#',
            'address' => 'Cairo',
        ]);
    }
}