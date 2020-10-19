<html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<head>
    <title>Abejas - Gestión AgroBee Chile</title>
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
                    <h2>Postura Abeja ID: {{$abeja->id}}</h2>
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
                        <td class="text_small">{{$abeja->id}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Empresa:</th>
                        <td class="text_small">{{$abeja->Empresa->nombre}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Tipo de Contrato:</th>
                        <td class="text_small">{{$abeja->tipo_contrato}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Encargado de campo:</th>
                        <td class="text_small">{{$abeja->Encargado->name}}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Fecha de postura:</th>
                        <td class="text_small">@if($abeja->fecha_postura != NULL || $abeja->fecha_postura != '' ){{Carbon\Carbon::parse($abeja->fecha_postura)->format('d/m/Y')}}@endif</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Sector de Polinización</th>
                        <td class="text_small">{{ $abeja->sector_polinizacion }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Tipo de colmena</th>
                        <td class="text_small">{{ $abeja->tipo_colmena }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Cantidad de colmenas</th>
                        <td class="text_small">{{ $abeja->cantidad_colmenas }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Cultivo</th>
                        <td class="text_small">{{ $abeja->cultivo }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Observaciones</th>
                        <td class="text_small">{{ $abeja->observaciones }}</td>
                    </tr>
                    <tr>
                        <th class="titulo_unidad">Responsable de entrega</th>
                        <td class="text_small">{{ $abeja->responsable_entrega }}</td>
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