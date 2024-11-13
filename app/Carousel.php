<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carousel extends Model
{
    protected $dates = ['deleted_at'];
    protected $tables = 'carousels';
    protected $hidden = ['create_at', 'updated_at'];

}
