<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Technician;
use App\Models\TypeActivity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestActivitySeeder extends Seeder
{
        /**
         * Run the database seeds.
         */
        public function run(): void
        {
                $typeActivity = TypeActivity::find(1);


                //SELECT * FROM technician where document = 988998*/
                $technician = Technician::where('document', '=', 988998)->first();

                $activity = new Activity();
                $activity->description = 'Software-programmer';
                $activity->hours = 3;
                $activity->technician_id = $technician->document;

                //SELECT * FROM technician where document = 23456789*/
                $technician = Technician::where('document', '=', 23456789)->first();

                $activity = new Activity();
                $activity->description = 'Instalacion de redes';
                $activity->hours = 3;
                $activity->technician_id = $technician->document ?? 0;

                $activity->type_id = $typeActivity->id;
                $activity->save();

        }
}
