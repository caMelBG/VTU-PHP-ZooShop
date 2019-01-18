<?php

use Illuminate\Database\Seeder;

class AnimalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('animal')->insert([
            'name' => 'Киро',
            'animal_type_id'=> 25,
            'animal_breed_id' => 2,
            'birth_date' => date('2015-02-22'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Пешо',
            'animal_type_id'=> 25,
            'animal_breed_id' => 3,
            'birth_date' => date('2014-04-11'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Том',
            'animal_type_id'=> 25   ,
            'animal_breed_id' => 4,
            'birth_date' => date('2011-02-13'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Шаро',
            'animal_type_id'=> 26,
            'animal_breed_id' => 5,
            'birth_date' => date('2015-02-22'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Бъкс',
            'animal_type_id'=> 26,
            'animal_breed_id' => 6,
            'birth_date' => date('2013-02-24'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Ларавел',
            'animal_type_id'=> 31,
            'animal_breed_id' => 7,
            'birth_date' => date('2011-12-26'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Симфони',
            'animal_type_id'=> 31,
            'animal_breed_id' => 8,
            'birth_date' => date('2015-02-12'),
            'created_at' => new DateTime,
        ]);
        DB::table('animal')->insert([
            'name' => 'Зенд',
            'animal_type_id'=> 31,
            'animal_breed_id' => 9,
            'birth_date' => date('2014-11-21'),
            'created_at' => new DateTime,
        ]);
    }
}
