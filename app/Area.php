<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'name', 'slug', 'file_path', 'file', 'status', 'orden'];
    protected $dates = ['deleted_at'];
    protected $tables = 'areas';
    protected $hidden = ['create_at', 'updated_at'];

}
