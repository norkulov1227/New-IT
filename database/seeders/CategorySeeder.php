<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Smartfon',
                'slug' => Str::slug('smartfon')
            ],
            [
                'name' => 'Notebook',
                'slug' => Str::slug('notebook')
            ],
            [
                'name' => 'Televizor',
                'slug' => Str::slug('televizor')
            ]
        ]);
    }
}
