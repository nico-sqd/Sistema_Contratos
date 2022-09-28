<table>
    <thead>
        <tr>
            <th>Proveedor</th>
            <th>Rut Proveedor</th>
            <th>Representante Legal</th>
            <th>Rut Representante Legal</th>
            <th>Correo</th>
            <th>Teléfono</th>
            <th>Dirección</th>
            <th>Comuna</th>
            <th>Región</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($proveedores as $proveedor )
            <tr>
                <td>{{ $proveedor->nombre_proveedor }}</td>
                <td>{{ $proveedor->rut_proveedor }}</td>
                <td>{{ $proveedor->representante }}</td>
                <td>{{ $proveedor->rut_representante }}</td>
                <td>{{ $proveedor->mail_representante }}</td>
                <td>{{ $proveedor->telefono_representante }}</td>
                <td>{{ $proveedor->direccion->direccion}}</td>
                <td>{{ $proveedor->direccion->comuna }}</td>
                <td>{{ $proveedor->direccion->region }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
