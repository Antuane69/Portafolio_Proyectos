<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class ChartCreate extends Chart
{
    /**
     * Initializes the chart.
     *
     * @return void
     */

    public function __construct()
    {
        parent::__construct();
        // Instanciamos el objeto gráfico 
        $chart = new Chart();
        
        // Añadimos las etiquetas del eje X
        $chart->labels(['Post', 'Usuario', 'Oferta', 'Justificacion']);
        $chart->dataset('My dataset 1', 'line', [1, 2, 30000, 'holaaa']);

        	
        return view('prueba.indexventas', compact('chart'));
    }
}
