<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryCat extends Model
{
    protected $table = 'country_cat';
    use HasFactory;
    protected $guarded = [];
}
