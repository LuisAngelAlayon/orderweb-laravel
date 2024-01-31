@extends('templates.base')
@section('title', 'Listado de ordenes')
@section('headers', 'Listado de ordenes')

@section('content')
    @include('templates.messages')
    <div class="row">
        <div class="col-lg-12 mb-4 d-grip gap-2 d-md-block">
            <a href="{{ route('order.create') }}" class="btn btn-primary">Crear ordenes</a>
        </div>
    </div>

   @include('templates.messages')

   <div class="row">
        <div class="col-lg-12 mb-4">
            <table id="table_date" class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha Leg</th>
                        <th>Dirección</th>
                        <th>Ciudad</th>
                        <th>observaciónes</th>
                        <th>Causal</th>
                        <th>Acciones</th>
                    </tr>
                       
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>24/7/2024</td>
                        <td>Cll 4 # 5-15 barrio Sajonia</td>
                        <td>Tulua</td>
                        <td>observaciones</td>
                        <td>causal</td>
                        <td>
                            <a href="#" title="Editar" class="btn btn-info btn-circle btn-sm">
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
