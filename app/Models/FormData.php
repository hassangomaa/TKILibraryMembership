<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Observers\FormSubmissionObserver;

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

    protected static function boot()
    {
        parent::boot();

        self::observe(FormSubmissionObserver::class);
    }


}
