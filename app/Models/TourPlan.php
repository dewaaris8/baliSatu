<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourPlan extends Model
{
    //
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'package_tour_id',
        'day',
        'description',
    ];

    public function package_tour(){
        return $this->belongsTo(PackageTour::class);
    }
}
