<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'phoneNumber',
        'zipCode',
        'address',
        'province',
        'city',
        'secondaryPhone',
        'secondaryPhoneTwo',
        'dob',
        'business',
        'socialDate',    ];
    protected $casts = [
        'secondaryPhone' => 'string',
        'secondaryPhoneTwo' => 'string',
    ];
}
