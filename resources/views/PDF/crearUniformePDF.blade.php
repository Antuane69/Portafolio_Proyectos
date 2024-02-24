<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css" media="all">
        body {
            width: 100%;
            height: 100%;
            border: 80mm;
            font-family: Arial, Helvetica, sans-serif;
            font: 12pt 'sans-serif';
            max-width: 100%;

        }
        * {
            font-family: 'sans-serif';
            box-sizing: border-box;
            -moz-box-sizing: border-box;
        }

        @media print {
            html,
            body {
                width: 200mm;
                height: 250mm;
            }
        }

        table {
            margin-left: auto;
            margin-right: auto;
            text-transform:uppercase;
        }
        
        .pdf-image {
            width: 200px; /* Ancho deseado en píxeles o porcentaje */
            height: auto; /* Altura automática para mantener la proporción original */
        }

        .pdf-image2 {
            width: 100px; /* Ancho deseado en píxeles o porcentaje */
            height: auto; /* Altura automática para mantener la proporción original */            
        }
    </style>
</head>
<body>
<table style="height:900px; border:1px solid black; margin-left:auto; margin-right:auto;margin-top:6mm;margin-bottom:auto;padding:3px;border-spacing:20px;">
    <tr>
        <table style="margin-left:auto; margin-right:auto; width:660px">
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <tr>
                <td style="text-align:left;font-size:11;margin-left:10%;" colspan="2">
                    <div style="visibility: hidden; display:inline">......</div>
                    Guadalajara, Jalisco</td>
                <td colspan="2"></td>
                <td style="text-align:right;">
                    <img style="margin-left: 100px" src="{{ public_path('assets/tokyoLogo.png') }}" width="80" height="80"> 
                </td>
            </tr>
            <tr>
                <td style="text-align:left;font-size:11;margin-left:10%;text-decoration: underline;" colspan="2">
                    <div style="visibility: hidden; display:inline">......</div>
                    Fecha: {{$fecha_actual}}</td>
                <td style="text-align:center;" colspan="2"></td>
                <td style="text-align:center;"></td>
            </tr>
            <p></p>
            <p></p>
            <tr style="text-align:center;font-size:12px;font-weight: bold;">
                <td style="text-align:center;" colspan="5">
                    Nombre: {{$uniforme->empleado->nombre}}
                </td>
            </tr>
        </table>
        <p></p>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:680px;border-collapse:collapse;">
            <tr style="border: 1px solid #262626;background-color: #A2E4FF;">
                <th style="width: 30%; font-size:11;border: 1px solid #262626;border-bottom: 1px solid #262626">CÓDIGO DE ARTÍCULO</th>
                <th style="width: 18%; font-size:11;border: 1px solid #262626;border-bottom: 1px solid #262626">DESCRIPCIÓN</th>
                <th style="width: 18%; font-size:11;border: 1px solid #262626;border-bottom: 1px solid #262626">CANTIDAD</th>
                <th style="width: 17%; font-size:11;border: 1px solid #262626;border-bottom: 1px solid #262626">PRECIO</th>
                <th style="width: 17%; font-size:11;border: 1px solid #262626;border-bottom: 1px solid #262626">TOTAL</th>
                <th style="width: 17%; font-size:11;border: 1px solid #262626;border-bottom: 1px solid #262626">DESCUENTO DE NOMINA</th>
                <p></p>
            </tr>
            <p></p>
            <tr style="text-align:center;font-size:11px;border: 1px solid #262626;">   
                <td style="font: bold;text-align:center;border: 1px solid #262626;">{{$uniforme->codigo}}</td>
                <td style="font: bold;text-align:center;border: 1px solid #262626;">{{$stock->descripcion}}</td>
                <td style="font: bold;text-align:center;border: 1px solid #262626;">{{$uniforme->cantidad}}</td>
                <td style="font: bold;text-align:center;margin-left:50%;border: 1px solid #262626;">${{$stock->precio}}</td>
                <td style="font: bold;text-align:center;border: 1px solid #262626;">${{$uniforme->total}}</td>
                <td style="font: bold;text-align:center;border: 1px solid #262626;">${{$nomina}}</td>
                <p></p>
            </tr>
            <tr>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <p></p>
            </tr>
            <tr style="text-align:center;font-size:12px;">   
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;"></td>
                <td style="border: 1px solid #262626;">GRAN TOTAL: </td>
                <td style="border: 1px solid #262626;">${{$uniforme->total}}</td>
                <td style="font: bold;text-align:center;border: 1px solid #262626;">${{$nomina}} </td>
                <p></p>
            </tr>
        </table>
    </tr>
    <p></p>
    <p></p>
    <p></p>
    <tr>
        <td style="font:bold;font-size:9;text-align:justify" colspan="3">
            "Recibi del patron LUIS SANCHEZ DE LA VEGA CASRTELLANOS, por concepto de HERRAMIENTA Y/O  EQUIPO DE TRABAJO  los cuales me obliga a usar diariamente en el desarrollo de mis labores. Los mismos que recibo en buen estado  y me obligo en los términos de los Articulos 134 Fraccion III Y IX de la Ley Federal del Trabajo a conservarlos su buen estado y utilizarlos para lo ques están destinados dentro de las condiciones de trabajo y a restituirlos cuando me sean canjeados o que el patron me los requiera.
            CONDICIONES DE ENTREGA: 
            1. Se retendra  de la nomina el 50% de costo total de la prenda (Usada o nueva)repartido en  2 quincenas. Dicho descuento se quedara como deposito
            2. Al terminar la relacion labral,  regresar las prendas en buen estado a Recursos Humanos  para la devolucion del monto retenido
            3. En caso de NO regresar los uniformes sera descontado el otro 50% del total del uniforme. Aplica solo uniformes entregados en un periodo menor a 1 año"					                      
        </td>
    </tr>
    <p></p>
    <p></p>
    <tr>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:670px;border-collapse:collapse;font-size:11px">
            <tr style="font-weight: bold;">
                <th style="width:35%;text-align:center;height:20px" colspan="2">RECIBIÓ</th>
                <th style='width:30%;visibility: hidden;'></th>
                <th style="width:35%;text-align:right;height:20px;margin-left:10%" colspan="2">SELLO Y FIRMA DE RECURSOS HUMANOS</th>
            </tr>
            <tr style="font-weight: bold;">
                <td colspan="2">
                    NOMBRE: <div style="text-decoration: underline; display: inline;">{{$uniforme->empleado->nombre}}</div>
                </td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <p></p>
            <tr style="font-weight: bold;">
                <td style="border-bottom:0.5px solid black;" colspan="2"></td>
                <td></td>
                <td style="border-bottom:0.5px solid black;" colspan="2"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="text-align: center" colspan="2">FIRMA(s)</td>
                <td></td>
                <td style="text-align: center" colspan="2">FIRMA</td>
            </tr>
        </table>
    </tr>
</table>
</body>

</html>