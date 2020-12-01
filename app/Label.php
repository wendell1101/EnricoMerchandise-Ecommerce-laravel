<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use Sluggable;
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    protected $fillable = [
        'name', 'slug',
    ];

    public function getRouteKeyName(){
        return 'slug';
    }

    //Relations
    public function products(){
        return $this->hasMany(Product::class);
    }
}
