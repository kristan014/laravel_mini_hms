<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'name',
        'room_type',
        'no_of_beds',
        'max_guest',
        'rate',

    ];

    public function rooms()
    {
        return $this->hasMany(Rooms::class);
    }

}
