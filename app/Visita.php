<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visita extends Model
{
    protected $dates = ['deleted_at'];
    protected $tables = 'visitas';
    protected $hidden = ['create_at', 'updated_at'];
}
