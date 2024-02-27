<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use App\Models\Technician;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $technicians = Technician::all();
        $orders = Order::all();

        return view('reports.index', compact('technicians', 'orders', ));
    }


    public function export_technicians()
    {
        $technicians = Technician::all();
        $data = array(
            'technicians' => $technicians
        );
        $pdf = Pdf::loadView('reports.export_technicians', $data)->setPaper('letter', 'portrait');
        return $pdf->download('Technicians.pdf');
    }

    public function export_users()
    {
        $users = User::all();
        $data = array(
            'users' => $users
        );
        $pdf = Pdf::loadView('reports.export_users', $data)->setPaper('letter', 'portrait');
        return $pdf->download('Users.pdf');
    }

    /**
     * Exporta las actividades de un técnico seleccionado
     */
    public function export_activities_by_technician(Request $request)
    {
        $technician = Technician::where('document', '=', $request['technician_id'])->first();

        $activities = Activity::where('technician_id', '=', $request['technician_id'])->get();

        $data = array(
            'technician' => $technician,
            'activities' => $activities
        );
        $pdf = Pdf::loadView('reports.export_activities_by_technician', $data)->setPaper('letter', 'portrait');
        return $pdf->download('ActivitiesByTechnician.pdf');

    }

    /**
     * Exporta las órdenes por fecha de legalización
     */
    public function export_orders_by_legalization_date(Request $request)
    {
        // Obtener las órdenes dentro del rango de fechas de legalización
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $orders = Order::whereBetween('legalization_date', [$startDate, $endDate])->get();

        // Obtener las descripciones de la causal y de la observación para cada orden
        $data = [

            'orders' => $orders
        ];

        foreach ($orders as $order) {
            $causalDescription = Causal::find($order->causal_id)->description;
            $observationDescription = Observation::all()->find($order->observation_id)->description;

            $data[] = [
                'order_number' => $order->order_number,
                'legalization_date' => $order->legalization_date,
                'causal_description' => $causalDescription,
                'observation_description' => $observationDescription
            ];
        }



        $pdf = PDF::loadView('reports.export_orders_by_legalization_date', $data)
            ->setPaper('letter', 'portrait');

        return $pdf->download('OrdersByLegalizationDate.pdf');
    }











    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
