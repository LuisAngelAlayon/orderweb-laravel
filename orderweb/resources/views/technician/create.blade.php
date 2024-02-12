@extends('templates.base')

@section('title', 'Crear tecnico')
@section('headers', 'Crear tecnico')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="{{ route('technician.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col lg-6 mb-4">
                        <label for="document">Documento</label>
                        <input type="text" class="form-control" id="document" name="document" required>
                    </div>
                    <div class="col lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col lg-6 mb-4">
                        <label for="Technician_id">Especialidad</label>
                       <input type="text" class="form-control"
                       id="especiality" name='especiality' required>
                    </div>
                    <div class="col lg-6 mb-4">
                        <label for="phone">Telefono</label>
                        <input type="number" class="form-control" id="phone" name="phone" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('technician.index') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir actividades a tecnico primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection