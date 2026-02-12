<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuickRequest extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'phone',
        'email',
        'service_ids',
        'status',
    ];

    protected $casts = [
        'service_ids' => 'array',
    ];
}
