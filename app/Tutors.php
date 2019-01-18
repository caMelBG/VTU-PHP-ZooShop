<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tutors extends Model
{
    protected $fillable = ['title'];

    public $timestamps = false;
}
