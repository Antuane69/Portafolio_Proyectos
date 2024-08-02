<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use App\Models\Solicitudes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf,doc,xls,docx|max:10240',
        ]);

        $id = Solicitudes::max('id');
        $idr = intval($id);

        $totalArchivos = Upload::where('solicitud_id',$idr+1)->count();
        if($totalArchivos >= 3){
            return response()->json(['error' => 'Máximos Archivos Alcanzados'], 400);
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = 'Evidencia' . '_' . $id . '_' . $file->getClientOriginalName();

            $archivo = Upload::create([
                'nombre' => $filename,
                'solicitud_id' => $idr + 1,
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
