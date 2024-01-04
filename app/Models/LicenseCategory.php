<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LicenseCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'intake_id', // <-- This is the foreign key
        'name',
    ];

    public function intake()
    {
        return $this->belongsTo(Intake::class);
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'license_category_id');
    }
}
