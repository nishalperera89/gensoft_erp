<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserResidentialDetail extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'user_residential_details';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'address_line_2',
        'address_line_1',
        'city',
        'country',
        'postal_code',
    ];
}
