<?php

namespace Database\Seeders;

use App\Models\Causal;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestOrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = new Order();
        $order->legalization_date = '2024-01-29';
        $order->address = 'Calle Cra 1 # 2 - 3';
        $order->city = 'Tulua';
        $order->observation_id = null;

        $causal = Causal::find(1);
        $order->causal_id = $causal->id;
        $order->save();
    }
}
