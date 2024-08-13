<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{

    public function index()
    {
        $doctor = Auth::guard('doctor')->user();
        return view('doctor.index_doc', compact('doctor'));
    }

    public function indexUser($name)
    {
        $doctor = Doctor::find($name);
        return view('app.index', compact('doctor'));
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'lastName' => 'required|max:255',
            'phone' => 'required|max:25',
            'age' => 'required|numeric|min:18',
            'gender' => 'required',
            'mail' => 'required|email',
            'password' => 'required',
            'category_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos inválidos',
                'errors' => $validator->errors(),
            ], 422);
        }

        // Crear usuario
        try {
            $doctor = Doctor::create([
                'name' => $request->name,
                'lastName' => $request->lastName,
                'number' => $request->phone,
                'age' => $request->age,
                'gender' => $request->gender,
                'mail' => $request->email,
                'password' => Hash::make($request->password),
                'category_id' => $request->category_id,
            ]);

            if (!$doctor) {
                return response()->json([
                    'message' => 'Error al crear el usuario',
                ], 500);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error interno del servidor',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(Request $request)
    {

        Auth::guard('doctor')->logout();

        try {
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return response()->json(['success' => true, 'url' => '/'], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 500);
        }
    }
}
