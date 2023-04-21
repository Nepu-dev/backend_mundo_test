<!DOCTYPE html>
<html>
    <head>
        <title>Listado de marcas</title>
    </head>
    <body>
        <h1>Listado de marcas</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                </tr>
            </thead>
            <tbody>
                @foreach($marcas as $marca)
                    <tr>
                        <td>{{ $marca->id }}</td>
                        <td>{{ $marca->nombre }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </body>
</html>
