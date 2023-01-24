<?php

namespace App\Http\Controllers;

use App\Models\Vet;
use Illuminate\Http\Request;

class VetController extends Controller
{
    public function readVetId($id)
    {
        return Vet::findOrFail($id);
        }
    
    public function readVet()
    {
        return Vet::all();
    }

    public function createVet(Request $request)
    {
        $data = $request->all();
        try {
            $vet = new Vet();
            $vet-> vet_name=$data['vet_name'];
            $vet-> vet_workplace=$data['vet_workplace'];
            $vet-> vet_location=$data['vet_location'];
            $vet-> vet_price=$data['vet_price'];
            $vet-> vet_information=$data['vet_information'];
            
            $vet->save();
            $status='BERHASIL.. BERHASIL';
            return response()->json(compact('status', 'vet'), 200);
        } catch (\Throwable $th) {
            $status='YAH.. GAGAL';
            return response()->json(compact('status', 'th'), 401);
        }
    }
}
