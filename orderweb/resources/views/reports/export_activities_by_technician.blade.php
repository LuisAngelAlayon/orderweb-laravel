@extends('templates.base_reports')

@section('header', 'Reporte General de Actividades por Técnico')
@section('content')

    <section id="results">
        @if ($activities)
            <h3>Actividades por Técnico</h3>

            <table id="ReportTableInfo">
                <thead>
                    <tr>
                        <th>Documento</th>
                        <th>Nombre</th>
                        <th>Especialidad</th>
                        <th>Telefono</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $technician['document'] }}</td>
                            <td>{{ $technician['name'] }}</td>
                            <td>{{ $technician['especiality'] }}</td>
                            <td>{{ $technician['phone'] }}</td>
                        </tr>
                </tbody>
            </table>
            <br>
            <hr>
            <h3>Actividades</h3>
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Descripción</th>
                        <th>Horas</th>
                        <th>Tipo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activities as $activity)
                    <tr>
                        <td>{{ $activity['id'] }}</td>
                        <td>{{ $activity['description'] }}</td>
                        <td>{{ $activity['hours'] }}</td>
                        <td>
                            @if ($activity->type_activity)
                                {{ $activity->type_activity->description }}
                            @else
                                Tipo de actividad no definido
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h5>No Existen Actividades por Técnico</h5>
        @endif
    </section>
@endsection
