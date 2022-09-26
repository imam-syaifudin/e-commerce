<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use HasFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Product::factory(100)->create();

        DB::table('users')->insert([
            "name" => "Admin",
            "email" => "admin@gmail.com",
            "role" => 'admin',
            "password" => bcrypt("12345")
        ]);
        DB::table('kategoris')->insert([
            "name" => "4x4",
            "slug" => "kategori-4x4"
        ]);
        DB::table('kategoris')->insert([
            "name" => "pyramincs",
            "slug" => "kategori-pyramincs"
        ]);
        DB::table('kategoris')->insert([
            "name" => "mirror",
            "slug" => "kategori-mirror"
        ]);
    }
}
