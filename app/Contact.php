<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = [
        'contact_name',
        'contact_email',
        'phone',
        'sample',
        'contact_message',
        'contact_view',
        'contact_type'
    ];
}
