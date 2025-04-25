<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $images = $user->getMedia('images');
        $formattedImages = $images->map(function ($image) {
            return [
                'id' => $image->id,
                'user_id' => Auth::id(),
                'path' => $image->getUrl(), 
                'original_name' => $image->file_name,
                'mime_type' => $image->mime_type,
                'created_at' => $image->created_at,
                'updated_at' => $image->updated_at,
            ];
        });
        return response()->json($formattedImages);
    }

    public function store(Request $request)
    {
        // Valida la imagen
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'token' => 'required|string',
        ]);

        
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $user = Auth::user();

        if ($request->hasFile('image')) {
            $user->addMediaFromRequest('image')
                ->toMediaCollection('images');

 
            $lastImage = $user->getMedia('images')->last();

            return response()->json([
                'message' => 'Imagen subida exitosamente.',
                'image' => [
                    'id' => $lastImage->id,
                    'user_id' => $user->id,
                    'path' => $lastImage->getUrl(), 
                    'original_name' => $lastImage->file_name,
                    'mime_type' => $lastImage->mime_type,
                    'created_at' => $lastImage->created_at,
                    'updated_at' => $lastImage->updated_at,
                ],
            ], 201);
        } else {
            return response()->json(['error' => 'No se encontró la imagen en la petición.'], 400);
        }
    }
}
