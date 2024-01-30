@extends('templates.base')
@section('title', 'Listado de Causales')
@section('headers', 'Listado de Causales')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('causal.create') }}" class="btn btn-primary">Crear</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                       
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Causal de prueba</td>
                        <td>
                            <a href="#" title="Editar" class="btn btn-info btn-circle btn-sm">
                                <i class="fas fa-edit"></i>
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
    <script>$(document).ready(function() {
    $('#table_date').DataTable();
    });

    function delete() {
        if (confirm('¿Desea eliminar este registro?'));
            return true;
        else
            return false;

    }
  </script>
  
@endsection