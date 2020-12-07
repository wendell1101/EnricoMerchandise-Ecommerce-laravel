<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
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
        'name', 'slug', 'image', 'price', 'description', 'content', 'featured', 'category_id', 'label_id',
    ];


    // set default key to slug
    public function getRouteKeyName(){
        return 'slug';
    }

    public function storeImage($image){
        $filename = time() . '-' . $image->getClientOriginalName();
        $image = $image->storeAs('images', $filename, 'public');
        return $image;
    }
    public function deleteExistingImage(){
        Storage::delete('public/' . $this->image);
    }

    public function showPrice(){
        return 'PHP ' . number_format((float)$this->price, 2, '.', '');
    }

    public function showCartPrice($price){
        return 'PHP ' . number_format((float)$price, 2, '.', '');
    }

    // get label color
    public function labelColor(){
        if($this->label->name === 'new'){
            return 'primary';
        }elseif($this->label->name === 'hot'){
            return 'danger';
        }elseif($this->label->name === 'special'){
            return 'warning';
        }
    }



    // Relations

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function label(){
        return $this->belongsTo(Label::class);
    }
    
}
