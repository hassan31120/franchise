<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function cats()
    {
        return $this->belongsToMany(Cat::class, 'country_cat', 'country_id', 'cat_id');
    }
    public function chances()
    {
        return $this->hasMany(Chance::class, 'country_id');
    }
}
