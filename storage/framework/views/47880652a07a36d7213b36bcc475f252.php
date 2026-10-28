<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="<?php echo e(asset('images/logo-estv-gti.webp')); ?>" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Status Rejistu — ESTV-GTI Becora</title>
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
            max-width: 500px;
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
            margin-bottom: 10px;
        }

        .sub-judul {
            text-align: center;
            color: #666;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .alert {
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 25px;
            font-size: 14px;
        }

        .alert-erro {
            background: #fef0f1;
            color: #9c1f2d;
            border-left: 3px solid #9c1f2d;
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

        input[type="text"] {
            width: 100%;
            padding: 14px 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus {
            outline: none;
            border-color: #d4a017;
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.15);
        }

        .btn-cek {
            width: 100%;
            padding: 14px;
            background: #9c1f2d;
            color: #ffffff;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-cek:hover {
            background: #7e1824;
        }

        .link-kembali {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #666;
            text-decoration: none;
            font-size: 14px;
        }
        .logo-eskola{
            max-width: 140px;
            height: auto;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0,2));
            border-radius: 30px;
        }

        .link-kembali:hover {
            color: #9c1f2d;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="logo-area">
        <img src="<?php echo e(asset('images/logo-estv-gti.webp')); ?>" alt="Logo ESTV-GTI Becora" class ="logo-eskola">
    </div>

    <div class="card">
        <h1>Cek Status Rejistu</h1>
        <p class="sub-judul">Hatama Numeru Rejistu hodi hare rezultadu</p>

        <?php if(session('error')): ?>
            <div class="alert alert-erro">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <form method="POST" action="<?php echo e(route('cek-status.proses')); ?>">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">

            <div class="form-group">
                <label>Numeru Rejistu <span style="color: #9c1f2d;">*</span></label>
                <input type="text" name="no_regis" value="<?php echo e(old('no_regis')); ?>" required placeholder="Ex: 2026-001">
            </div>

            <button type="submit" class="btn-cek">Hare Rezultadu →</button>
        </form>
    </div>

    <a href="<?php echo e(route('home')); ?>" class="link-kembali">← Fila Fali Ba Página Inisiu</a>
</div>

</body>
</html><?php /**PATH C:\Users\user\Desktop\rejistu_estv\resources\views/cek-status.blade.php ENDPATH**/ ?>