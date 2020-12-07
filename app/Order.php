<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use Sluggable;
    
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'transaction_id'
            ]
        ];
    }

    public function getRouteKeyName(){
        return 'slug';
    }


    protected $fillable = [
        'products', 'slug', 'transaction_id', 'status', 'total_amount', 'active', 
        'user_id', 'billing_address_id', 'shipping_address_id'
    ];

    protected $casts = [
        'products' => 'array',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function billing_address(){
        return $this->belongsTo(BillingAddress::class);
    }
    public function shipping_address(){
        return $this->belongsTo(ShippingAddress::class);
    }
}
