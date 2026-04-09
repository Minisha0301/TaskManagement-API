<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FrequencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(['Daily','Weekly','Monthly'] as $frequency) {
         DB::table('frequency_types')->insert([
            'name' => $frequency
         ]);
        }
        
    }
}
