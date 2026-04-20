<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaseTransfer extends Model
{
    use HasFactory;

    protected $fillable = [
        'vehicle_case_id',
        'from_name',
        'from_s_o',
        'from_nic',
        'from_biometric',
        'to_name',
        'to_s_o',
        'to_nic',
        'to_biometric',
        'engine_no',
        'chassis_no',
        'wheels',
        'weight',
        'last_tax',
    ];

    public function vehicleCase()
    {
        return $this->belongsTo(VehicleCase::class, 'vehicle_case_id');
    }
}
