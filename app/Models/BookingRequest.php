<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookingRequest extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'where_to',
        'service_ids',
        'status',
    ];

    protected $casts = [
        'service_ids' => 'array',
    ];
}
