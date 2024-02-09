<?php

namespace App\Http\Controllers;

use App\Models\TypeActivity;
use Illuminate\Http\Request;

class Type_ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $type_activities = TypeActivity::all();
        //dd($causals);
        return view('type_activity.index', compact('type_activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('type_activity.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $type_activity = TypeActivity::create($request->all());
        session()->flash('message', 'Registro creado exitosamente');
        return redirect()->route('type_activity.index');
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
        $type_activity = TypeActivity::find($id);
        if ($type_activity) {
            return view('type_activity.edit', compact('type_activity'));
        } else {
            return redirect()->route('type_activity.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $type_activity = TypeActivity::find($id);
        if ($type_activity) {
            $type_activity->update($request->all()); // update causals set .....description =....
            session()->flash('message', 'Registro actualizado exitosamente');
        } else {
            session()->flash('warning', 'No se encontro el registro solicitado');
        }

        return redirect()->route('type_activity.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $type_activity = TypeActivity::find($id);
        if ($type_activity) {
            $type_activity->delete(); // DELETE FROM type_activities WHERE id = $id
            session()->flash('message', 'Registro eliminado exitosamente');
        } else {
            session()->flash('warning', 'No se encontro el registro solicitado');
        }

        return redirect()->route('type_activity.index');
    }

}
