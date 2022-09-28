<table>
    <thead>
        <tr>
            <th>ID Proceso Compra</th>
            <th>Convenio</th>
            <th>Fecha Vigencia</th>
            <th>Valor Contrato</th>
            <th>Saldo Contrato</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($saldos as $saldo )
            <tr>
                <td>{{$saldo->contrato->convenio->id_licitacion}}</td>
                <td>{{$saldo->contrato->convenio->convenio}}</td>
                <td>{{$saldo->contrato->convenio->vigencia_fin}}</td>
                <td>${{$saldo->contrato->monto->moneda}}</td>
                <td>{{$saldo->monto_contrato_actualizado}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
