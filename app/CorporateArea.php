<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorporateArea extends Model
{
    protected $dates = ['deleted_at'];
    protected $tables = 'corporate_areas';
    protected $hidden = ['create_at', 'updated_at'];

}
