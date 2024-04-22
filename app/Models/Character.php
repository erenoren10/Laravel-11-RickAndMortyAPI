<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Character extends Model
{
    use HasFactory;

    protected $fillable = ['id', 'name', 'status', 'species', 'type', 'gender', 'origin_name', 'origin_url', 'location_name', 'location_url', 'image', 'episode', 'url', 'created'];

    protected $casts = [
        'episode' => 'array',
    ];

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function episodes()
    {
        return $this->belongsToMany(Episode::class);
    }
}
