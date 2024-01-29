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

                $technician->document = 988998;
                $technician->name = 'Luis Angel';
                $technician->especiality = 'Software-programmer';
                $technician->phone = '718241256';

                $technician->document = 23456789;
                $technician->name = 'Luis Angel';
                $technician->especiality = 'Software-programmer';
                $technician->phone = 718241256;
                $technician->save();
        }

}
