<?php

namespace Database\Seeders;

use App\Models\News\NewsType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NewsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NewsType::create([
            'name' => 'Berita Balai',
            'slug' => 'berita-balai',
        ]);
        NewsType::create([
            'name' => 'Berita SDA',
            'slug' => 'berita-sda',
        ]);
    }
}
