<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'name', 'type', 'dimension', 'residents', 'url', 'created'];
    protected $casts = [
        'residents' => 'array', 
    ];

    public function characters()
    {
        return $this->belongsToMany(Character::class);
    }
    
}
