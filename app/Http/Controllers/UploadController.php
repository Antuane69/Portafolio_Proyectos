<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Upload;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request, $id_solicitud = null)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,xls,docx|max:10240',
        ]);

        if($id_solicitud){
            $id = $id_solicitud;
            $idr = $id;
        }else{
            $id = Solicitudes::max('id');
            $idr = intval($id) + 1;
        }

        $totalArchivos = Upload::where('solicitud_id',$idr)->count();
        if($totalArchivos >= 3){
            return response()->json(['error' => 'Máximos Archivos Alcanzados'], 400);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $currentDateTime = Carbon::now()->format('Ymd_His');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = 'Evidencia' . '_' . $idr . '_' . $currentDateTime . '.' . $fileExtension;

            $archivo = Upload::create([
                'nombre' => $filename,
                'solicitud_id' => $idr,
                'ubicacion' => $request->file('file')->store('Archivos_Evidencias/' . auth()->user()->nombre_usuario),
            ]);

            return [
                'url' => $archivo->url,
                'nombre' => $archivo->nombre,
                'remove' => $archivo->remove
            ];
        }

        return response()->json(['error' => 'No file uploaded'], 400);
    }
    
    public function show(Upload $archivo)
    {
        return response()->file(storage_path('app/' . $archivo->ubicacion), [
            'Content-Disposition' => 'inline; filename="' . $archivo->nombre . '"'
        ]);
    }

    public function destroy(Upload $archivo)
    {

        Storage::delete($archivo->ubicacion);
        $archivo->delete();
        
        return true;
    }
}
