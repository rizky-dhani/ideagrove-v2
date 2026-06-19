<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'email',
        'phone',
        'phone_display',
        'app_name',
        'address',
        'office_hours',
    ];
}
