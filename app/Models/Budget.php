<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    use HasFactory;

    protected $fillable = [
        'request_id', 'total_amount', 'details'
    ];

    public function request()
    {
        return $this->belongsTo(Request::class);
    }
}
