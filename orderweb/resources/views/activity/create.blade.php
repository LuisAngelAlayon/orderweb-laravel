@extends('templates.base')

@section('title', 'Crear Actividad')
@section('headers', 'Crear Actividad')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('activity.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col lg-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                    <div class="col lg-6 mb-4">
                        <label for="hours">Horas estimadas</label>
                        <input type="number" class="form-control" id="hours" name="hours" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col lg-6 mb-4">
                        <label for="technician_id">Tecnico</label>
                        <input type="text" class="form-control" name="technician_id" id="technician_id" required>
                    </div>
                    <div class="col lg-6 mb-4">
                        <label for="type_id">Tipo</label>
                        <input type="text" class="form-control" name="type_id" id="type_id" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('activity.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir actividades la Actividad primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection