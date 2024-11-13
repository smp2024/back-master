<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Description;
use App\NGallery;
class Article extends Model
{
    use SoftDeletes;
    protected $fillable = ['id', 'content'];
    protected $dates = ['deleted_at'];
    protected $tables = 'articles';
    protected $hidden = ['create_at', 'updated_at'];

    public function descriptions() {
        return $this->belongsTo(Description::class);
    }

    public function images() {
        return $this->belongsTo(NGallery::class);
    }
}
