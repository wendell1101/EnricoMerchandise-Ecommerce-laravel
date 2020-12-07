<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{

    protected $fillable = [
        'user_id', 'first_name', 'last_name', 'email', 'contact_number', 'house_number', 'street', 'barangay', 'city', 
        'province', 'zip_code', 'country',
    ];

    public function getInfo()
    {
        return $this->first_name . $this->last_name .'-'. $this->house_number.','. $this->street.','. $this->barangay.','. 
        $this->city.','. $this->province.','. $this->country;
    }
    // relation
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
