@extends('templates.base')
@section('title', 'Listado de actividad')
@section('headers', 'Listado actividad')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('type_activity.create') }}" class="btn btn-primary">Crear actividad</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripcion</th>
                        <th>Horas</th>
                        <th>Tecnico</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                        <th></th>
                    </tr>
                       
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>descripción</td>
                        <td>15</td>
                        <td>Software</td>
                        <td>Sistemas</td>
                        <td>
                            <a href="{{ route('activity.create') }}" title="Editar" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="#" title="confirmar" class="btn btn-confirm btn-circle btn-sm" 
                            style="background-color: green; color: white">
                                <i class="fas fa-check"></i>
                            </a>
                            <a href="#" title="Eliminar" 
                                class="btn btn-danger btn-circle btn-sm" onclick="return remove()">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>        
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
  
@endsection