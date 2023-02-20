<?php

namespace Database\Seeders;

use App\Models\City;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        foreach($this->getCities() as $city) {
            City::updateOrCreate([
               'name' => $city 
            ]);
        }
    }

    private function getCities(): array
    {
        return [
            'London',
            'Paris',
            'Cardiff',
            'New York'
        ];
    }
}
