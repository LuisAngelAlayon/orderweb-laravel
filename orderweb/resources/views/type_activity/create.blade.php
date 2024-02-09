@extends('templates.base')

@section('title', 'Crear tipo de actividad')
@section('headers', 'Crear tipo de actividad')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('type_activity.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col lg-12 mb-4">
                        <label for="description">Actividades</label>
                        <input type="text" class="form-control" id="description" name="description" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('type_activity.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir actividades a la tipo de actividad primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection