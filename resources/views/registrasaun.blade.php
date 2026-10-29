<!DOCTYPE html>
<html lang="tet">
<head>
   <link rel="icon" type=image/webp href="{{ asset('logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulariu Rejistu Estudante Foun - ESTV-GTI Becora</title>
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
            padding: 20px 15px;
        }

        .container {
            max-width: 720px;
            margin: 0 auto;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            padding: 40px 30px;
            border-top: 4px solid #9c1f2d;
        }

        .logo-area {
            text-align: center;
            margin-bottom: 25px;
        }

        .logo-area img {
            max-width: 110px;
            height: auto;
        }

        h1 {
            text-align: center;
            color: #9c1f2d;
            font-size: 24px;
            margin-bottom: 8px;
            font-weight: 600;
        }

        .sub-judul {
            text-align: center;
            color: #666666;
            font-size: 15px;
            margin-bottom: 35px;
            padding-bottom: 20px;
            border-bottom: 1px solid #eee;
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

        .alert-susesu {
            background: #f0f8f4;
            color: #155730;
            border-left: 3px solid #28a745;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #333333;
            font-weight: 500;
            font-size: 14px;
        }

        label span {
            color: #9c1f2d;
        }

        input[type="text"],
        input[type="date"],
        input[type="tel"],
        input[type="email"],
        select,
        textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 15px;
            transition: border-color 0.3s ease;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #d4a017;
            box-shadow: 0 0 0 3px rgba(212, 160, 23, 0.15);
        }

        input[type="file"] {
            padding: 8px 0;
            font-size: 14px;
        }

        .dokumen-section {
            margin-top: 35px;
            padding: 20px;
            background: #fafafa;
            border-radius: 8px;
            border-left: 3px solid #d4a017;
        }

        .dokumen-section h3 {
            color: #d4a017;
            font-size: 16px;
            margin-bottom: 15px;
        }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: #9c1f2d;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            margin-top: 25px;
            transition: background 0.3s ease;
        }

        .btn-submit:hover {
            background: #7e1824;
        }

        .duo-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
        }

        @media (max-width: 520px) {
            .duo-col {
                grid-template-columns: 1fr;
            }
            .container {
                padding: 25px 18px;
            }
        }
        .btn-kembali-utama {
            display: inline-block;
            background: #9c1f2d;
            color: #fff;
            padding: 10px 18px;
            border-radius: 14px; /* Sudut melengkung, bukan tajam */
            text-decoration: none;
            margin-bottom: 20px;
            transition: all 0.3s ease; /* Waktu animasi */
        }

/* Animasi bila kursor lewat di atas tombol */
        .btn-kembali-utama:hover {
             background: #4c9cf7;
             transform: translateY(-3px); /* Tombol sedikit terangkat ke atas */
             box-shadow: 0 4px 10px rgba(156, 31, 45, 0.25); /* Bayangan lembut */
        }
    </style>
</head>
<body>
<a href="{{ route('home') }}" class="btn-kembali-utama">
    ← Fila ba Beranda
</a>

