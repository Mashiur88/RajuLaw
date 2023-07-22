<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceChieldModel extends Model
{
    use HasFactory;
    protected $table = 'service_chield';

    public function parent_service(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(ServiceModel::class,'service_id');
    }
}
