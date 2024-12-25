<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    protected $fillable = [
        'ChannelName',
        'Description', 
        'SubscribersCount',
        'URL'
    ];

    protected $primaryKey = 'ChannelID';
}