<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Validator;

class NominaController extends Controller
{
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

        // dd($data);
        $cont = 0;

        foreach($data as $datos){
            $cont++;
            // if($cont%2 == 0){
            // }
            if($cont == 4){
                // dd($datos);
                $valor = '00:00';
                $if_val = substr($valor, 0, 2);

                foreach($datos as $d){
                    $longitud = strlen($d);

                    for ($i=0; $i < ($longitud/5); $i++) {     
                        // Extraer valores
                        $valor2 = substr($d, 0, 5); // Obtener los primeros 5 caracteres
                        $if_val2 = substr($d, 0, 2);
               
                        if($if_val == '00'){
                            $resto = substr($valor,2);
                            $valor = '12' . $resto;
                        }
                        
                        if($if_val2 == '00'){
                            $resto = substr($valor2,2);
                            $valor2 = '12' . $resto;
                        }

                        // Convertir a objetos DateTime
                        $datetime1 = \DateTime::createFromFormat('H:i', $valor);
                        $datetime2 = \DateTime::createFromFormat('H:i', $valor2);

                        $valor = $valor2;
                        $if_val = substr($valor, 0, 2);

                        // Eliminar los primeros 5 caracteres
                        $d = substr($d, 5);

                        // Calcular la diferencia
                        $diferencia = $datetime1->diff($datetime2);
    
                        // Formatear la diferencia
                        $horas = $diferencia->h;
                        $minutos = $diferencia->i;
    
                        $arrHoras[] = $horas;
                        $arrMinutos[] = $minutos;
                        
                        if($d == ''){
                            break;
                        }
                    }
                    
                }
                // Sumar los elementos del array
                $total_Horas = array_sum($arrHoras);
                $total_Minutos = array_sum($arrMinutos);

                $minutosExtra = ($total_Minutos/60) * (260 / 6);
                $nomina_f = (260.00 * 15) + 58.33 + 0 + 0 + 0 + 0 + 0 + 0 + 59.81 + $minutosExtra;
                // Formatear la variable para mostrar solo 3 decimales
                $nomina = number_format($nomina_f, 2);
                dd($nomina);
            }
        }

        // // Insertar los datos en la base de datos
        // foreach ($data as $row) {
        //     DB::table('your_table')->insert($row);
        // }

        return redirect()->back()->with('success', 'Archivo procesado correctamente.');
    }

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
