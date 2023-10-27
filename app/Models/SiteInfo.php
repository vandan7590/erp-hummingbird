<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'favicon_icon',
        'login_image',
        'site_name',
        'site_desc',
        'site_meta_tags'
    ];
}
