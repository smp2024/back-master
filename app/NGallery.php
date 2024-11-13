<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NGallery extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $tables = 'n_galeries';
    protected $hidden = ['create_at', 'updated_at'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }
}
