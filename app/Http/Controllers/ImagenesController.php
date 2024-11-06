<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ImagenesController extends Controller
{
    public function subirImagen(Request $request)
    {

        $imagen = $request->file('imagen');

        $carpeta = '23170199';


        $path = Storage::disk('s3')->put($carpeta, $imagen);
        
        $user = Auth::user();


        if ($user instanceof User) {
        $user->imagen = $path;
        $user->save(); 

        return response()->json([
            'message' => 'Imagen subida exitosamente',
            'image_url' => $path
        ]);
    }
    }

    public function verImagen(Request $request)
    {
        $user = auth()->user();
        $path = $user->imagen;


        if (!$path) {
            return response()->json([
                'message' => 'No existe imagen de perfil',
            ]);
        }

        $content = Storage::disk('s3')->get($path);


        return response($content)->header('content-type', 'image/png');
    }

    public function editarImagen(Request $request)
    {
    
        $file = $request->file('imagen');
        
        $user = auth()->user();
    
        if ($user instanceof User) { 
            $oldPath = $user->imagen;
    
            if ($oldPath) {
                Storage::disk('s3')->delete($oldPath);
            }
    
            
            $newPath = Storage::disk('s3')->put('23170199', $file);
            $user->imagen = $newPath;
            $user->save(); 
    
            return response()->json([
                'message' => 'Imagen actualizada con éxito',
                'image_url' => $newPath
            ]);
        }
    
        return response()->json(['message' => 'Usuario no autenticado o error de instancia.'], 403);
    }
}
