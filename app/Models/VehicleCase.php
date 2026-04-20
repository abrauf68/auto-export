<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCase extends Model
{
    use HasFactory;

    protected $fillable = [
        'case_no',
        'vehicle_reg_no',
        'make',
        'year',
        'submitted_by',
        'mobile_no',
        'submission_date',
        'tentative_return_date',
        'case_refer_to',
        'work_type',
    ];

    public function transfer()
    {
        return $this->hasOne(CaseTransfer::class);
    }

    public function alteration()
    {
        return $this->hasOne(CaseAlteration::class);
    }

    public function tax()
    {
        return $this->hasOne(CaseTax::class);
    }

    public function insurance()
    {
        return $this->hasOne(CaseInsurance::class);
    }

    public function permit()
    {
        return $this->hasOne(CasePermit::class);
    }

    public function fitness()
    {
        return $this->hasOne(CaseFitness::class);
    }
}
