<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'parent_id',
    ];

    public function parent()
    {
        return $this->hasOne(Category::class, 'id', 'parent_id');
        // return $this->belongsToOne(static::class, 'parent_id');
    }

    public function childs()
    {
        return $this->hasMany(Category::class,'parent_id', 'id');
    }
}
