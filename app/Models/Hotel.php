<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Hotel extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        // 'name',
        'region',
        'city',
        'street',
        'manager',
        'contact_no',
        'email',


    ];

    protected $softDelete = true;
    // protected $dates = ['deleted_at'];
}
