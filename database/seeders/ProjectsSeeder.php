<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for ($i = 0; $i < 30; $i++) {
            $startDate = $faker->dateTimeThisCentury->format('Y-m-d');
            $endDate = $faker->optional()->dateTimeThisCentury;

            $endDateFormatted = $endDate ? $endDate->format('Y-m-d') : null;

            Project::create([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph,
                'start_date' => $startDate,
                'end_date' => $endDateFormatted,
            ]);
    }
}
}
