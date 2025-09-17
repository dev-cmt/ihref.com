<?php

// app/Models/Registration.php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // <- Important
use Illuminate\Support\Str;
use Illuminate\Notifications\Notifiable;

class Registration extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'member_code', 'full_name','slug','father_or_husband','mother','nid','education','dob','occupation',
        'religion','permanent_address','post_office','division_id','district_id',
        'upazila_id','present_address','phone','mobile','photo', 'password', 'status'
    ];

    protected $hidden = [
        'password',
    ];

    protected static function boot(): void
    {
        parent::boot();

        static::creating(fn($registration) => $registration->slug = Str::slug($registration->full_name));
        static::updating(fn($registration) => $registration->slug = Str::slug($registration->full_name));
    }


    // public function division() { return $this->belongsTo(Division::class); }
    // public function district() { return $this->belongsTo(District::class); }
    // public function upazila()  { return $this->belongsTo(Upazila::class); }
    
}
