<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImmigrationNewsModel extends Model
{
    use HasFactory;
    protected $table = "immigration_news";

    public static function search($search)
    {
        return empty($search)
            ? static::query()
            : static::query()->where('title', 'like', '%' . $search . '%');
    }
}
