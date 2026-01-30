<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\empresa;
class empresasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      empresa::factory(5)->create();
    }
}
