<?php

namespace Database\Seeders;

use App\Models\NormanHuthFontAwesomeField;
use Illuminate\Database\Seeder;

class NormanHuthFontAwesomeFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NormanHuthFontAwesomeField::writable()->create(['icon' => 'fa-brands fa-laravel']);
    }
}
