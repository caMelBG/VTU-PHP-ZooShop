<?php

use Illuminate\Database\Seeder;

class AnimalTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal_type')->insert([
            'name' => 'Котка',
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Куче',
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Слон'
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Жираф',
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Камила',
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Пингвин'
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Патица',
        ]);
        DB::table('animal_type')->insert([
            'name' => 'Риба',
        ]);
    }
}
