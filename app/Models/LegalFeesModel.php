<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalFeesModel extends Model
{
    use HasFactory;

    protected $table = "legal_fees";

    public function child_data()
    {
        return $this->hasMany(LegalFeesChildModel::class,'parent_id');
    }
}
