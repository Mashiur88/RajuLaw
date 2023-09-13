<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use App\Http\Models\Team;

class Appointment extends Model
{
    use HasFactory;
    public function attorny(): \Illuminate\Database\Eloquent\Relations\BelongsTo {
        return $this->belongsTo(Team::class,'attorny_id');
    }
}
