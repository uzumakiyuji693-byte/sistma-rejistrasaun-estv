<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="{{ asset('images/logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin — ESTV-GTI Becora</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #9c1f2d 0%, #7e1824 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 400px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.15);
            padding: 40px 30px;
            text-align: center;
            border-top: 4px solid #d4a017;
        }

        .logo-area {
            margin-bottom: 20px;
        }

        .logo-area img {
            max-width: 90px;
            height: auto;
        }

        h1 {
            color: #9c1f2d;
            font-size: 22px;
            margin-bottom: 5px;
            font-weight: 600;
        }

        .sub-judul {
            color: #777;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .alert {
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
            text-align: left;
        }

        .alert-erro {
            background: #fef0f1;
            color: #9c1f2d;
            border-left: 3px solid #9c1f2d;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #d4a017;
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.15);
        }

        .btn-login {
            width: 100%;
            padding: 13px;
            background: #9c1f2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        .btn-login:hover {
            background: #7e1824;
        }

        .footer-note {
            margin-top: 25px;
            font-size: 12px;
            color: #999;
        }
        .btn-kembali-utama {
            position: fixed;
            bottom: 25px;
            right: 25px;
            display: inline-block;
            background: #366cd8;
            color: #fff;
            padding: 10px 18px;
            border-radius: 14px; /* Sudut melengkung, bukan tajam */
            text-decoration: none;
            transition: all 0.3s ease; /* Waktu animasi */
            z-index: index: 99;
        }

/* Animasi bila kursor lewat di atas tombol */
        .btn-kembali-utama:hover {
             background: #e0dd23;
             transform: translateY(-3px); /* Tombol sedikit terangkat ke atas */
             box-shadow: 0 4px 10px rgba(49, 96, 190, 0.93); /* Bayangan lembut */
        }
    </style>
</head>
<body>

<a href="{{ route('home') }}" class="btn-kembali-utama">
    ← Fila ba Beranda
</a>

<div class="login-card">
    <div class="logo-area">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora">
    </div>

    <h1>Login Admin</h1>
    <p class="sub-judul">ESTV-GTI Becora — Sistema Rejistu Estudante</p>

    @if($errors->any())
        <div class="alert alert-erro">
            @foreach($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    <form method="POST" action="{{ route('admin.login.submit') }}">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="{{ old('username') }}" required placeholder="Hatama username">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required placeholder="Hatama password">
        </div>

        <button type="submit" class="btn-login">Login</button>
    </form>

    <p class="footer-note">Construir o Futuro © {{ date('Y') }} — ESTV-GTI Becora</p>
</div>

</body>
</html>