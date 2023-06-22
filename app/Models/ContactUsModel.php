<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = "contact_us";

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('name', 'like', '%' . $search . '%')
            ->where('email', 'like', '%' . $search . '%')
            ->where('message', 'like', '%' . $search . '%');
    }
}
