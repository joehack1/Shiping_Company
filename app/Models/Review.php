<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Review extends Model
{
    use CrudTrait;
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'client_name',
        'rating',
        'comment',
        'is_published',
        'published_at',
    ];

    protected static $logAttributes = [
        'client_name',
        'rating',
        'comment',
        'is_published',
        'published_at',
    ];

    protected static $logOnlyDirty = true;
    protected static $logName = 'review';

    protected $casts = [
        'is_published' => 'boolean',
        'published_at' => 'datetime',
    ];
}
