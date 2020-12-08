<?php

namespace App;


use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;

class User extends Authenticatable
{
    use Notifiable, Sluggable;
    use \Rackbeat\UIAvatars\HasAvatar;


    //slug
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    //session
    public function show(Request $request, $id)
    {
        $value = $request->session()->get('key');

        //
    }

    //ui avatar
    public function getAvatar( $size = 64 ) {
        return $this->getGravatar( $this->email, $size );
    }

    //set default route key to slug
    public function getRouteKeyName(){
        return 'slug';
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'google_id', 'password', 'profile', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];




    
    public function storeImage($image){
        $filename = time() . '-' . $image->getClientOriginalName();
        $image = $image->storeAs('profile_images', $filename, 'public');
        return $image;
    }

    public function deleteExistingImage(){
        Storage::delete('public/' . $this->profile);
    }



    // privelages
    public function isAdmin(){
        return $this->role === 'admin';
    }
    public function isProductManager(){
        return $this->role === 'product_manager';
    }
    public function hasAdminAccess(){
        return $this->role === 'admin' || $this->role === 'product_manager';
    }

    public function isCustomer(){
        return $this->role === 'customer';
    }

    //relations
    public function billing_addresses(){
        return $this->hasMany(BillingAddress::class);
    }
    public function shipping_addresses(){
        return $this->hasMany(ShippingAddress::class);
    }
}
