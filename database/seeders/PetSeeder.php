<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'shelterID' => 3,
                'animalType' => 'Dog',
                'age' => 'Young',
                'breed' => 'Chihuahua',
                'color' => 'White',
                'description' => 'Pudidi dog',
                'gender' => 'Male',
                'image' => 'dog1_0.jpg',
                'name' => 'Pudidi',
                'size' => 'Small',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Female',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Old',
                'breed' => 'Gatau',
                'color' => 'Grey',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat2_0.jpg',
                'name' => 'Aliux',
                'size' => 'Large',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Old',
                'breed' => 'Gatau',
                'color' => 'Orange',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat3_0.jpg',
                'name' => 'RLGamer',
                'size' => 'Large',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Gatau',
                'color' => 'Orange',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat4_0.jpg',
                'name' => 'Sukamto',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Dog',
                'age' => 'Young',
                'breed' => 'Pitbull',
                'color' => 'Brown',
                'description' => 'dogdogdogdogdogdog',
                'gender' => 'Male',
                'image' => 'dog3_0.jpg',
                'name' => 'John Doe',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Dog',
                'age' => 'Young',
                'breed' => 'Pom',
                'color' => 'Orange',
                'description' => 'dogdogdogdogdogdog',
                'gender' => 'Male',
                'image' => 'dog4_0.jpg',
                'name' => 'Azizi',
                'size' => 'Medium',
                'isAdopted' => false
            ],
        ];

        DB::table('pets')->insert($data);
    }
}
