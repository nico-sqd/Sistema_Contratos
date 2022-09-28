<table>
    <thead>
        <tr>
            <th>ID Proceso Compra</th>
            <th>Convenio</th>
            <th>Vigencia Fin</th>
            <th>Referente</th>
            <th>Proveedor</th>
            <th>ID Contrato</th>
            <th>Resolución Adjudicación</th>
            <th>Resolución Contrato</th>
            <th>Documento Garantía</th>
            <th>Institución Financiera</th>
            <th>N° Documento</th>
            <th>Monto Documento Garantía</th>
            <th>Moneda Documento Garantía</th>
            <th>Fecha Vencimiento</th>
            <th>Gestor</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contratos as $contrato )
            @foreach ($boletas as $boleta )
                @if ($contrato->id == $boleta->id_contrato_original)
                    <tr>
                        <td>{{ $contrato->convenio->id_licitacion }}</td>
                        <td>{{ $contrato->convenio->convenio }}</td>
                        <td>{{ $contrato->convenio->vigencia_fin }}</td>
                        <td>{{ $contrato->convenio->user->name }}</td>
                        <td>{{ $contrato->convenio->proveedor->nombre_proveedor }}</td>
                        <td>{{ $contrato->id_contrato }}</td>
                        <td>{{ $contrato->res_adjudicacion }}</td>
                        <td>{{ $contrato->res_apruebacontrato }}</td>
                        <td>{{ $contrato->boletagarantia->documentos_garantia }}</td>
                        <td>{{ $boleta->institucion }}</td>
                        <td>{{ $boleta->id_boleta}}</td>
                        <td>{{ $boleta->monto_boleta}}</td>
                        <td>{{ $contrato->tipomoneda->Nombre_tipo}}</td>
                        <td>{{ $boleta->fecha_vencimiento}}</td>
                        <td>{{ $contrato->convenio->admin }}</td>
                    </tr>
                @endif
            @endforeach
        @endforeach
    </tbody>
</table>
