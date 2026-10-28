<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="{{ asset('images/logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard — ESTV-GTI Becora</title>
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

        .btn-logout {
            background: #ffffff;
            color: #9c1f2d;
            border: none;
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-logout:hover {
            background: #f3f3f3;
        }

        /* Container */
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 20px;
            text-align: center;
        }

        /* Logo di tengah */
        .logo-center {
            margin-bottom: 40px;
        }

        .logo-center img {
            max-width: 100px;
            height: auto;
        }

        /* Grid Statistik */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            margin-bottom: 50px;
        }

        .stat-card {
            background: #ffffff;
            padding: 25px 15px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border-top: 4px solid #9c1f2d;
            transition: transform 0.2s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
        }

        .stat-card.emas {
            border-top-color: #d4a017;
        }

        .stat-card .angka {
            font-size: 36px;
            font-weight: 700;
            color: #9c1f2d;
            margin-bottom: 8px;
        }

        .stat-card.emas .angka {
            color: #d4a017;
        }

        .stat-card .label {
            font-size: 14px;
            color: #666;
        }

        /* Tombol Daftar */
        .btn-lista {
            display: inline-block;
            background: #9c1f2d;
            color: #ffffff;
            padding: 14px 30px;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            transition: background 0.3s ease;
            border-bottom: 3px solid #d4a017;
        }

        .btn-lista:hover {
            background: #7e1824;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            .header {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
            }
        }

        @media (max-width: 420px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="header-left">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora">
        <h1>Admin Dashboard — ESTV-GTI Becora</h1>
    </div>
    
    <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        <button type="submit" class="btn-logout">Logout</button>
    </form>
</div>

<!-- Konten -->
<div class="container">

    <!-- Logo Tengah -->
    <div class="logo-center">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora">
    </div>

    <!-- Kotak Statistik -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="angka">{{ $total }}</div>
            <div class="label">Total Rejistraun</div>
        </div>

        <div class="stat-card emas">
            <div class="angka">{{ $prosesa }}</div>
            <div class="label">Prosesa</div>
        </div>

        <div class="stat-card">
            <div class="angka">{{ $simu }}</div>
            <div class="label">Simu</div>
        </div>

        <div class="stat-card emas">
            <div class="angka">{{ $lasimu }}</div>
            <div class="label">La Simu</div>
        </div>
    </div>

    <!-- Tombol Daftar -->
    <a href="{{ route('admin.estudantes.index') }}" class="btn-lista">
        Observa Lista Dados Estudante →
    </a>

</div>

</body>
</html>