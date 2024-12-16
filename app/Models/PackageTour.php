<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PackageTour extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'about',
        'location',
        'price',
        'days',
        'category_id'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * Get all of the package_photos for the PackageTour
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function package_photos(){
        return $this->hasMany(PackagePhoto::class);
    }

    public function tour_inclusions(){
        return $this->hasMany(TourInclusion::class);
    }

    public function tour_plans(){
        return $this->hasMany(TourPlan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }



}
