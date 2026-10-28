<?php

namespace App\Http\Controllers;

use App\Models\Estudante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstudanteController extends Controller
{
    public function create()
    {
        return view('registrasaun');
    }

    public function store(Request $request)
    {
        $rules = [
            'no_regis' => 'required|string|max:20|unique:tb_estudante,no_regis',
            'nrn_estudante' => 'required|string|max:100',
            'eskola_anterior' => 'required|string|max:100',
            'fatin_moris' => 'required|string|max:50',
            'loron_moris' => 'required|date',
            'generu' => 'required|in:Mane,Feto',
            'enderesu' => 'required|string',
            'no_tlf' => 'required|string|max:20',
            'email' => 'nullable|email|max:100',
            'nrn_pai' => 'required|string|max:100',
            'nrn_mae' => 'required|string|max:100',
            'profisaun' => 'nullable|string|max:50',
            'departamentu' => 'required|in:Eletronika,Automovel,Construsaun Civil,Mekanika Produsaun,Eletrisidade,Informatika',
            'dokumen_kartaun' => 'nullable|mimes:pdf,jpg,jpeg,png,webp|max:2048',
            'dokumen_sertifikadu' => 'nullable|mimes:pdf,jpg,jpeg,png,webp|max:2048',
            'dokumen_nascimentu' => 'nullable|mimes:pdf,jpg,jpeg,png,webp|max:2048',
            'dokumen_seluk' => 'nullable|mimes:pdf,jpg,jpeg,png,webp|max:2048'
        ];

        $mensajen = [
            'no_regis.unique' => 'Deskulpa, Numeru Rejistu nee uza tiha ona husi estudante seluk! Favor hili numeru seluk.',
            'departamentu.in' => 'Departamentu nee la iha! Favor hili husi lista.',
        ];

        $validator = Validator::make($request->all(), $rules, $mensajen);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();

        // === UBAH BAGIAN INI ===
        if ($request->hasFile('dokumen_kartaun')) {
            $path = $request->file('dokumen_kartaun')->store('estudante', 'public');
            $data['dokumen_kartaun'] = $path;
        }

        if ($request->hasFile('dokumen_sertifikadu')) {
            $path = $request->file('dokumen_sertifikadu')->store('estudante', 'public');
            $data['dokumen_sertifikadu'] = $path;
        }

        if ($request->hasFile('dokumen_nascimentu')) {
            $path = $request->file('dokumen_nascimentu')->store('estudante', 'public');
            $data['dokumen_nascimentu'] = $path;
        }

        if ($request->hasFile('dokumen_seluk')) {
            $path = $request->file('dokumen_seluk')->store('estudante', 'public');
            $data['dokumen_seluk'] = $path;
        }
        // =======================

        $data['data_regis'] = date('Y-m-d');
        $data['status'] = 'prosesa';
        $data['dokumen_status'] = 'la_verifika';

        Estudante::create($data);

        return redirect()->back()->with('success', 'Rejistu ho susesu! Obrigadu!');
    }
}