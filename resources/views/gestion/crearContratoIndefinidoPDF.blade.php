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
<table style="height:850px; border:1px solid black; margin-left:auto; margin-right:auto;margin-top:6mm;margin-bottom:auto;padding:3px;border-spacing:20px;">
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
                @if ($titulo == 'Contrato de 30 Dias')
                    <th style="font-size:12;text-align:center;" colspan="3">CONTRATO INDIVIDUAL DE TRABAJO POR TIEMPO INDEFINIDO</th>
                @else
                <th style="font-size:12;text-align:center;font: bold" colspan="3">ACTA DE AMONESTACIÓN</th>
                @endif
                <p></p>
            </tr>
            <tr>
                <td style="font-size:10;text-align:center;font-weight: bold" colspan="3">1er CONTRATO</td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    CONTRATO INDIVIDUAL DE TRABAJO que de acuerdo a los artículos 35 y 39-a de la ley federal de trabajo,
                    celebran por una parte <div style="font-weight: bold; display: inline;">“EL PATRON” LUIS SANCHEZ DE LA VEGA CASTELLANOS </div>, con domicilio
                    principal : LÓPEZ COTILLA 2009 COL. ARCOS VALLARTA, GUADALAJARA JALISCO y por la otra parte por
                    su propio derecho comparece <div style="font-weight: bold; display: inline;">“EL TRABAJADOR” {{$empleado->nombre}} </div>de nacionalidad
                    <div style="font-weight: bold; display: inline;">{{$empleado->nacionalidad}}</div>, estado civil <div style="font-weight: bold; display: inline;">{{$empleado->estado_civil}}</div> de <div style="font-weight: bold; display: inline;">{{$empleado->edad}}</div> años de edad, sexo <div style="font-weight: bold; display: inline;">{{$empleado->sexo}}</div>, con domicilio en calle 
                    <div style="font-weight: bold; display: inline;">{{$empleado->domicilio}}</div>, GUADALAJARA JALISCO.                  
                </td>
            </tr>
            <tr>
                <td style="font-size:12px;text-align:center;font-weight: bold" colspan="3">
                    Clausulas:
                </td>
            </tr>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">PRIMERA. “EL PATRON”</div>, contratará a <div style="font-weight: bold; display: inline;">“EL TRABAJADOR”</div> para que bajo su dirección y dependencia
                    preste sus servicios personales como <div style="font-weight: bold; display: inline;text-transform: uppercase;">{{$empleado->puesto}}</div> debiendo desempeñarse en el domicilio de la fuente de trabajo.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">SEGUNDA. “EL TRABAJADOR” </div>obliga a prestar sus servicios personales por un período de 
                    <div style="font-weight: bold; display: inline;">PRUEBA DE 30 DÍAS </div>para demostrar que cumple con los requisitos y conocimientos necesarios 
                    para desarrollar el trabajo que se solicita, desarrollando siempre con la mayor intensidad, con el máximo esmero que requiere el
                    trabajo, el que desempeñará de manera y forma que “EL PATRON “ le indique, desarrollando todas la
                    actividades inherentes a su trabajo y todas aquellas relacionadas con el mismo, de acuerdo con las
                    instrucciones que al efecto reciba de “EL PATRON “ por conducto de cualquier representante autorizado, por
                    lo que conviene en el desempeño de sus labores acatara todas las ordenes que reciba de sus superiores y las
                    contenidas en cualquier circular o disposición que dicte “EL PATRON” en cumplimiento a las obligaciones que
                    le impone la Ley Federal del Trabajo. En observación a las disposiciones del Reglamento interior de Trabajo.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">TERCERA. </div>
                    Las partes acuerdan, que la duración del presente contrato por <div style="font-weight: bold; display: inline;">TIEMPO INDEFINIDO</div>; empieza a
                    surtir sus efectos desde el día <div style="font-weight: bold; display: inline;">{{$fecha_inicio}}.</div>
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">CUARTA.</div> El lugar de la prestación de los servicios de “EL TRABAJADOR” será el domicilio del patrón. Las
                    partes acuerdan y aceptan el trabajador que cuando por razones administrativas o de desarrollo de la
                    actividad o prestación de servicios contratados, se tenga la necesidad de removerlo, deberá el trabajador
                    trasladarse al lugar que el patrón le asigne, siempre y cuando no se vea menoscabado su salario. “EL
                    PATRON”, le comunicará con anticipación el cambio del lugar de prestación de servicios indicando el nuevo
                    asignado. Para el caso de que el nuevo lugar de prestación de servicios “EL TRABAJADOR”, variara el
                    horario del trabajo, “EL TRABAJADOR” expresamente acepta allanarse a esta modalidad.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">QUINTA.</div> “EL TRABAJADOR” desarrollará las siguientes funciones que en forma enunciativa y no limitativa
                    se señala a continuación. Acordando “EL PATRON” y “EL TRABAJADOR” que además de las funciones que
                    se listan en esta cláusula, “EL TRABAJADOR” deberá desempeñar las labores y funciones que se detallan en
                    el análisis y descripción de puestos, que “EL PATRON” ha elaborado para el puesto que el trabajador está
                    contratando; agregado al presente contrato como anexo uno: 
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px">   
                <td style="text-align:left;" colspan="3">
                    <div style="font-weight: bold; display: inline;">ACTIVIDADES:</div>
                    <p></p>
                    1. Preparación y ensamble de platillos
                    <br>
                    2. Completar stocks de la línea al inicio y cierre de acuerdo al checklist y Peps
                    <br>
                    3. Hacer las mease and pleace de acuerdo a cada línea
                    <br>
                    4. Limpiar superficie, piso y paredes todo el día
                    <br>
                    5. Limpieza profunda semanal
                    <br>
                    6. Recepción y almacenamiento de insumos
                    <br>
                    7. Limpiar cocina al cierre y completar montaje
                    <br>
                    8. Realización de Inventarios de insumos, utensilios y vajillas
                    <br>
                    9. Ayudar en los procesos de producción
                    <br>
                    10. Registrar temperaturas
                    <br>
                    11. Capacitar al personal de nuevo ingreso
                    <br>
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:left;" colspan="3">
                    <div style="font-weight: bold; display: inline;">RESPONSABILIDADES:</div>
                    <p></p>
                    1. HIGIENE DE TODAS LAS AREAS DE TRABAJO
                    <br>
                    2. SEGURIDAD DE LOS ALIMENTOS BAJO LAS NORMAS ESTABLECIDAS
                    <br>
                    3. EFICIENCIA PARA CUMPLIR CON EL TIEMPO DE ETREGA DE LOS PLATILLOS
                    <br>
                    4. CALIDAD DE LOS PLATILLOS BASADOS EN LAS RECETAS
                    <br>
                    5. CUIDADO DE LOS UTENCILIOS, VAJILLAS, EQUIPOS E INSUMOS
                    <br>
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    Estableciéndose que de acuerdo al anexo número uno de este contrato que en el mismo se mencionan los
                    jefes inmediatos y/o mediatos que tendrá el trabajo en el desempeño de sus labores.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">SEXTA.</div> La duración de la jornada de trabajo será de <div style="font-weight: bold; display: inline;">6 seis horas diarias </div>en la jornada diurna o vespertina,
                    o jornada mixta de <div style="font-weight: bold; display: inline;">8 horas</div>, cuando se le requiera. En consecuencia la jornada de trabajo es continua por lo
                    que se proporcionará al trabajo en <div style="font-weight: bold; display: inline;">las jornadas de 6 horas, 15 quince minutos de descanso </div>de
                    conformidad al dispuesto por la Ley. En forma expresa se obliga el trabajador a prestar sus servicios en
                    cualquiera de los tres turnos que tienen o establezca el patrón de acuerdo a las necesidades de la empresa;
                    obligándose el trabajador a rolar turnos en la forma que le indique el patrón; el patrón notificar al trabajador la
                    asignación o modificación de horarios de trabajo.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">SEPTIMA.</div> Por cada seis días de trabajo, tendrá el trabajador un descanso semanal de un día con pago de
                    salario; el mismo lo disfrutará un día de lunes a viernes de cada semana, pudiendo variar éste de acuerdo a
                    las necesidades del patrón; en este caso se le dará aviso al trabajador. También el trabajador disfrutará como
                    días de descanso los señalados en el Artículo 74 de la Ley: 1º de Enero, Primer lunes de febrero en
                    conmemoración del 5 de febrero, Tercer lunes de marzo en conmemoración del 21 de Marzo, 1º de Mayo, 16
                    de Septiembre, Tercer lunes de Noviembre en conmemoración del 20 de noviembre, 1º de Diciembre de cada
                    seis años, cuando corresponda la transmisión del Poder Ejecutivo Federal, el 25 de diciembre. El trabajador
                    en los días de descanso obligatorios señalados, deberá trabajarlos cuando se lo solicite el patrón,
                    pagándosele un salario doble como lo dispone el Artículo 75 de la Ley.                    
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">OCTAVA.</div> El trabajador percibirá por la prestación de los servicios, como salario la cantidad de 
                    <div style="font-weight: bold; display: inline;">$ {{$empleado->quincena}} POR QUINCENA</div>, salario que se le pagará los días 15 y 30 o 31 de la quincena laboral vencida, mediante el
                    sistema de pago vía transferencia electrónica bancaria o efectivo; estando obligado el trabajador a firmar las
                    constancias de pago respectivos; teniéndose en cuenta lo dispuesto en los Artículos 101, 108 y 109 de la Ley
                    y sometiéndose el trabajador a los descuentos que deban hacerse por orden expresa de la ley del seguro
                    social y de la ley del impuesto sobre la renta.                                   
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">NOVENA.</div> El trabajador se obliga a checar su tarjeta y firmar las listas de asistencia a la entrada y salida de
                    sus labores; igualmente se obliga a cumplir con las disposiciones que se contienen para el desempeño de su
                    trabajo en el Reglamento Interior de la empresa.                                                    
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">DÉCIMA.</div> El trabajador se obliga a someterse a los reconocimientos y exámenes médicos que periódicamente
                    establezca el patrón en los términos del Artículo 134 Fracción XX de la Ley; el médico que practique los
                    exámenes será designado por el patrón.                                                                   
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">DÉCIMA PRIMERA.</div> El trabajador tendrá la obligación y deberá integrarse a los planes y programas de
                    capacitación y adiestramiento así como a los de Seguridad e Higiene en el trabajo que establezca el patrón en
                    los términos de la Ley; igualmente deberá integrarse a las Comisiones Mixtas de capacitación y
                    Adiestramiento y de Seguridad e Higiene en el trabajo, tomando parte activa de los mismos según los cursos
                    establecidos y de acuerdo a las medidas preventivas de riesgos de trabajo.                                                                                     
                </td>
            </tr>
            <p></p>
        </table>
    </tr>
    <tr>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:680px;border-collapse:collapse;">
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">DÉCIMA SEGUNDA.</div> El trabajador se obliga dar fiel cumplimiento a las disposiciones dispuestas en el Artículo
                    134 de la Ley que son: sus obligaciones en el desempeño de sus labores al servicio del patrón.                                                                                
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    <div style="font-weight: bold; display: inline;">DÉCIMA TERCERA.</div> Las partes acuerdan que todo lo no previsto en el presente contrato: se estará a lo
                    dispuesto por la Ley.
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    Leído que les fue a las partes comparecientes, y enterados de su alcance y consecuencias legales, lo ratifican
                    en todo una de sus partes ante la presencia de dos testigos hábiles para testificar y sin tachas legales.                    
                </td>
            </tr>
            <p></p>
            <tr style="font-size:11px;">   
                <td style="text-align:justify;" colspan="3">
                    El presente contrato individual de trabajo, se firma en este día
                    <div style="font-weight: bold; display: inline;">{{$fechaActual}} EN LA CIUDAD DE GUADALAJARA, JALISCO.</div>
                </td>
            </tr>
            <p></p>
        </table>
    </tr>
    <p></p>
    <tr>
        <table style="margin-left:auto;margin-top:10px; margin-right:auto;width:670px;border-collapse:collapse;font-size:10px">
            <tr style="font-weight: bold;">
                <td style="border-bottom:0.5px solid black;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border-bottom:0.5px solid black;"></td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="width:30%;text-align:center">PATRÓN DE LA EMPRESA</td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width:30%;text-align:center">TRABAJADOR(A)</td>
            </tr>
            <tr style="font-weight: bold;">
                <td style="text-align: center">LUIS SANCHEZ DE LA VEGA CASTELLANOS</td>
                <td></td>
                <td></td>
                <td></td>
                <td style="text-align: center;text-transform:uppercase">{{$empleado->nombre}}</td>
            </tr>
            <p></p>
            <p></p>
            <p></p>
            <p></p>
            <tr style="font-weight: bold;">
                <td style="border-bottom:0.5px solid black;"></td>
                <td></td>
                <td></td>
                <td></td>
                <td style="border-bottom:0.5px solid black;"></td>
            </tr>
            <tr style="font-weight: bold;text-transform:uppercase">
                <td style="width:30%;text-align:center">Testigo 1</td>
                <td></td>
                <td></td>
                <td></td>
                <td style="width:30%;text-align:center">Testigo 2 </td>
            </tr>
        </table>
    </tr>
</table>
</body>

</html>