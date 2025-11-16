<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeSetting extends Model
{
    protected $fillable = [
        'site_title',
        'hero_letter',
        'hero_text',
        'hero_description',
        'signature_image',
        'founder_name',
        'founder_title',
        'investor_link',
        'logo_image'
    ];
}
