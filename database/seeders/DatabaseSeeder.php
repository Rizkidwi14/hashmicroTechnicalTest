<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Author;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'password' => bcrypt('admin')
        ]);

        User::create([
            'username' => 'rizki',
            'password' => bcrypt('rizki')
        ]);

        Author::create([
            'Nama' => "J. R. R. Tolkien",
            'ulang_tahun' => '1892-01-03',
            'networth' => '2452000'
        ]);
        Author::create([
            'Nama' => "J. K. Rowling",
            'ulang_tahun' => '1965-07-31',
            'networth' => '820000000'
        ]);
        Author::create([
            'Nama' => "james Clear",
            'ulang_tahun' => '1986-01-22',
            'networth' => '8000000'
        ]);

        Buku::create([
            'judul' => 'Lord Of The Ring : Fellowship Of The Ring',
            'kategori' => "Fantasi",
            'terjual' => 150000000,
            'author_id' => "1"
        ]);
        Buku::create([
            'judul' => 'The Hobbits',
            'kategori' => "Fantasi",
            'terjual' => 100000000,
            'author_id' => "1"
        ]);
        Buku::create([
            'judul' => 'Harry Potter and the deathly hallows',
            'kategori' => "Fantasi",
            'terjual' => 65000000,
            'author_id' => "2"
        ]);
        Buku::create([
            'judul' => 'Atomic Habits',
            'kategori' => "lifestyle",
            'terjual' => 10000000,
            'author_id' => "3"
        ]);
    }
}
