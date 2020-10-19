<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    <title>Aplicaciones - Gestión AgroBee Chile</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
            font-size: x-small
        }
        body {
            margin: 2cm 1cm 1cm;
        }
        header {
            position: fixed;
            top: 1cm;
            left: 2cm;
            right: 2cm;
            height: 2cm;
            background-color: #fff;
            color: black;
            line-height: 100%;
        }
        img.logo {
            height: 1.58 cm;
        }
        footer {
            position: fixed;
            bottom: 0cm;
            left: 1cm;
            right: 1cm;
            height: 3cm;
            background-color: #fff;
            color: black;
            text-align: right;
            line-height: 100%;
        }
        div.absolute {
            position: absolute;
            padding: 1px 5px 5px 5px;
            text-align: left;
            vertical-align: middle;
            line-height: 50%;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
        h3 {
            color: #008000;
            padding: 1px;
            margin: 7px;
        }
        h4 {
            color: #008000;
            padding: 1px;
            margin: 5px;
        }
        table.borde {
            border: 0.5pt solid black;
            padding: 1px;
        }
        td,
        th {
            height: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        td.text_small {
            font-size: small;
            border: 0.5pt solid black;
            line-height: 10px;
        }
        th.titulo_unidad {
            border: 0.5pt solid black;
            font-size: small;
            line-height: 10px;
        }
        th.top {
            border-top: 0.9pt solid black !important;
        }
        td.top {
            border-top: 0.9pt solid black !important;
        }
    </style>
    </head>

<body>
    <header>
        <table>
            <tr>
                <td>
                <td><img class="logo" src="img/agrobee_logo.png" alt="logo_agrobee"></td>
                </td>
                <td>
                    <h2>Aplicación ID: {{$aplicacion->id}}</h2>
                </td>
            </tr>
        </table>
    </header>
    <main>
    <div class="absolute left" style="top: 80px; left: 40px; width: 600px; height: 500px;">
    <table class="borde">
                <tbody>
                    <tr>
                        <th class="titulo_unidad">ID:</th>
                        <td class="text_small">{{$aplicacion->id}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Empresa:</th>
                        <td class="text_small">{{$aplicacion->Empresa->nombre}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Encargado de campo:</th>
                        <td class="text_small">{{$aplicacion->Encargado->name}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Fecha de Aplicación:</th>
                        <td class="text_small">@if($aplicacion->fecha_aplicacion != NULL || $aplicacion->fecha_aplicacion != '' ){{Carbon\Carbon::parse($aplicacion->fecha_aplicacion)->format('d/m/Y')}}@endif</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Tipo de maquinaria</th>
                        <td class="text_small">{{ $aplicacion->tipo_maquinaria }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Nombre del producto:</th>
                        <td class="text_small">{{ $aplicacion->nombre_producto }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Dosis:</th>
                        <td class="text_small">{{ $aplicacion->dosis }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Cantidad de agua aplicada:</th>
                        <td class="text_small">{{ $aplicacion->cantidad_agua }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Cantidad de Hectáreas (HA):</th>
                        <td class="text_small">{{ $aplicacion->cantidad_hectareas }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

<footer>
    <table align="right" style="border-style: none;">
        <tr>
            <td style="text-align: right; border-style: none;">Agrobee Chile</td>
        </tr>
    </table>
</footer>
</body>

</html>