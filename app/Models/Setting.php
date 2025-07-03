<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    // tax , home page title , api key , footer contact details number , email , social media  ,    
    protected $fillable = [
        'payment_api_key',
        'payment_tax',
        'home_title',
        'contact_email',
        'contact_number',
        'facebook_link',
        'instagram_link',
        'linkedin_link',
    ];
}
