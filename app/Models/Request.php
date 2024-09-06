<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'service_type_id',
        'difficult_level_id',
        'client_id',
        'details',
        'request_status',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function serviceType()
    {
        return $this->belongsTo(ServiceType::class);
    }

    public function difficultyLevel()
    {
        return $this->belongsTo(DifficultLevel::class);
    }

    public function budget()
    {
        return $this->hasOne(Budget::class);
    }
}
