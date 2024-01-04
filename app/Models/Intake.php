<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Intake extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function licenseCategories()
    {
        return $this->hasMany(LicenseCategory::class, 'intake_id');
    }
}
