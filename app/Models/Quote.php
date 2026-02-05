<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Quote extends Model
{
    use CrudTrait;
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'service_type',
        'origin_country',
        'destination_country',
        'cargo_description',
        'weight_kg',
        'volume_cbm',
        'ready_date',
        'name',
        'email',
        'phone',
        'company',
        'notes',
    ];

    protected static $logAttributes = [
        'service_type',
        'origin_country',
        'destination_country',
        'cargo_description',
        'weight_kg',
        'volume_cbm',
        'ready_date',
        'name',
        'email',
        'phone',
        'company',
        'notes',
    ];

    protected static $logOnlyDirty = true;
    protected static $logName = 'quote';

    protected $casts = [
        'ready_date' => 'date',
    ];
}
