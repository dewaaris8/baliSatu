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

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function package_photos()
    {
        return $this->hasMany(PackagePhoto::class);
    }

    public function tour_inclusions()
    {
        return $this->hasMany(TourInclusion::class);
    }

    public function tour_plans()
    {
        return $this->hasMany(TourPlan::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Boot model events to handle cascading soft deletes.
     */
    protected static function booted()
    {
        static::deleting(function ($packageTour) {
            if ($packageTour->isForceDeleting()) {
                // Hard delete related tour_plans and tour_inclusions
                $packageTour->tour_plans()->forceDelete();
                $packageTour->tour_inclusions()->forceDelete();
            } else {
                // Soft delete related tour_plans and tour_inclusions
                $packageTour->tour_plans()->delete();
                $packageTour->tour_inclusions()->delete();
            }
        });

        static::restoring(function ($packageTour) {
            // Restore related tour_plans and tour_inclusions when a package tour is restored
            $packageTour->tour_plans()->withTrashed()->restore();
            $packageTour->tour_inclusions()->withTrashed()->restore();
        });
    }
}
