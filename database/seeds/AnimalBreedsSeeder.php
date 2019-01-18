<?php

use Illuminate\Database\Seeder;

class AnimalBreedsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_breed')->insert([
            'name' => 'Тигър',
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Лъв',
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Рис'
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Самбернар',
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Делматинец',
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Папагал'
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Щраус',
        ]);
        DB::table('animal_breed')->insert([
            'name' => 'Гъска',
        ]);
    }
}
