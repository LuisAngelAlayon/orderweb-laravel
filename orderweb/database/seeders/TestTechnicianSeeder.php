<?php

namespace Database\Seeders;

use App\Models\Technician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestTechnicianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technician = new Technician();
<<<<<<< HEAD
        $technician->document = 988998;
        $technician->name = 'Luis Angel';
        $technician->especiality = 'Software-programmer';
        $technician->phone = '718241256';
=======
        $technician->document = 23456789;
        $technician->name = 'Luis Angel';
        $technician->especiality = 'Software-programmer';
        $technician->phone = 718241256;
>>>>>>> 55589e896b7ff88fe4c0cd696005a21eb7a5cbf8
        $technician->save();
    }

}
