<?php

namespace App\Http\Controllers;

use App\Models\Nomina;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;

class NominaController extends Controller
{

    public function historico(){
        
        $nominas = Nomina::all();
        // Suma todos los valores de la columna 'total'
        $total = Nomina::where('horas','!=','0')->sum('total');
    
        return view('nomina.historicoNomina',[
            'nominas' => $nominas,
            'total' => $total
        ]);

    }

    public function show(){
        $nominas = Nomina::all();
        $k = 0;

        return view('nomina.mostrarNomina',[
            'nominas' => $nominas,
            'k' => $k,
        ]);

    }

    public function store(Request $request){
        $nominas = Nomina::all();
        $k = 0;

        foreach($nominas as $nomina){
            $sueldo_hora = 260 / 6;
            $nomina_f = (($nomina->minutos/60) * $sueldo_hora) + ($nomina->horas * $sueldo_hora) + ($request->input("host" . $k)) + ($request->input("prima" . $k)) + ($request->input("gasolina" . $k)) + ($request->input("bonos" . $k)) + ($request->input("prima_vacacional" . $k)) + ($request->input("festivos" . $k)) + ($request->input("comida" . $k)) + 59.81 - ($request->input("descuentos" . $k));
            $nomina_total = round($nomina_f, 2); // Redondea a 2 decimales sin formatear

            // Guarda el valor redondeado directamente
            $nomina->total = $nomina_total;
            $nomina->save();
            $k++;
        }

    }

    public function csv(){
        return view('nomina.subirCSV');
    }

    public function store_csv(Request $request)
    {
        // Validar que el archivo sea un CSV o XLS/XLSX
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|file|mimes:csv,txt,xls,xlsx',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Obtener el archivo subido
        $file = $request->file('csv_file');
        $data = $this->readExcel($file,'registro de pasar la tarjeta');

        $array = [];
        $arrHoras = [];
        $arrMinutos = [];
        $pruebas = [];

        $cont = 0;
        $cont2 = 0;
        $numero_trabajo = 0;
        $aux = false;

        foreach($data as $datos){
            $cont++;
            if($cont%2 == 1){
                foreach($datos as $d){
                    $cont2++;
                    if($cont2 == 5){
                        $numero_trabajo = $d;
                        $cont2 = 0;
                        break;
                    }
                }
            }else{
                foreach($datos as $d){
                    $longitud = strlen($d);

                    for ($i=0; $i < $longitud/5; $i++) {
                        $valor = substr($d,0,5);
                        $array[] = $valor;
                        $d = substr($d, 5);
                    }
                }
                if(empty($array) == false){
                    //dd($array);
                    for($i=0;$i<(count($array)*2);$i+=2){

                        if(!array_key_exists($i, $array) || !array_key_exists($i+1, $array)){
                            break;
                        }

                        $if_val = substr($array[$i], 0, 2);
                        $if_val2 = substr($array[$i+1], 0, 2);

                        if(array_key_exists($i+2, $array)){
                            $if_val3 = substr($array[$i+2], 0, 2);
                            if($if_val2 == $if_val3){
                                $aux = true;
                            }
                        }

                        if($if_val == '00'){
                            $valor = $array[$i];
                            $resto = substr($valor,2);
                            $array[$i] = '24' . $resto;
                        }
                        
                        if($if_val2 == '00'){
                            if($aux){
                                $valor2 = $array[$i+2];
                                $aux = false;
                            }else{
                                $valor2 = $array[$i+1];
                            }
                            $resto = substr($valor2,2);
                            $array[$i+1] = '24' . $resto;
                        }

                        $datetime1 = \DateTime::createFromFormat('H:i', $array[$i]);
                        $datetime2 = \DateTime::createFromFormat('H:i', $array[$i+1]);

                        // Calcular la diferencia
                        $diferencia = $datetime1->diff($datetime2);

                        // Formatear la diferencia
                        $horas = $diferencia->h;
                        $minutos = $diferencia->i;

                        if($horas == 0 && (!array_key_exists($i, $array)) && (!array_key_exists($i+1, $array))){
                            $k = 0;
                            while($k == 0){
                                $i++;
                                $if_val = substr($array[$i], 0, 2);
                                $if_val2 = substr($array[$i+1], 0, 2);
            
                                if(array_key_exists($i+2, $array)){
                                    $if_val3 = substr($array[$i+2], 0, 2);
                                    if($if_val2 == $if_val3){
                                        $aux = true;
                                    }
                                }

                                if($if_val == '00'){
                                    $valor = $array[$i];
                                    $resto = substr($valor,2);
                                    $array[$i] = '24' . $resto;
                                }
                                
                                if($if_val2 == '00'){
                                    if($aux){
                                        $valor2 = $array[$i+2];
                                        $aux = false;
                                    }else{
                                        $valor2 = $array[$i+1];
                                    }
                                    $resto = substr($valor2,2);
                                    $array[$i+1] = '24' . $resto;
                                }
            
                                $datetime1 = \DateTime::createFromFormat('H:i', $array[$i]);
                                $datetime2 = \DateTime::createFromFormat('H:i', $array[$i+1]);
            
                                // Calcular la diferencia
                                $diferencia = $datetime1->diff($datetime2);
            
                                // Formatear la diferencia
                                $horas = $diferencia->h;
                                $minutos = $diferencia->i;

                                if($horas != 0){
                                    $k = 1;
                                }
                            }
                        }

                        $pruebas[] = $array[$i];
                        $pruebas[] = $array[$i+1];

                        $arrHoras[] = $horas;
                        $arrMinutos[] = $minutos;

                    }
                    $total_Horas = array_sum($arrHoras);
                    $total_Minutos = array_sum($arrMinutos);

                    if($total_Horas != 0){
                        Nomina::create([
                            'curp' => $numero_trabajo,
                            'horas' => $total_Horas,
                            'minutos' => $total_Minutos
                        ]);
                    }
                    $arrHoras = [];
                    $arrMinutos = [];
                }

            }
            $array = [];
        }
        //dd($pruebas);
        
        return redirect()->route('nomina.mostrar')->with('success', 'Archivo procesado correctamente.');
    }

