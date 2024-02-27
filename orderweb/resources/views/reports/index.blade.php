@extends('templates.base')
@section('title', 'Listado de Reportes')
@section('header', 'Listado de Reportes')
@section('content')
    @include('templates.messages')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte General de Técnicos</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.technicians') }}" title="PDF" class="btn btn-info btn-block col-lg-3 mb-4">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte General de Usuarios</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.users') }}" title="PDF" class="btn btn-info btn-block col-lg-3 mb-4">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte General de Actividades por Tecnico</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.activities_technician') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="technician_id">Técnico</label>
                            </div>
                            <div class="col-lg-5">
                                <select name="technician_id" id="technician_id"
                                    class="form-control" required>
                                    <option value="">Seleccione</option>
                                    @foreach ($technicians as $technician)
                                        <option value="{{ $technician['document'] }}">
                                            {{ $technician['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-primary btn-block col-lg-3 mb-4">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte de Órdenes por Rango de Fechas</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.orders_legalization_date') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-4">
                                <label for="start_date">Fecha de Inicio</label>
                                <input type="date" name="start_date" id="start_date" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <label for="end_date">Fecha de Fin</label>
                                <input type="date" name="end_date" id="end_date" class="form-control" required>
                            </div>
                            <div class="col-lg-4">
                                <button type="submit" class="btn btn-primary btn-block mt-4">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    
@endsection