@extends('templates.base_reports')
@section('header', 'Reporte General de Usuarios')
@section('content')
    <section id="results">
        @if ($users)
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Correo Electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user['id'] }}</td>
                            <td>{{ $user['name'] }}</td>
                            <td>{{ $user['email'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <h5>No Existen Usuarios</h5>
        @endif
    </section>
@endsection