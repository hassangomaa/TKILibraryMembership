<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FormData extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'company',
        'country',
        'prefix',
        'phone_number',
        'email',
    ];

//    protected $casts = [
//        'id' => 'integer',
//    ];



}
