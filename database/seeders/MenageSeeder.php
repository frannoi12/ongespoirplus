<?php

namespace Database\Seeders;

use App\Models\Menage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $menages = Menage::factory()->count(30)->create();
    }
}
