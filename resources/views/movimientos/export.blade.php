<table>
    <thead>
        <tr>
            <th>Establecimiento</th>
            <th>Dispositivo</th>
            <th>ID Orden de Compra</th>
            <th>Unidad de medida</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Valor OC</th>
            <th>N° Factura</th>
            <th>Fecha Factura</th>
            <th>Valor Factura</th>
            <th>Monto Consumido</th>
            <th>Saldo Disponible</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cantidades as $cantidad )
            <tr>
                @if ($cantidad->movimiento->establecimiento == NULL)
                    <td></td>
                @else
                    <td>{{$cantidad->movimiento->establecimiento->establecimiento}}</td>
                @endif
                @if ($cantidad->movimiento->dispositivo == NULL)
                    <td></td>
                @else
                    <td>{{$cantidad->movimiento->dispositivo->nombre_dispositivo}}</td>
                @endif
                <td>{{$cantidad->movimiento->id_oc}}</td>
                <td>{{$cantidad->unidadmedida->unidad}}</td>
                <td>{{$cantidad->cantidad}}</td>
                <td>${{$cantidad->valor_unitario}}</td>
                <td>${{$cantidad->cantidad * $cantidad->valor_unitario}}</td>
                <td>{{$cantidad->movimiento->nmr_factura}}</td>
                <td>{{$cantidad->movimiento->fecha_factura}}</td>
                <td>${{$cantidad->movimiento->valor_factura}}</td>
                <td>${{$cantidad->valor_unitario * $cantidad->cantidad}}</td>
                <td>${{$cantidad->movimiento->monto_contrato_actualizado}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
