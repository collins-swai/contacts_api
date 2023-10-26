<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'email', 'phone']; 

    public function group()
    {
        return $this->belongsTo(Group::class); 
    }
}
