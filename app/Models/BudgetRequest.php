<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BudgetRequest extends Model
{
    use HasFactory;

    protected $table = "budget_request_view";

    public $incrementing = false;

    public $timestamps = false;
}
