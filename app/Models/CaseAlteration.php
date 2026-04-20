<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseAlteration extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_case_id',
        'engine_no',
        'chassis_no',
        'wheels',
        'weight',
        'last_tax',
        'other',
        'alt_from',
        'alt_to',
        'alt_wheels',
        'alt_engine',
        'alt_body',
        'alt_docs',
    ];
}
