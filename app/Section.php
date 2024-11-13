<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $dates = ['deleted_at'];
    protected $tables = 'sections';
    protected $hidden = ['create_at', 'updated_at'];

    public function getImages()
    {
        return $this->hasMany(SectionImage::class, 'section_id', 'id');
    }
}
