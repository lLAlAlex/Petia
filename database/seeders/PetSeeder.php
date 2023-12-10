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
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
            [
                'shelterID' => 3,
                'animalType' => 'Cat',
                'age' => 'Young',
                'breed' => 'Calico',
                'color' => 'Brown',
                'description' => 'testststestestse',
                'gender' => 'Male',
                'image' => 'cat1_0.jpg',
                'name' => 'Kocheng',
                'size' => 'Medium',
                'isAdopted' => false
            ],
        ];

        DB::table('pets')->insert($data);
    }
}
