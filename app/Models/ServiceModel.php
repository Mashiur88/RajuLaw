<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceModel extends Model
{
    use HasFactory;
    protected $table = "services";

    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'status',
    ];

    public function chirld_services()
    {
        return $this->hasMany(ServiceChieldModel::class,'service_id');
    }
}
