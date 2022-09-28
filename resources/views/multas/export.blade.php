<table>
    <thead>
        <tr>
            <th>Proveedor</th>
            <th>N° Memorandum</th>
            <th>N° Oficio</th>
            <th>Fecha Notificacion</th>
            <th>N° Resolución Exenta (D)</th>
            <th>Fecha Resolución Exenta (D)</th>
            <th>Estado de Trámite</th>
            <th>Estado Pago Multa</th>
            <th>Forma Pago</th>
            <th>Institución Financiera</th>
            <th>N° Documento</th>
            <th>Fecha</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($multas as $multa)

            <tr>
                <td>{{ $multa->contrato->proveedor->nombre_proveedor }}</td>
                <td>{{ $multa->nmr_memo_informe }}</td>
                <td>{{ $multa->nmr_oficio }}</td>
                <td>{{ $multa->fecha_notificacion }}</td>
                <td>{{ $multa->nmr_res_exenta }}</td>
                <td>{{$multa->fecha_res_exenta }}</td>
                <td>{{ $multa->estadotramitemulta->estado_tramite }}</td>
                <td>{{ $multa->estadopagomulta->estado_pago }}</td>
                <td>Por definir</td>
                <td>Por definir</td>
                <td>{{ $multa->nmr_factura }}</td>
                <td>{{ $multa->fecha_comprobante }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
