@extends('templates.base')

@section('title', 'Editar Ordenes')
@section('header', 'Editar Ordenes')

@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col lg-12 mb-4">
            <form action="" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col lg-12 mb-4">
                        <label for="date">Fecha Leg</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                   
                    <div class="col lg-12 mb-4">
                        <label for="text">Dirección</label>
                        <input type="text" class="form-control" id="text" name="text" required>
                    </div>

                    <div class="col lg-12 mb-4">
                        <label for="text">Ciudad</label>
                        <select name="city" class="form-control">
                            <option value="1">Tulua</option>
                            <option value="2">Buga</option>
                            <option value="3">Cali</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col lg-6 mb-4">
                        <label for="text">observación</label>
                        <select name="observation" class="form-control">
                            <option value="">observación</option>
                        </select>
                    </div>
                    <div class="col lg-6 mb-4">
                        <label for="text">Causal</label>
                        <select name="causal" class="form-control">
                            <option value="">Causal</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            Guardar
                        </button>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <a href="{{ route('order.create') }}" class="btn btn-secondary btn-block">
                            Cancelar
                        </a>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="alert alert-warning" role="alert">
                        <i class="fa-solid fa-lightbulb"></i>
                        Para añadir actividades a la orden primero debe crearlas y luego dar click en la accion editar
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection