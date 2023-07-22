<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LegalFeesChildModel extends Model
{
    use HasFactory;
    protected $connection = "mysql";

    protected $table = "legal_fees_child";

    protected $fillable = ['lebel','tag'];

    public function legalFees(){
        return $this->belongsTo(LegalFeesModel::class,'parent_id');
    }
}
