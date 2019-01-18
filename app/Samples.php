<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Samples extends Model
{
    protected $fillable = ['sampleName','sampleDescription','subject_id'];
}
