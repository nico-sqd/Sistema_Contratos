<table>
    <thead>
        <tr>
            <th>Solicitante</th>
            <th>ID Proceso de Compra</th>
            <th>Documento Garantía</th>
            <th>Institución Financiera</th>
            <th>N° Documento</th>
            <th>Monto Documento Garantía</th>
            <th>Moneda Documento Garantía</th>
            <th>Fecha Vencimiento</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($boletagarantias as $boleta)
            <tr>
                <td>{{ $boleta->contrato->proveedor->nombre_proveedor }}</td>
                <td>{{ $boleta->contrato->convenio->id_licitacion }}</td>
                <td>{{ $boleta->boletagarantia->documentos_garantia }}</td>
                <td>{{ $boleta->institucion }}</td>
                <td>{{ $boleta->id_boleta }}</td>
                <td>${{$boleta->monto_boleta }}</td>
                <td>{{ $boleta->tipomoneda->Nombre_tipo }}</td>
                <td>{{ $boleta->fecha_vencimiento }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
