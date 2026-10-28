<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="<?php echo e(asset('images/logo-estv-gti.webp')); ?>" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ESTV-GTI Becora — Sistema Rejistrasaun</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Arial, sans-serif;
        }

        body {
            background: linear-gradient(135deg, #9c1f2d 0%, #b82c3a 50%, #d4a017 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 50px;
        }

        .logo-eskola {
            max-width: 140px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0,2));
            border-radius: 30px;
        }

        .judul {
            color: #ffffff;
            font-size: 36px;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 2px 4px rgba(0,0,0,0.15);
        }

        .sub-judul {
            color: #f0e6cc;
            font-size: 18px;
            margin-bottom: 60px;
        }

        .btn-group {
            display: flex;
            flex-direction: column;
            gap: 18px;
            width: 100%;
            max-width: 340px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            font-size: 17px;
            font-weight: 600;
            text-decoration: none;
            padding: 15px 30px;
            border-radius: 50px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.15);
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
             
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
        }

        .btn:active {
            transform: translateY(0);
        }

        .btn-rejistu {
            background: #ffffff;
            color: #9c1f2d;
        }

        .btn-rejistu:hover {
            background: #fff9e8;
            border: 2px solid #d4a017;
        }

        .btn-cek {
            background: transparent;
            color: #ffffff;
            border: 2px solid #ffffff;
        }

        .btn-cek:hover {
            background: rgba(255,255,255,0.15);
            border-color: #f0e6cc;
        }

        .icon {
            font-size: 20px;
        }

        .footer {
            margin-top:auto;
            color: rgba(255,255,255,0.8);
            font-size: 13px;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="logo-area">
        <img src="<?php echo e(asset('images/logo-estv-gti.webp')); ?>" alt="Logo ESTV-GTI Becora" class="logo-eskola" onerror="this.style.display='none'">
        <h1 class="judul">ESTV-GTI Becora</h1>
        <p class="sub-judul">Bem vindo mai sistema Rejistrasaun Estudante Foun</p>
    </div>

    <div class="btn-group">
        <a href="<?php echo e(route('registrasaun.create')); ?>" class="btn btn-rejistu">
            <span class="icon">📝</span>
            Rejistu Agora
        </a>

        <a href="<?php echo e(route('cek-status')); ?>" class="btn btn-cek">
            <span class="icon">📋</span>
            Cek Status Rejistu
        </a>
    </div>

    <div class="footer">
        © 2026 ESTV-GTI Becora — Timor-Leste
    </div>
    <a href="<?php echo e(route('login')); ?>" style="position:fixed; bottom:12px; right:12px; width:28px; height28px; opacity:0.25; display:flex;
     align-items:center; justify-content:center; border-radius:50px; background:#9c1f2d; color:white; text-decoration:none; font-size:12px;">A</a>

</body>
</html><?php /**PATH C:\Users\user\Desktop\rejistu_estv\resources\views/welcome.blade.php ENDPATH**/ ?>