<div class="container">
    <!-- Logo Sekolah -->
    <div class="logo-area">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora">
    </div>

    <h1>Formulariu Rejistu Estudante Foun</h1>
    <p class="sub-judul">ESTV-GTI Becora — Construir o Futuro</p>

    <!-- Pesan Error / Sukses -->
    @if($errors->any())
        <div class="alert alert-erro">
            @foreach($errors->all() as $erro)
                <p>{{ $erro }}</p>
            @endforeach
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-susesu">
            {{ session('success') }}
        </div>
    @endif

    <!-- Formulir -->
    <form id="formRegistu" method="POST" action="{{ route('registrasaun.store') }}" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
        

        <div class="form-group">
            <label>Numero Rejistu <span>*</span></label>
            <input type="text" name="no_regis" value="{{ old('no_regis') }}" required placeholder="Hatama numeru rejistu ezemplu 001">
        </div>

        <div class="form-group">
            <label>Naran Estudante <span>*</span></label>
            <input type="text" name="nrn_estudante" value="{{ old('nrn_estudante') }}" required placeholder="Hatama naran estudante">
        </div>

        <div class='form-group'>
            <label>Eskola Anterior <span style="color:#9c1f2d;">*</span></label>
            <input type="text" name="eskola_anterior" value="{{old('eskkola_anterior')}}">
            @if ($errors->has('eskola_anterior'))
            <span class="error">{{$errors->first('eskola_anterior')}}</span>
            @endif
        </div>

        <div class="duo-col">
            <div class="form-group">
                <label>Fatin Moris <span>*</span></label>
                <input type="text" name="fatin_moris" value="{{ old('fatin_moris') }}" required placeholder="Hatama fatin moris">
            </div>
            <div class="form-group">
                <label>Loron Moris <span>*</span></label>
                <input type="date" name="loron_moris" value="{{ old('loron_moris') }}" required>
            </div>
        </div>

        <div class="duo-col">
            <div class="form-group">
                <label>Generu <span>*</span></label>
                <select name="generu" required>
                    <option value="" {{ old('generu') == '' ? 'selected' : '' }}>Hili...</option>
                    <option value="Mane" {{ old('generu') == 'Mane' ? 'selected' : '' }}>Mane</option>
                    <option value="Feto" {{ old('generu') == 'Feto' ? 'selected' : '' }}>Feto</option>
                </select>
            </div>
            <div class="form-group">
                <label>Departamentu / Kursu <span>*</span></label>
                <select name="departamentu" required>
                    <option value="" {{ old('departamentu') == '' ? 'selected' : '' }}>Hili departamentu...</option>
                    <option value="Eletronika" {{ old('departamentu') == 'Eletronika' ? 'selected' : '' }}>Eletronika</option>
                    <option value="Automovel" {{ old('departamentu') == 'Automovel' ? 'selected' : '' }}>Otomotif / Automovel</option>
                    <option value="Construsaun Civil" {{ old('departamentu') == 'Construsaun Civil' ? 'selected' : '' }}>Construsaun Civil</option>
                    <option value="Mekanika Produsaun" {{ old('departamentu') == 'Mekanika Produsaun' ? 'selected' : '' }}>Mekanika Produsaun</option>
                    <option value="Eletrisidade" {{ old('departamentu') == 'Eletrisidade' ? 'selected' : '' }}>Eletrisidade / Eletrisidade</option>
                    <option value="Informatika" {{ old('departamentu') == 'Informatika' ? 'selected' : '' }}>Informatika</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label>Enderesu <span>*</span></label>
            <textarea name="enderesu" rows="3" required placeholder="Hatama enderesu kompletu...">{{ old('enderesu') }}</textarea>
        </div>

        <div class="duo-col">
            <div class="form-group">
                <label>Numero Telefone <span>*</span></label>
                <input type="tel" name="no_tlf" value="{{ old('no_tlf') }}" required placeholder="+670 xxx xxxx">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="{{ old('email') }}" placeholder="exemplu@email.com">
            </div>
        </div>

        <div class="duo-col">
            <div class="form-group">
                <label>Naran Aman / Pai <span>*</span></label>
                <input type="text" name="nrn_pai" value="{{ old('nrn_pai') }}" required placeholder="Hatama naran aman">
            </div>
            <div class="form-group">
                <label>Naran Inan / Mae <span>*</span></label>
                <input type="text" name="nrn_mae" value="{{ old('nrn_mae') }}" required placeholder="Hatama naran inan">
            </div>
        </div>

        <div class="form-group">
            <label>Profisaun Aman / Inan</label>
            <input type="text" name="profisaun" value="{{ old('profisaun') }}" placeholder="Hatama profisaun (se iha)">
        </div>

        <!-- Seksaun Dokumen -->
        <div class="dokumen-section">
            <h3>Dokumentu nebe presija atu submete</h3>
            <p style="font-size:13px; color:#777; margin-bottom:15px;">NOTE: Bele aneksu Dokumentu rua iha File ida no keta haluha format ba PDF, JPG, PNG — maks 2MB kada file</p>

            <div class="form-group">
                <label>FOTO Estudante</label>
                <input type="file" name="dokumen_kartaun" accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <div class="form-group">
                <label>Diploma & Deklarasaun Saude</label>
                <input type="file" name="dokumen_sertifikadu" accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <div class="form-group">
                <label>Certidaun Baptismo & RDTL</label>
                <input type="file" name="dokumen_nascimentu" accept=".pdf,.jpg,.jpeg,.png">
            </div>

            <div class="form-group">
                <label>Valor Ezame nasional</label>
                <input type="file" name="dokumen_seluk" accept=".pdf,.jpg,.jpeg,.png">
            </div>
        </div>

            <button type="submit" class="btn-submit" onclick="return cekKonfirmasi()">R E J I S T U </button>
<script>
        const form = document.querySelector('#formRegistu');
        form.addEventListener('invalid', function(e){
            e.target.setCustomValidity('Favor prenxemkampu ida neee');
        }, true);
        form.addEventListener('input', function(e) {
            e.target.setCustomValidity(''),
        });
    </script>
    </form>
    
</div>

</body>
</html>
