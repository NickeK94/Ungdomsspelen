<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
protected $fillable = [
    'name', 'gender', 'school', 'stadium', 'city', 'contactName', 'contactPhone', 'contactEmail', 'class', 'photo'
    
];   
public function sports()
{
    return $this->belongsToMany(Sport::class);
}
}
