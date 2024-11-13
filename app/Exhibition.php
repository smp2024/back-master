<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Exhibition extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'name', 'slug', 'file_path', 'file', 'status', 'orden'];
    protected $dates = ['deleted_at'];
    protected $tables = 'exhibitions';
    protected $hidden = ['create_at', 'updated_at'];
}
