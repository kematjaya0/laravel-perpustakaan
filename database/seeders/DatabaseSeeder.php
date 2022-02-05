<?php

namespace Database\Seeders;

use App\Models\Penulis;
use App\Models\Buku;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Penulis::factory(10)->create()->each(function(Penulis $penulis) {
            $bukus = Buku::factory(rand(2, 6))->make();
            
            $penulis->bukus()->saveMany($bukus);
        });
        User::factory(5)->create();
    }
}
