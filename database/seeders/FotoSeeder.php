<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Str, DB;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('foto')->insert([
            'nama' =>   Str::random(10),
            'url' =>   Str::random(10),
        ]);
    }
}
