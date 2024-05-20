<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Book;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            "title" => "Tutorial PHP & MySQL untuk pemula",
            "issued" => "2007-09-23",
            "author" => "Jalar Mardika",
            "publisher" => "PT. Karya Media Infotama"
        ]);
        Book::create([
            "title" => "Tutorial PHP & MySQL lanjutan",
            "issued" => "2008-03-14",
            "author" => "Mahardika",
            "publisher" => "CV. Media Karya"
        ]);
        Book::create([
            "title" => "Framework Laravel",
            "issued" => "2010-05-20",
            "author" => "Dika Pratama",
            "publisher" => "PT. Karya Media Infotama"
        ]);
    }
}
