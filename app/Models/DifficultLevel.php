<?php

namespace App\Models;

use App\Enums\Level;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DifficultLevel extends Model
{
    use HasFactory;

    protected $fillable = [
        'level',
        'additional_cost',
    ];

    protected $casts = [
        'level' => Level::class
    ]; 

    public function requests()
    {
        return $this->hasMany(Request::class);
    }
}
