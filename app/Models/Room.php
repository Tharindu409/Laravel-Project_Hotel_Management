<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';

    protected $fillable = [
        'hotel_name',
        'title',
        'slug',
        'description',
        'price_per_night',
        'capacity_adults',
        'capacity_children',
        'room_type',
        'image',
        'is_featured',
        'is_available',
        'amenities',
    ];
}