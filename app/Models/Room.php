<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        // 'name',
        'room_no',
        'image',
        'is_occupied',
        'room_type_id',
        'hotel_id',
    ];

    public function room_types()
    {
        return $this->belongsTo(RoomType::class,'room_type_id');
    }
}
