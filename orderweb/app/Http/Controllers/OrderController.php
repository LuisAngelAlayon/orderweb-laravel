<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Causal;
use App\Models\Observation;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $causals = Causal::all();
        $observations = Observation::all();
        $cities = array(
            ['name' => 'BUGA', 'value' => 'BUGA'],
           ['name' => 'CALI', 'value' => 'CALI'],
            ['name' => 'TULUA', 'value' => 'TULUA']
            
        );
        return view('order.create', compact('causals', 'observations', 'cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $order = Order::created($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('order.index');
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
        $order = Order::find($id);
        if($order)
        {
        $causals = Causal::all();
        $observations = Observation::all();
        $cities = array(
            ['name' => 'BUGA', 'value' => 'BUGA'],
           ['name' => 'CALI', 'value' => 'CALI'],
            ['name' => 'TULUA', 'value' => 'TULUA']
            
        );
        //consultar actividades asociadas y no asociadas
        $activitiesAdded = $order->activities;
        //consultar actividades no asociadas
        $query = DB::select('SELECT * FROM activity WHERE activity.id NOT IN
        (SELECT order_activity.activity_id FROM order_activity WHERE order_activity.order_id =?)', [$id]);
        $activitiesNotInOrder = Collection::make($query);


        return view('order.edit', compact('order', 'causals', 'observations', 'cities', 'activitiesAdded', 'activitiesNotInOrder'));
        }
    session()->flash('warning'. 'No se encuentra el registro solicitado');
    return redirect()->route('order.index');
    }

        

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id);
        if($order)
        {
            $order->update($request->all());
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('order.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::find($id);
        if($order)
        {
            $order->delete();
            session()->flash('message', 'Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning', 'No se encuentra el registro solicitado');
        }

        return redirect()->route('order.index');
    }
    //Agrega una nueva actividad a la orden
    public function add_activity(string $order_id, string $activity_id)
    {
        $order = Order::find($order_id);
        if(!$order)
        {
            session()->flash('error', 'No se enceuntra la orden');
            return redirect()->route('order.edit', $order_id);
        }

        $activity = Activity::find($activity_id);
        if(!$activity)
        {
            session()->flash('error', 'No se enceuntra la actividad');
            return redirect()->route('order.edit', $activity_id);
        }

        $order->activities()->attach($activity->id);
        session()->flash('message', 'Actividad agregada exitosamente');
        return redirect()->route('order.edit', $order_id);
    }

    public function remove_activity(string $order_id, string $activity_id)
    {
        $order = Order::find($order_id);
        if(!$order)
        {
            session()->flash('error', 'No se enceuntra la orden');
            return redirect()->route('order.edit', $order_id);
        }

        $activity = Activity::find($activity_id);
        if(!$activity)
        {
            session()->flash('error', 'No se enceuntra la actividad');
            return redirect()->route('order.edit', $activity_id);
        }

        $order->activities()->detach($activity->id);
        session()->flash('message', 'Actividad removida exitosamente');
        return redirect()->route('order.edit', $order_id);
    }
}
