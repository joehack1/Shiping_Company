<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Service extends Model
{
    use CrudTrait;
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'name',
        'summary',
        'description',
        'sort_order',
        'is_active',
    ];

    protected static $logAttributes = [
        'name',
        'summary',
        'description',
        'sort_order',
        'is_active',
    ];

    protected static $logOnlyDirty = true;
    protected static $logName = 'service';

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
