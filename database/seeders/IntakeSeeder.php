<?php

namespace Database\Seeders;

use App\Models\Intake;
use App\Models\Student;
use App\Models\LicenseCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IntakeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Intake::factory()
            ->count(5)
            ->sequence(fn ($sequence) => [
                'name' => 'Intake ' . $sequence->index +1
            ])
            ->has(
                LicenseCategory::factory()
                    ->count(3)
                    ->state( new Sequence(

                            ['name' => 'Category B 1.1'],
                            ['name' => 'Category B1.3'],
                            ['name' => 'Category B2'],
                        )
                    )
                    ->has(
                        Student::factory()
                            ->count(5)
                            ->state(
                                function (array $attributes, LicenseCategory $licenseCategory) {
                                    return [
                                        'intake_id' => $licenseCategory->intake_id,
                                    ];
                                }
                            )

                    )
            )
            ->create();
    }
}
