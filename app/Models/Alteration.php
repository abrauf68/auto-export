<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alteration extends Model
{
    use HasFactory;

    public function fromUser()
    {
        return $this->belongsTo(OtherUser::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(OtherUser::class, 'to_user_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }
}
