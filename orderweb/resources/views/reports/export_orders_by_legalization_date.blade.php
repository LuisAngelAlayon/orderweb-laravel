@extends('templates.base_reports')

@section('header', 'Reporte de Órdenes por Rango de Fechas')

@section('content')

    <section id="results">
        @if ($orders)
            <h3>Órdenes por Rango de Fechas</h3>
            <table id="ReportTable">
                <thead>
                    <tr>
                        <th>Orden</th>
                        <th>Fecha de Legalización</th>
                        <th>Descripción de la Causal</th>
                        <th>Observación</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orders as $order)
                        <tr>
                            <td>{{ $order['id'] }}</td>
                            <td>{{ $order['legalization_date'] }}</td>
                            <td>{{ $order->causal->description }}</td>
                            <td>{{ $order->observation->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </section>

@endsection
