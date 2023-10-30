<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'fname', 
        'lname', 
        'is_type', 
        'email', 
        'phone1', 
        'phone2', 
        'fax', 
        'address', 
        'city', 
        'state', 
        'postal_code',
        'country', 
        'website', 
        'company_name', 
        'info', 
        'created_at', 
        'updated_at'
    ];
}
