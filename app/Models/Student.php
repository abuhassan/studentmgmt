<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
      'intake_id',
      'license_category_id',
      'name',
      'email',
    ];

    public function intake()
    {
        return $this->belongsTo(Intake::class, 'intake_id');
    }

    public function licenseCategory()
    {
        return $this->belongsTo(LicenseCategory::class, 'license_category_id');
    }
}
