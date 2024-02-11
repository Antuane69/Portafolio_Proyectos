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
        <table style="margin-left:auto; margin-right:auto; width:max-content">
            <tr>
                <td style="text-align:center;">
                    <img class="cfe-image" src="{{ public_path('assets/cfeFormato.png') }}" width="150" height="45"> 
                </td>
                <th style="text-align:left;font-size:11;margin-left:10%;" colspan="2">
                    <div style="visibility: hidden; display:inline">......</div>
                    COMISIÓN FEDERAL DE ELECTRICIDAD</th>
                <th style="text-align:center;">
                    <img class="cfe-image" src="{{ public_path('assets/carroformato.png') }}" width="100" height="50"> 
                </th>
            </tr>
            <p></p>
            <tr>
                <td></td>
                <td style="text-align:left;font-weight: bold;font-size:10;margin-bottom:8;margin-left:50px" colspan='2'>
                    <div style="visibility: hidden; display:inline">....</div>
                    FORMATO ENTREGA - RECEPCIÓN VEHICULOS</td>
                <td style="text-align:center;"></td>
            </tr>
            <p></p>
            <tr style="text-align:center;font-size:8px;font-weight: bold;">
                <td style="text-align:center;font-size:8px;"></td>
                <td style="text-align: left;font-size:8px;">
                    <div style="visibility: hidden; display:inline">...........</div>
                    NO. ECO. <div style="text-decoration: underline; display: inline;text-align:right;margin-left:57px">{{$formato->economico}}</div>
                </td>
                <td style="text-align: right;font-size:8px;">
                    Fecha: <div style="text-decoration: underline; display: inline;">{{$formato->fecha_solicitud}}</div>
                    <div style="visibility: hidden; display:inline">......</div>
                </td>
            </tr>
            <tr style="text-align:center;font-size:8px;font-weight: bold;">
                <td style="text-align:center;"></td>
                <td style="text-align: left;font-size:8px;">
                    <div style="visibility: hidden; display:inline">...........</div>
                    Placas. <div style="text-decoration: underline; display: inline;text-align:right;margin-left:59px">{{$vehiculos->Placa}}</div>
                </td>
                <td style="text-align:center;"></td>
            </tr>
            <tr style="text-align:center;font-size:8px;font-weight: bold;">
                <td></td>
                <td style="text-align: left;font-size:8px;">
                    <div style="visibility: hidden; display:inline">...........</div>
                    Modelo. <div style="text-decoration: underline; display: inline;text-align:right;margin-left:56px">{{$vehiculos->Modelo}}</div>
                </td>
                <td style="text-align:center;"></td>
            </tr>
            <tr style="text-align:center;font-weight: bold;">
                <td style="text-align:center;"></td>
                <td style="text-align:center;"></td>
                <td style="text-align:center;"></td>
            </tr>
            <tr style="text-align:center;font-weight: bold;">
                <td style="text-align: center;font-size:7">
                    KM: <div style="text-decoration: underline; display: inline;">{{$formato->km}}</div>
                </td>
                <td style="text-align:center;"></td>
                <td style="text-align:center;"></td>
            </tr>
            <tr style="text-align:center;font-weight: bold;">
                <td style="text-align:center;font-size:5">(a la entrega del vehículo)</td>
                <td style="text-align:center;"></td>
                <td style="text-align:center;"></td>
            </tr>
            <tr style="text-align:center;font-weight: bold;">
                <td style="text-align: center;font-size:7px">
                    SOCIEDAD: <div style="text-decoration: underline; display: inline;">{{$formato->zona}}</div>
                </td>
                <td style="text-align: center;font-size:7px">
                    DIVISIÓN: <div style="text-decoration: underline; display: inline;">{{$formato->area}}</div>
                </td>
                <td style="text-align: left;font-size:6px">
                    CENTRO DE COSTO: <div style="text-decoration: underline; display: inline;">{{$formato->subarea}}</div>
                </td>
            </tr>
        </table>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:600px;border-collapse:collapse;">
            <tr style="black">
                <th style="width: 25%; font-size:7"></th>
                <th style="width: 10%; font-size:6">B</th>
                <th style="width: 10%; font-size:6">R</th>
                <th style="width: 10%; font-size:6">M</th>
                <th style="width: 25%; font-size:7">HERRAMIENTA</th>
                <th style="width: 10%; font-size:6">Si</th>
                <th style="width: 10%; font-size:6">No</th>
            </tr>
            <tr style="text-align:center;font-size:8px;">
                <td style="height: 20px;">Parrilla</td>
                @if ($formato->parrilla == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->parrilla == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->parrilla == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Llanta Refaccion</td>
                @if ($formato->llanta_refaccion == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td> 
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->llanta_refaccion == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td> 
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;">
                <td style="height: 20px;">Calaveras Traseras</td>
                @if ($formato->calaveras_traseras == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->calaveras_traseras == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->calaveras_traseras == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td>
                    Gato <div style="text-decoration: underline; display: inline;">{{$formato->gato_ton}}</div> Ton.
                </td>
            </tr>
            <tr style="text-align:center;font-size:8px;">
                <td style="height: 20px;">Parabrisas</td>
                @if ($formato->parabrisas == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->parabrisas == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->parabrisas == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Llave Ruedas</td>
                @if ($formato->llave_ruedas == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->llave_ruedas == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;">    
                <td style="height: 20px;">Cristales</td>
                @if ($formato->cristales == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->cristales == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->cristales == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Señalamientos</td>
                @if ($formato->senalamientos == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->senalamientos == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;"> 
                <td style="height: 20px;">Espejos</td>
                @if ($formato->espejos == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->espejos == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->espejos == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Extinguidor Vigente</td>
                @if ($formato->extinguidor == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->extinguidor == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;">
                <td style="height: 20px;">Tablero</td>
                @if ($formato->tablero == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->tablero == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->tablero == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Tarjeta Circulación</td>
                @if ($formato->tarjeta_circulacion == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->tarjeta_circulacion == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;">
                <td style="height: 20px;">Aire Acondicionado</td>
                @if ($formato->aire_acondicionado == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->aire_acondicionado == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->aire_acondicionado == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Placas Chequeo</td>
                @if ($formato->placas_chequeo == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->placas_chequeo == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;">
                <td style="height: 20px;">Cinturon Seguridad</td>
                @if ($formato->cinturon_seguridad == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->cinturon_seguridad == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->cinturon_seguridad == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Poliza Seguro</td>
                @if ($formato->poliza_seguro == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->poliza_seguro == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;">    
                <td style="height: 20px;">Llantas</td>
                @if ($formato->llantas == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->llantas == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->llantas == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Estereo</td>
                @if ($formato->estereo == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->estereo == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;"> 
                <td style="height: 20px;">Tapiceria</td>
                @if ($formato->tapiceria == 'Bueno')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->tapiceria == 'Regular')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->tapiceria == 'Malo')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                <td style="height: 20px;">Radio Bandacivil</td>
                @if ($formato->radio_bandacivil == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->radio_bandacivil == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
            <tr style="text-align:center;font-size:8px;"> 
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="height: 20px;">Gato</td>
                @if ($formato->gato == 'Si')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
                @if ($formato->gato == 'No')
                    <td style="font: bold; font-size:10px">[X]</td>
                @else
                    <td>[                    ]</td>
                @endif
            </tr>
        </table>
    </tr>
    <tr>
        <td style="text-align: left;font-size:7;" colspan="3">
            OBSERVACIONES: <div style="text-decoration: underline; display: inline;">{{$formato->observaciones}}</div>
        </td>
    </tr>
    <tr>
        <table style=" black;margin-left:auto; margin-right:auto;border-collapse:collapse;">
            <tr class="justify-between flex">
                <td class="justify-between flex">
                    <img class="pdf-image" src="{{public_path('assets/vehidan1.jpg')}}"> 
                    <p style="font-size:6;margin-left: 20px">Marcar partes dañadas (en su caso)</p>   
                </td>
                <td>
                    <img class="cfe-image" style="margin-left: 146px" src="{{ public_path('assets/gasolinaformato.png') }}" width="80" height="45"> 
                    <p style="font-size:6;margin-left: 123px">Indicar nivel de Gasolina</p>
                </td>
            </tr>
        </table>
    </tr>
    <tr>
        <table style="width:550px;margin-left:auto;margin-right:auto;font-size:8px">
            <tr style="font-weight: bold;">
                <th style="width:35%;text-align:center;height:20px">ENTREGÓ (Vehículos)</th>
                <th style='width:30%'></th>
                <td></td>
            </tr>
            <tr style="font-weight: bold;">
                <td>
                    NOMBRE: <div style="text-decoration: underline; display: inline;">{{$formato->nombre_administrador}}</div>
                </td>
                <td></td>
                <td style="border-bottom:0.5px solid black;"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td>
                    R.P.E: <div style="text-decoration: underline; display: inline;">{{$formato->adm_rpe}}</div>
                </td>
                <td></td>
                <td style="text-align: center">FIRMA</td>
            </tr>
            <p></p>
            <tr style="font-weight: bold;">
                <th style="width:35%;text-align:center;height:20px">RECIBIÓ (Usuario)</th>
                <td></td>
                <td></td>
            </tr>
            <tr style="font-weight: bold;">
                <td colspan="2">
                    NOMBRE: <div style="text-decoration: underline; display: inline;">{{$formato->nombre_solicitante}}</div>
                </td>
                <td style="border-bottom:0.5px solid black;"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td></td>
                <td></td>
                <td style="text-align: center">FIRMA</td>
            </tr>
        </table>
    </tr>
    <div style="font-size: 8px;margin:0px; text-align:center;">
        <p style="margin:1px;">NOTA: EL VEHICULO SE ENTREGA AL SOLICITANTE DEL SERVICIO EN LAS CONDICIONES EN LAS QUE FUE ENTREGADO.</p>
        <p style="margin:1px;">ESTA ACEPTADO ESTE FORMATO, EN CASO DE QUE LA UNIDAD NO SEA DEVULETA EN LAS CONDICIONES ENTREGADAS.</p>
    </div>
</table>
</body>

</html>