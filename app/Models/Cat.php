<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function countries(){
        return $this->belongsToMany(Country::class, 'country_cat', 'cat_id', 'country_id');
    }
}
