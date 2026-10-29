<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" type=image/webp href="{{ asset('logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Estudante — {{ $nome }}</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', Roboto, Arial, sans-serif; }
        body { background: #f5f6f8; min-height: 100vh; }
        .header { background: #9c1f2d; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        .header h1 { font-size: 20px; }
        .header a { color: white; text-decoration: none; background: #2980b9; padding: 8px 15px; border-radius: 4px; }
        .container { max-width: 1000px; margin: 30px auto; padding: 0 15px; }
        .card { background: white; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1); overflow: hidden; }
        .card-header { background: #2c3e50; color: white; padding: 15px 20px; font-size: 18px; font-weight: bold; }
        .card-body { padding: 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 12px 15px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f8f9fa; font-weight: 600; color: #333; }
        tr:hover { background: #f9f9f9; }
        tr.ditemukan { background: #fff3cd; border-left: 4px solid #d4a017; }
        .empty { padding: 40px 20px; text-align: center; color: #888; }
        .back-btn { display: inline-block; margin: 20px 0; color: #2980b9; text-decoration: none; }
        .back-btn:hover { text-decoration: underline; }
        .total-info { padding: 15px 20px; background: #f8f9fa; border-top: 1px solid #eee; font-weight: 500; }
    </style>
</head>
<body>

<div class="header">
    <h1>📋 Lista Estudante — {{ $nome }}</h1>
    <a href="{{ route('admin.estudantes.index') }}">← Fali ba Lista</a>
</div>

<div class="container">
    <a href="{{ route('admin.estudantes.index') }}" class="back-btn">← Back to Dashboard</a>
    
    <div class="card">
        <div class="card-header">
            Estudante sira ne'ebé hili {{ $nome }}
        </div>
        <div class="card-body">
            @if ($estudantes->count() > 0)
            <!-- KOTAK PENCARIAN -->
            <div style="margin: 20px;">
                <form method="GET" action="" style="display: flex; gap: 10px; align-items: center; max-width: 600px;">
                    <input 
                        type="text" 
                        name="cari" 
                        placeholder="Buka ho Naran Estudante ka Númeru Rejistu..." 
                        value="{{ request('cari') }}"
                        style="flex: 1; padding: 10px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
                    >
                    <button 
                        type="submit" 
                        style="padding: 10px 20px; background: #9c1f2d; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;"
                    >
                        Buka
                    </button>
                    @if(request('cari'))
                        <a 
                            href="{{ url()->current() }}"
                            style="padding: 10px 20px; background: #666; color: white; border: none; border-radius: 6px; text-decoration: none; display: inline-block; line-height: 1;"
                        >
                          Buka Fila Fali
                        </a>
                    @endif
                </form>
            </div>

            @php
                $kunci = request('cari');
                if ($kunci) {
                    $estudantes = $estudantes->filter(function($item) use ($kunci) {
                        return stripos($item->nrn_estudante, $kunci) !== false 
                            || stripos($item->no_regis, $kunci) !== false;
                    });
                }
            @endphp

                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Númeru Rejistu</th>
                            <th>Naran Estudante</th>
                            <th>Eskola Anterior</th>
                            <th>Status</th>
                            <th>Aksaun</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($estudantes as $index => $est)
                            @php
                                $ditemukan = $kunci && (
                                    stripos($est->nrn_estudante, $kunci) !== false || 
                                    stripos($est->no_regis, $kunci) !== false
                                );
                            @endphp
                        <tr class="{{ $ditemukan ? 'ditemukan' : '' }}">
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($ditemukan)
                                    <strong style="color: #9c1f2d;">{{ $est->no_regis }}</strong>
                                @else
                                    {{ $est->no_regis }}
                                @endif
                            </td>
                            <td>
                                @if($ditemukan)
                                    <strong style="color: #9c1f2d; font-size: 15px;">{{ $est->nrn_estudante }}</strong>
                                @else
                                    {{ $est->nrn_estudante }}
                                @endif
                            </td>
                            <td>{{ $est->eskola_anterior }}</td>
                            <td>
                                @if ($est->status == 'Simu')
                                    <span style="color:green; font-weight:bold;">Simu</span>
                                @elseif ($est->status == 'Rejeita')
                                    <span style="color:red; font-weight:bold;">Rejeita</span>
                                @else
                                    <span style="color:orange; font-weight:bold;">Prosesa</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.estudantes.edit', $est->id) }}" style="color:#2980b9; text-decoration:none; margin-right:10px;">Edita</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="total-info">
                    Total: <strong>{{ $estudantes->count() }}</strong> Estudante
                </div>
            @else
                <div class="empty">
                    <h3>Seidauk iha estudante ne'ebé hili {{ $nome }}</h3>
                    <p>Seidauk iha dadus rejistu tanba ainda la iha estudante ne'ebé hili departamentu ne'e.</p>
                </div>
            @endif
        </div>
    </div>
</div>

</body>
</html>
