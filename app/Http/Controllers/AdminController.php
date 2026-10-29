<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudante;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // LOGIN HARDCODE - TANPA DATABASE
        if ($request->username === 'admin' && $request->password === 'loginadmin') {
            $request->session()->put('admin_login', true);
            $request->session()->put('admin_username', 'admin');
            
            return redirect()->route('admin.dashboard');
        }

        return back()->with('error', 'Username ka Password sala!')->withInput();
    }

    public function dashboard()
{
    if (!session('admin_login')) {
        return redirect()->route('login')->with('error', 'Favor Login lai!');
    }

    $estudantes = \App\Models\Estudante::latest()->get();
    
    $total = \App\Models\Estudante::count();
    $prosesa = \App\Models\Estudante::count(); // untuk sementara sama dengan total biar tidak error
    $simu = 0;
    $lasimu = 0;

    // Coba hitung kalau status ada
    try {
        $prosesa = \App\Models\Estudante::where('status', 'Prosesa')->count();
        if($prosesa == 0) $prosesa = $total;
        $simu = \App\Models\Estudante::where('status', 'Simu')->count();
        $lasimu = \App\Models\Estudante::where('status', 'La Simu')->count();
    } catch (\Exception $e) {
        // biarin 0 kalau error
    }

    return view('admin.dashboard', compact('estudantes', 'total', 'prosesa', 'simu', 'lasimu'));
}

    public function index()
{
    if (!session('admin_login')) {
        return redirect()->route('login');
    }
    $estudantes = Estudante::orderBy('data_regis', 'desc')->get();

    $listaDepartamentu = [
        'Eletronika',
        'Automovel',
        'Construsaun Civil',
        'Mekanika Produsaun',
        'Eletrisidade',
        'Informatika'
    ];

    $estudanteKadaDepartamentu = [];
    foreach ($listaDepartamentu as $Departamentu) {
        $estudanteKadaDepartamentu[$Departamentu] = Estudante::where('departamentu', $Departamentu)->orderBy('nrn_estudante', 'asc')->get();
    }
    
    return view('admin.estudantes.index', compact('estudantes', 'estudanteKadaDepartamentu', 'listaDepartamentu'));
}

    public function listaDepartamentu($nome)
    {
        if (!session('admin_login')) {
            return redirect()->route('login')->with('error', 'Favor Login lai!');
        }
        $estudantes = Estudante::where('departamentu', $nome)->get();
        return view('admin.departamentu-lista', compact('estudantes', 'nome'));
    }

    public function edit($id)
    {
        $estudante = Estudante::findOrFail($id);
        return view('admin.estudantes.edit', compact('estudante'));
    }

  public function update(Request $request, $id)
{
    $estudante = Estudante::findOrFail($id);
    $data = $request->except(['_token', '_method']);
    
    // Fix CHECK constraint: ubah Prosesa jadi lowercase proses
    if (isset($data['status'])) {
        $status = strtolower($data['status']);
        // sesuaikan dengan yang ada di migrasi kamu
        if ($status == 'prosesa' || $status == 'proses') $data['status'] = 'proses';
        if ($status == 'aprovadu' || $status == 'diterima') $data['status'] = 'diterima';
        if ($status == 'rejeitadu' || $status == 'ditolak') $data['status'] = 'ditolak';
    }
    
    $estudante->update($data);
    return redirect()->route('admin.estudantes.index')->with('success', 'Atualiza ona!');
}

    public function destroy($id)
    {
        $estudante = Estudante::findOrFail($id);
        $estudante->delete();
        return redirect()->route('admin.estudantes.index')->with('success', 'Hamos ona!');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_login');
        return redirect()->route('login')->with('success', 'Sai tiha!');
    }
}
