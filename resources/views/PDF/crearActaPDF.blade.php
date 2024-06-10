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
                <td style="text-align:left;">
                    <img style="margin-right: 100px" src="{{ public_path('assets/tokyoLogo.png') }}" width="80" height="80"> 
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:680px;border-collapse:collapse;">
            <tr>
                @if ($tipo == 'Falta de Segundo Grado')
                    <th style="font-size:12;text-align:center;font: bold" colspan="3">ACTA ADMINISTRATIVA</th>
                @else
                    <th style="font-size:12;text-align:center;font: bold" colspan="3">ACTA DE AMONESTACIÓN</th>
                @endif
                <p></p>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    En la ciudad de Guadalajara, Jalisco, en la Sucursal López Cotilla siendo la fecha y hora actuales {{$fecha}}; se reunieron en la sucursal 
                    Guadalajara las siguientes personas: <div style="font-weight: bold; display: inline;">LUIS SANCHEZ DE LAVEGA CASTELLANOS</div> en su carácter de Patrón y 
                    <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$testigo1}} @if ($testigo2 != '' && $testigo3 != '')
                        , {{$testigo2}} y {{$testigo3}} @elseif ($testigo2 != '') y {{$testigo2}}
                    @endif 
                        </div> en su calidad de testigos, con objeto de levantar la presente acta administrativa de investigación de los hechos que se le 
                    imputan al trabajador de esta empresa Sr. (a) 
                    <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$empleado->nombre}}</div>.                    
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="2">
                    Los hechos que se le imputan al trabajador mencionado, son los siguientes:
                </td>
                <td></td>
            </tr>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">
                        {{$tipo}},
                    </div> estipulada en el reglamento interior de trabajo, el cual menciona lo siguiente: 
                </td>
            </tr>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="2">
                    <div style="font-weight: bold; display: inline;">{{$falta}}.</div>
                </td>
                <td></td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                {{-- <td style="text-align:justify;" colspan="3">
                    De acuerdo al reglamento las faltas pueden son constitutivas de la siguiente sanción la cual consiste en LA
                    SUSPENSIÓN DE 3 DÍAS DE TRABAJO sin goce de sueldo y recepción de propinas a partir de la fecha {{$fecha_inicio}}
                    hasta la fecha {{$fecha_fin}}, el Patrón y los testigos se trasladaron al área de la empresa en este caso al área de
                    {{$area}} para que quede asentado que el empleado(a) <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$empleado->nombre}}</div> efectivamente no se presentó en la fecha <div style="font-weight: bold; display: inline;">{{$empleado->fecha_solicitud}} el horario de {{$horario}} horas </div>.
                </td> --}}
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">
                        Los hechos ocurridos fueron los siguientes:
                    </div> {{$hechos}}.
                </td>
            </tr>
            <p></p>
            @if ($testigo1 != '')                
                <tr style="font-size:11px;">   
                    <td style="text-align:justify;" colspan="3">
                        Se interroga al primer testigo <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$testigo1}} </div>, el cual afirma que <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$empleado->nombre}}</div> incumplió el reglamento.
                    </td>
                </tr>
            @endif
            @if ($testigo2 != '')                
                <tr style="font-size:11px;">   
                    <td style="text-align:justify;" colspan="3">
                        Se interroga al segundo testigo <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$testigo2}}</div>, el cual afirma que <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$empleado->nombre}}</div> incumplió el reglamento.
                    </td>
                </tr>
            @endif
            @if ($testigo3 != '')                
                <tr style="font-size:11px;">   
                    <td style="text-align:justify;" colspan="3">
                        Y por último se interroga a <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$testigo3}}</div> que confirma que <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$empleado->nombre}}</div> incumplió el reglamento.
                    </td>
                </tr>
            @endif
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    Siendo lo anterior se da por terminada la siguiente investigación, levantando la presente acta para que quede
                    constancia del hecho antes mencionado y que en este caso el Patrón de López Cotilla 2009 determine la resolución
                    del presente caso conforme al reglamento interior de trabajo.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    El presente documento leído que les fue a los asistentes, la ratifican en todas sus partes, firmando en el lugar de
                    trabajo para constancia y los efectos legales del caso siendo la fecha y hora actuales <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$fecha}}</div> en que se actúa.
                </td>
            </tr>
            <p></p>
        </table>
    </tr>
    <p></p>
    <p></p>
    <tr>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:670px;border-collapse:collapse;font-size:10px">
            <tr style="font-weight: bold;">
                <td style="width:30%;text-align:center">TRABAJADOR(A)</td>
                <td></td>
                <td style="width:30%;text-align:center">PATRÓN DE LA EMPRESA</td>
                <td></td>
                <td style="width:30%;text-align:center">COORDINADOR DEL ÁREA</td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="border-bottom:0.5px solid black;"></td>
                <td></td>
                <td style="border-bottom:0.5px solid black;"></td>
                <td></td>
                <td style="border-bottom:0.5px solid black;"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="text-align: center">FIRMA</td>
                <td></td>
                <td style="text-align: center">FIRMA</td>
                <td></td>
                <td style="text-align: center">FIRMA</td>
            </tr>
            <p></p>
            <p></p>
            <tr style="font-weight: bold;">
                @if ($testigo1 != '')
                    <td style="width:30%;text-align:center">Testigo 1</td>
                    <td></td>
                @endif
                @if ($testigo2 != '')                    
                    <td style="width:30%;text-align:center">Testigo 2</td>
                    <td></td>
                @endif    
                @if ($testigo3 != '')
                    <td style="width:30%;text-align:center">Testigo 3</td>
                @endif
            </tr>
            <tr style="font-weight: bold;">
                @if ($testigo1 != '')
                    <td style="border-bottom:0.5px solid black;"></td>
                    <td></td>
                @endif
                @if ($testigo2 != '')                    
                    <td style="border-bottom:0.5px solid black;"></td>
                    <td></td>
                @endif    
                @if ($testigo3 != '')
                    <td style="border-bottom:0.5px solid black;"></td>
                @endif
            </tr>
            <tr style="font-weight: bold;">
                @if ($testigo1 != '')
                    <td style="text-align: center">FIRMA</td>
                    <td></td>
                @endif
                @if ($testigo2 != '')                    
                    <td style="text-align: center">FIRMA</td>
                    <td></td>
                @endif    
                @if ($testigo3 != '')
                    <td style="text-align: center">FIRMA</td>
                @endif
            </tr>
        </table>
    </tr>
</table>
</body>

</html>