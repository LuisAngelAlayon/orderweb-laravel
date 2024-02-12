<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activitys = Activity::all();
        //dd($Activity);
        return view('activity.index', compact('activitys'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $activity = Activity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('activity.index');
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
        $activity = Activity::find($id);
        if ($activity) {
            return view('activity.edit', compact('activity'));
        } else {
            return redirect()->route('activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $activity = Activity::find($id);
        if ($activity) {
            $activity->update($request->all()); // update activitys set .....description =....
            session()->flash('message', 'Registro actualizado exitosamente');
        } else {
            session()->flash('warning', 'No se encontro el registro solicitado');
        }

        return redirect()->route('activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $activity = Activity::find($id);
        if ($activity) {
            $activity->delete(); // DELETE FROM activitys WHERE id = $id
            session()->flash('message', 'Registro eliminado exitosamente');
        } else {
            session()->flash('warning', 'No se encontro el registro solicitado');
        }

        return redirect()->route('activity.index');
    }
}
