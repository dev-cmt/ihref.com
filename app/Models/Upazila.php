<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    use HasFactory;

    protected $fillable = [
        'district_id',
        'name',
        'bn_name',
        'url'
    ];

    /** An Upazila belongs to a District */
    public function district()
    {
        return $this->belongsTo(District::class);
    }

    /** An Upazila has many Unions */
    public function unions()
    {
        return $this->hasMany(Union::class);
    }
}
