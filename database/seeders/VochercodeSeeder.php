<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vochercode;

class VochercodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat 10 data dummy untuk tabel vochercodes
        Vochercode::factory(10)->create();
    }
}
