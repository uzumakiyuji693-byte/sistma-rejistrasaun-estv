<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="{{ asset('images/logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Dados Estudante — ESTV-GTI Becora</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        }

        body {
            background: #f5f6f8;
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: #9c1f2d;
            color: #ffffff;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.12);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .header-left img {
            max-width: 50px;
            height: auto;
        }

        .header-left h1 {
            font-size: 18px;
            font-weight: 600;
        }

        .btn-kembali {
            background: #ffffff;
            color: #9c1f2d;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .btn-kembali:hover {
            background: #f3f3f3;
        }

        /* Container */
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .form-card {
            background: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-top: 4px solid #d4a017;
        }

        .form-card h2 {
            text-align: center;
            color: #9c1f2d;
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: 600;
        }

        .info-naran {
            text-align: center;
            padding: 12px;
            background: #fafafa;
            border-radius: 6px;
            margin-bottom: 25px;
            color: #555;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        select,
        input[type="text"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        select:focus,
        input:focus {
            outline: none;
            border-color: #d4a017;
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.15);
        }

        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .btn-simpan {
            width: 100%;
            padding: 14px;
            background: #9c1f2d;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 10px;
            transition: background 0.3s ease;
        }

        .btn-simpan:hover {
            background: #7e1824;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 14px;
            text-align: center;
        }

        .alert-suksesu {
            background: #f0f8f4;
            color: #155730;
            border-left: 3px solid #28a745;
        }

        /* Responsif */
        @media (max-width: 480px) {
            .header {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
            }
            .form-card {
                padding: 25px 20px;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="header-left">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora">
        <h1>Edita Dados Estudante</h1>
    </div>
    <a href="{{ route('admin.estudantes.index') }}" class="btn-kembali">← Fila</a>
</div>

<!-- Formulir -->
<div class="container">
    <div class="form-card">
        <h2>Atualiza Dados</h2>

        <div class="info-naran">
            <strong>{{ $estudante->nrn_estudante }}</strong> — {{ $estudante->no_regis }}
        </div>

        @if(session('success'))
            <div class="alert alert-suksesu">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('admin.estudantes.update', $estudante->id) }}">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label>Departamentu / Kursu</label>
                <select name="departamentu">
                    <option value="Eletronika" {{ $estudante->departamentu == 'Eletronika' ? 'selected' : '' }}>Eletronika</option>
                    <option value="Automovel" {{ $estudante->departamentu == 'Automovel' ? 'selected' : '' }}>Automovel / Otomotif</option>
                    <option value="Construsaun Civil" {{ $estudante->departamentu == 'Construsaun Civil' ? 'selected' : '' }}>Construsaun Civil</option>
                    <option value="Mekanika Produsaun" {{ $estudante->departamentu == 'Mekanika Produsaun' ? 'selected' : '' }}>Mekanika Produsaun</option>
                    <option value="Eletrisidade" {{ $estudante->departamentu == 'Eletrisidade' ? 'selected' : '' }}>Eletrisidade</option>
                    <option value="Informatika" {{ $estudante->departamentu == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                </select>
            </div>

            <!-- Seksaun Verifikasaun Dokumen -->
<div style="margin-top: 30px; padding: 20px; background: #fafafa; border-radius: 8px; border-left: 3px solid #d4a017;">
    <h3 style="font-size: 16px; color: #9c1f2d; margin-bottom: 15px;">📋 Verifikasaun Dokumen Estudante</h3>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 12px;">
        <div>
            <strong>Foto Estudante</strong><br>
            @if($estudante->dokumen_kartaun)
                <a href="{{ asset('storage/' . $estudante->dokumen_kartaun) }}" target="_blank" style="color: #28a745;">✅ Haree/Download</a>
            @else
                <span style="color: #9c1f2d;">❌ Seidauk uza</span>
            @endif
        </div>

        <div>
            <strong>Diploma & Deklarasaun Saude</strong><br>
            @if($estudante->dokumen_sertifikadu)
                <a href="{{ asset('storage/' . $estudante->dokumen_sertifikadu) }}" target="_blank" style="color: #28a745;">✅ Haree/Download</a>
            @else
                <span style="color: #9c1f2d;">❌ Seidauk uza</span>
            @endif
        </div>

        <div>
            <strong>Certidaun Baptismo & RDTL</strong><br>
            @if($estudante->dokumen_nascimentu)
                <a href="{{ asset('storage/' . $estudante->dokumen_nascimentu) }}" target="_blank" style="color: #28a745;">✅ Haree/Download</a>
            @else
                <span style="color: #9c1f2d;">❌ Seidauk uza</span>
            @endif
        </div>

        <div>
            <strong>Valor Ezame Nasional</strong><br>
            @if($estudante->dokumen_seluk)
                <a href="{{ asset('storage/' . $estudante->dokumen_seluk) }}" target="_blank" style="color: #28a745;">✅ Haree/Download</a>
            @else
                <span style="color: #999;">Seidauk iha</span>
            @endif
        </div>
    </div>

    <!-- Status Verifikasi Admin -->
    <div class="form-group" style="margin-top: 20px;">
        <label>Status Verifikasaun Dokumen</label>
        <select name="dokumen_status">
            <option value="la_verifika" {{ $estudante->dokumen_status == 'la_verifika' ? 'selected' : '' }}>Seidauk Verifika</option>
            <option value="verifika" {{ $estudante->dokumen_status == 'verifika' ? 'selected' : '' }}>Dokumen Kompletu</option>
            <option value="inkompletu" {{ $estudante->dokumen_status == 'inkompletu' ? 'selected' : '' }}>Dokumen Inkompletu</option>
        </select>
    </div>

    <div class="form-group">
        <label>Komentariu Admin (se iha)</label>
        <textarea name="komentariu_admin" rows="3" placeholder="Hatama observasaun kona-ba dokumen...">{{ $estudante->komentariu_admin }}</textarea>
    </div>

    <p style="font-size: 12px; color: #777; margin-top: 12px;">💡 Klik link "Haree/Download" para verifika se dokumen ne'e kompletu no valido.</p>
</div>

            <div class="form-group">
                <label>Status Rejistu</label>
                <select name="status" required>
                    <option value="Prosesa" {{ $estudante->status == 'prosesa' ? 'selected' : '' }}>Prosesa</option>
                    <option value="Simu" {{ $estudante->status == 'Simu' ? 'selected' : '' }}>Simu</option>
                    <option value="La simu" {{ $estudante->status == 'La simu' ? 'selected' : '' }}>La simu</option>
                </select>
            </div>

            <button type="submit" class="btn-simpan">Salva Mudansa</button>
        </form>
    </div>
</div>

</body>
</html>