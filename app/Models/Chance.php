<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chance extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function images()
    {
        return $this->hasMany(ChanceImage::class, 'chance_id');
    }
    public function cat()
    {
        return $this->belongsTo(Cat::class, 'cat_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'favourites', 'chance_id', 'user_id');
    }
}
