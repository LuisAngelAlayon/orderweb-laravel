<?php

namespace Database\Seeders;

use App\Models\Activity;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestOrderActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = Order::find(1);
        $activity = Activity::find(1);
        //Guardaremos en order_activity para la orden 1 la actividad 1
        $order->activities()->attach($activity->id);
        //quitaremos la actividad  de la orden 
        /*$order->activities()->detach($activity->id);*/
    }
}
