<?php

namespace Database\Seeders;

use App\Models\Partecipation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PartecipationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Partecipation::factory(10)->create();
    }
}
