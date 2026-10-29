<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" type=image/webphref="{{ asset('images/logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezultadu Rejistu — ESTV-GTI Becora</title>
    <style>
        * {
            margin: 0; 
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        }

        body {
            background:linear-gradient(180deg, #faf0f0 0%, #faf8f0 100%);
            min-height: 100vh;
            padding: 40px 20px;
        }

        .container {
            max-width: 520px;
            margin: 0 auto;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo-area img {
            max-width: 90px;
            height: auto;
        }

        .card {
            background: #ffffff;
            padding: 35px;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            border-top: 4px solid #9c1f2d;
        }

        h1 {
            text-align: center;
            color: #9c1f2d;
            font-size: 22px;
            margin-bottom: 25px;
        }

        .info-box {
            background: #fafafa;
            padding: 18px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .info-box p {
            margin-bottom: 10px;
            font-size: 15px;
            color: #444;
        }

        .info-box p:last-child {
            margin-bottom: 0;
        }

        .info-box strong {
            color: #333;
            display: inline-block;
            width: 140px;
        }

        .status-box {
            text-align: center;
            padding: 25px;
            border-radius: 8px;
            margin-bottom: 25px;
        }

        .status-simu {
            background: #f0f8f4;
            border: 2px solid #28a745;
            color: #155730;
        }

        .status-prosesa {
            background: #fffbf0;
            border: 2px solid #d4a017;
            color: #856404;
        }

        .status-lasimu {
            background: #fef0f1;
            border: 2px solid #9c1f2d;
            color: #9c1f2d;
        }

        .status-icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .status-text {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        .status-desc {
            font-size: 14px;
            line-height: 1.5;
        }

        .logo-eskola{
            max-width: 140px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0,2));
            border-radius: 30px;
        }

        .komentariu {
            background: #f8f9fa;
            border-left: 3px solid #d4a017;
            padding: 15px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 14px;
            color: #555;
        }

        .link-kembali {
            display: block;
            text-align: center;
            color: #9c1f2d;
            text-decoration: none;
            font-weight: 500;
            margin-top: 10px;
        }

        .link-kembali:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo-area">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora" class="logo-eskola">
    </div>

    <div class="card">
        <h1>Rezultadu Rejistu</h1>

        <!-- Dados Estudante -->
        <div class="info-box">
            <p><strong>Naran:</strong> {{ $estudante->nrn_estudante }}</p>
            <p><strong>Numero Rejistu:</strong> {{ $estudante->no_regis }}</p>
            <p><strong>Eskola Anterior:</strong> {{ $estudante->eskola_anterior }}</p>
            <p><strong>Departamentu:</strong> {{ $estudante->departamentu }}</p>
            <p><strong>Data Rejistu:</strong> {{ $estudante->data_regis }}</p>
        </div>

        <!-- Status -->
        @if($estudante->status == 'Simu')
            <div class="status-box status-simu">
                <div class="status-icon">✅</div>
                <div class="status-text">Simu!</div>
                <div class="status-desc">Parabéns! Ita ho rejistu tiha ona.<br>Favor apresenta dokumentu orijinal iha ESTV-GTI Becora.</div>
            </div>
        @elseif($estudante->status == 'prosesa')
            <div class="status-box status-prosesa">
                <div class="status-icon">⏳</div>
                <div class="status-text">Seidauk Deside</div>
                <div class="status-desc">Ita rejistu sei iha prosesu.<br>Favor hein anunsiu tuir mai.</div>
            </div>
        @elseif($estudante->status == 'La simu')
            <div class="status-box status-lasimu">
                <div class="status-icon">❌</div>
                <div class="status-text">La Simu</div>
                <div class="status-desc">Deskulpa, ita seidauk simu iha faze ida ne.<br>Favor rejistu fali iha tempu mai.</div>
            </div>
        @endif

        <!-- Komentariu Admin (se iha) -->
        @if($estudante->komentariu_admin)
            <div class="komentariu">
                <strong>Observasaun husi Admin:</strong><br>
                {{ $estudante->komentariu_admin }}
            </div>
        @endif

        <a href="{{ route('cek-status') }}" class="link-kembali">← Cek Numeru Seluk</a>
    </div>
</div>

</body>
</html>
