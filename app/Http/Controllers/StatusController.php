<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    // Tampilkan formulir cek status
    public function index()
    {
        return view('cek-status');
    }

    // Proses pencarian status
    public function cek(Request $request)
    {
        $data = $request->validate([
            'no_regis' => 'required|string|max:20'
        ]);

        $estudante = Estudante::where('no_regis', $data['no_regis'])->first();

        if (!$estudante) {
            return redirect()->back()
                ->with('error', 'Deskulpa, Numeru Rejistu nee la iha iha sistema! Favor hare se ita hakerek ho loos.')
                ->withInput();
        }

        return view('cek-status-hasil', compact('estudante'));
    }
}