<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChanceImage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function chance(){
        return $this->belongsTo(Chance::class, 'chance_id');
    }
}