    //pruebas
    
    // // Convertir a objetos DateTime
    // $valor = $valor2;
    // $if_val = substr($valor, 0, 2);

    // // Eliminar los primeros 5 caracteres
    // $d = substr($d, 5);

    // // Calcular la diferencia
    // $diferencia = $datetime1->diff($datetime2);

    // // Formatear la diferencia
    // $horas = $diferencia->h;
    // $minutos = $diferencia->i;

    // $arrHoras[] = $horas;
    // $arrMinutos[] = $minutos;
    
    // if($d == ''){
    //     break;
    // }
    // dd($array);
    // // Sumar los elementos del array
    // $total_Horas = array_sum($arrHoras);
    // $total_Minutos = array_sum($arrMinutos);

    // $minutosExtra = ($total_Minutos/60) * (260 / 6);
    // $nomina_f = (260.00 * 15) + 58.33 + 0 + 0 + 0 + 0 + 0 + 0 + 59.81 + $minutosExtra;
    // // Formatear la variable para mostrar solo 3 decimales
    // $nomina = number_format($nomina_f, 2);

    // dd($total_Horas,$total_Minutos);

    // dd($nomina);
    // // Insertar los datos en la base de datos
    // foreach ($data as $row) {
    //     DB::table('your_table')->insert($row);
    // }

    private function readExcel($file, $sheetName)
    {
        $spreadsheet = IOFactory::load($file->getPathname());
        $worksheet = $spreadsheet->getSheetByName($sheetName);

        if (!$worksheet) {
            return redirect()->back()->withErrors(['csv_file' => 'No se pudo encontrar la hoja especificada.']);
        }

        $rows = $worksheet->toArray();
        $data = [];

        // Asumimos que la fila 6 contiene los encabezados y los datos comienzan desde la fila 7
        $header = null;
        foreach ($rows as $index => $row) {
            if ($index < 3) {
                continue;
            }
            if ($index == 3) {
                $header = $row;
                continue;
            }
            if ($header) {
                $data[] = array_combine($header, $row);
            }
        }

        return $data;
    }
}
