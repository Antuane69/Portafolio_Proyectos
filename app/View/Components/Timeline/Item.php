<?php

namespace App\View\Components\Timeline;

use Illuminate\View\Component;

class Item extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public bool $aprobada = false;
    public bool $enviada = false;
    public bool $rechazada = false;
    public bool $proceso = false;
    public function __construct(
        public $icon = "",
        public $title = "",
        public $date = "",
        public $estado = "Verificada",
    ) {
        $this->aprobada = $estado == 'Verificada';
        $this->enviada = $estado == 'Enviada';
        $this->rechazada = $estado == 'Rechazada';
        $this->proceso = $estado == 'En proceso';
    }

    public function render()
    {
        return view('components.timeline.item');
    }
}
