<?php

use App\Car;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Car::truncate();
        $cars = [
            [
                'manufacturer' => 'BMW',
                'model' => 'Isetta',
                'year' => '1955',
                'country' => 'Germany', // password
            ],
            [
                'manufacturer' => 'Kia',
                'model' => 'Picanto',
                'year' => '2004',
                'country' => 'South Korea', // password
            ]
        ];
        foreach ($cars as $car) {
            Car::create($car);
        }
    }
}
