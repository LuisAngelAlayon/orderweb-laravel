@extends('templates.base')
@section('title', 'Listado de actividad')
@section('headers', 'Listado actividad')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('activity.create') }}" class="btn btn-primary">Crear actividad</a>
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
                        <th>Id del Tecnico</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                       
                </thead>
                <tbody>
                    @foreach ($activitys as $activity)
                        <tr>
                            <td>{{ $activity['id'] }}</td>
                            <td>{{ $activity['description'] }}</td>
                            <td>{{ $activity['hours'] }}</td>
                            <td>{{ $activity['technician_id'] }}</td>
                            <td>{{ $activity['type_id'] }}</td>
                            <td>
                                <a href="{{ route('activity.edit', $activity['id']) }}" title="Editar" class="btn btn-info btn-circle btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('activity.destroy', $activity['id']) }}" title="Eliminar" 
                                    class="btn btn-danger btn-circle btn-sm" onclick="return remove()">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/general.js') }}"></script>
  
@endsection