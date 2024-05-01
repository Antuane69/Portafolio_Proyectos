<?php

namespace App\Mail;

use Carbon\Carbon;
use App\Models\Horarios;
use App\Models\Permisos;
use App\Models\Empleados;
use App\Models\Vacaciones;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class TokyoCorreos extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    //public $solicitud;
    public $tipo;
    public $id;
    public $aux;

    public function __construct($tipo,$id,$aux)
    {
        $this->tipo = $tipo;
        $this->id = $id;
        $this->aux = $aux;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fecha = Carbon::now()->format('d/m/Y');

        if($this->tipo == 'Horarios'){
            $solicitud = Horarios::find($this->id);

            if($this->aux == 'Servicio'){
                $titulo = 'Horario de Servicio Creado';
            }elseif($this->aux == 'Cocina'){
                $titulo = 'Horario de Cocina Creado';
            }

            $vista = 'correo.horariosCorreo';

        }elseif($this->tipo == 'Vacaciones'){
            $solicitud = Vacaciones::find($this->id);

            if($this->aux == 'Pedir'){
                $titulo = 'Solicitud de Prestamo de Vacaciones';
            }elseif($this->aux == 'Autorizada'){
                $titulo = 'Solicitud Autorizada de Vacaciones';
            }elseif($this->aux == 'Rechazada'){
                $titulo = 'Solicitud Rechazada de Vacaciones';
            }

            $vista = 'correo.vacacionesCorreo';

        }elseif($this->tipo == 'Permisos'){
            $solicitud = Permisos::find($this->id);

            if($this->aux == 'Pedir'){
                $titulo = 'Solicitud de Prestamo de Permiso';
            }elseif($this->aux == 'Autorizada'){
                $titulo = 'Solicitud Autorizada de Permiso';
            }elseif($this->aux == 'Rechazada'){
                $titulo = 'Solicitud Rechazada de Permiso';
            }

            $vista = 'correo.permisosCorreo';

        }elseif($this->tipo == 'Contrato'){
            $solicitud = Empleados::find($this->tipo);

            $titulo = 'Contrato del Empleado Apunto de Vencer';
            $vista = 'correo.empleadosCorreo';

        }else{
            return redirect()->back();
        }

        return $this->view($vista)->with(['titulo' => $titulo, 'solicitud' => $solicitud, 'fecha' => $fecha, 'aux' => $this->aux])
        ->subject($titulo)->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }
}