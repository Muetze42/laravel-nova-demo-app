<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->seed(UserSeeder::class);
        $files = glob(database_path('seeders/*.php'));
        $files = array_map(function ($item) {
            return pathinfo($item, PATHINFO_FILENAME);
        }, $files);

        foreach ($files as $file) {
            if (in_array($file, ['DatabaseSeeder', 'UserSeeder'])) {
                continue;
            }
            $this->seed(__NAMESPACE__.'\\'.$file);
        }
    }

    /**
     * Run Seeder if not already runs.
     *
     * @param mixed $class
     * @return void
     */
    protected function seed(mixed $class): void
    {
        if (!\App\Models\Seeder::where('seeder', $class)->exists()) {
            $this->call($class);
            DB::table('seeders')->insert([
                'seeder' => $class,
            ]);
        }
    }
}
