<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FaqModel extends Model
{
    use HasFactory;
    protected $table = "faq";

    public function child()
    {
        return $this->hasMany(FaqModel::class,'parent_id');
    }
    
    public function parent()
    {
        return $this->belongsTo(FaqModel::class,'parent_id');
    }
    
    public function content()
    {
        return $this->hasMany(FaqChildModel::class,'faq_id');
    }
}
