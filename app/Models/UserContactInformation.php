<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserContactInformation extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'user_contact_information';

    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'mobile_number',
        'telephone_number',
        'telegram_id',
        'email_address',
        'linkedin_account',
        'personal_website',
    ];
}
