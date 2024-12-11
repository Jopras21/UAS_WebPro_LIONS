<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Foto Pertemuan Perdana'],
            ['name' => 'Kegiatan Pendidikan'],
            ['name' => 'Acara Khusus'],
            // Tambahkan kategori lain sesuai kebutuhan
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}