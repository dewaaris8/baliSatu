<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Category extends Model
{
    use HasFactory, SoftDeletes;

    public function tours()
    {
        return $this->hasMany(PackageTour::class);
    }

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];
}
