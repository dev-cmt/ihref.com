<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_name',
        'image_path',
        'title',
        'description',
        'string_0',
        'string_1',
        'string_2',
        'string_3',
        'string_4',
        'string_5',
        'text_1',
        'text_2',
        'text_3',
        'text_4',
        'json_collection',
        'pagination',
        'status'
    ];
}
