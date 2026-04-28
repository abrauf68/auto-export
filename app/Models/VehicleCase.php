<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleCase extends Model
{
    use HasFactory;

    protected $table = 'vehicle_cases';

    protected $fillable = [
        'case_no', 'vehicle_reg_no', 'make', 'year', 'submitted_by',
        'mobile_no', 'submission_date', 'tentative_return_date',
        'case_refer_to', 'work_type', 'status'
    ];

    public function transfer()
    {
        return $this->hasOne(CaseTransfer::class, 'vehicle_case_id');
    }

    public function alteration()
    {
        return $this->hasOne(CaseAlteration::class, 'vehicle_case_id');
    }

    public function tax()
    {
        return $this->hasOne(CaseTax::class, 'vehicle_case_id');
    }

    public function insurance()
    {
        return $this->hasOne(CaseInsurance::class, 'vehicle_case_id');
    }

    public function permit()
    {
        return $this->hasOne(CasePermit::class, 'vehicle_case_id');
    }

    public function fitness()
    {
        return $this->hasOne(CaseFitness::class, 'vehicle_case_id');
    }

    public function billing()
    {
        return $this->hasOne(Billing::class, 'vehicle_case_id');
    }
}
