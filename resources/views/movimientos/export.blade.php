<table>
    <thead>
        <tr>
            <th>ID Orden de Compra</th>
            <th>Unidad de medida</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Valor OC</th>
            <th>N° Factura</th>
            <th>Fecha Factura</th>
            <th>Valor Factura</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($cantidades as $cantidad )
            <tr>
                <td>{{$cantidad->movimiento->id_oc}}</td>
                <td>{{$cantidad->unidadmedida->unidad}}</td>
                <td>{{$cantidad->cantidad}}</td>
                <td>${{$cantidad->valor_unitario}}</td>
                <td>Pronto</td>
                <td>{{$cantidad->movimiento->nmr_factura}}</td>
                <td>{{$cantidad->movimiento->fecha_factura}}</td>
                <td>{{$cantidad->movimiento->valor_factura}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
