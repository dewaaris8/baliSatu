<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'logo'
    ];
}
