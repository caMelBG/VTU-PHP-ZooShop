<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    const name = 'name';
    const animal_type_id = 'animal_type_id';
    const animal_breed_id = 'animal_breed_id';
    //const birth_date = 'birth_date';
}
