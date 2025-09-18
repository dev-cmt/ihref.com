<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $fillable = [
        'division_id',
        'name',
        'bn_name',
        'lat',
        'lon',
        'url'
    ];

    /** A District belongs to a Division */
    public function division()
    {
        return $this->belongsTo(Division::class);
    }

    /** A District has many Upazilas (if you have upazilas table) */
    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    }
}
