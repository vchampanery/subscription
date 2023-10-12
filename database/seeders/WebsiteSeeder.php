<?php

namespace Database\Seeders;

use App\Models\Website;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $website = [['name' =>  'embark'],['name' =>  'Sysko'],['name' =>  'Tesla'],['name' =>  'google'],['name' =>  'facebook']];
        Website::insert($website);
    }
}
