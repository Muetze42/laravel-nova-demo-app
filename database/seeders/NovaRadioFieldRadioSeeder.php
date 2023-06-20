<?php

namespace Database\Seeders;

use App\Models\NovaRadioFieldRadio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NovaRadioFieldRadioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            NovaRadioFieldRadio::create([
                'select' => 'L',
                'select2' => 'L',
                'select3' => 'M',
            ]);
        }
    }
}
