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

    public function bookings()
    {
    return $this->hasMany(PackageBooking::class, 'package_tour_id');
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
        // Set package_tour_id menjadi null di PackageBooking sebelum menghapus PackageTour
        $packageTour->bookings()->update(['package_tour_id' => null]);

        if ($packageTour->isForceDeleting()) {
            $packageTour->tour_plans()->forceDelete();
            $packageTour->tour_inclusions()->forceDelete();
        } else {
            $packageTour->tour_plans()->delete();
            $packageTour->tour_inclusions()->delete();
        }
    });

    static::restoring(function ($packageTour) {
        $packageTour->tour_plans()->withTrashed()->restore();
        $packageTour->tour_inclusions()->withTrashed()->restore();
    });
}

}
