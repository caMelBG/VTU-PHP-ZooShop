<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
    protected $table = 'animal';
    const name = 'name';
    const animal_type_id = 'animal_type_id';
    const animal_breed_id = 'animal_breed_id';
    const image_id = 'image_id';
    const birth_date = 'birth_date';

    public function image(){
        return $this->belongsTo('App\Images','image_id');
    }
    public function type(){
        return $this->belongsTo('App\AnimalType','animal_type_id');
    }
    public function breed(){
        return $this->belongsTo('App\AnimalBreed','animal_breed_id');
    }
}
