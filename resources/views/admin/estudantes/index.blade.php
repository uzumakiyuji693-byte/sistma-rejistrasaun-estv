<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="{{ asset('images/logo-estv-gti.webp') }}" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Dados Estudante — ESTV-GTI Becora</title>
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

        .header-right {
            display: flex;
            gap: 12px;
        }

        .btn-kembali, .btn-logout {
            background: #ffffff;
            color: #9c1f2d;
            border: none;
            padding: 10px 18px;
            border-radius: 6px;
            font-weight: 600;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .btn-kembali:hover, .btn-logout:hover {
            background: #f3f3f3;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .top-bar h2 {
            font-size: 20px;
            color: #333;
            font-weight: 600;
        }

        /* Alert Pesan */
        .alert {
            padding: 14px 18px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        .alert-suksesu {
            background: #f0f8f4;
            color: #155730;
            border-left: 3px solid #28a745;
        }

        /* Tabel */
        .table-wrapper {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead {
            background: #9c1f2d;
            color: #ffffff;
        }

        th, td {
            padding: 14px 16px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #eee;
        }

        th {
            font-weight: 600;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        /* Badge Status */
        .badge {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 12px;
            font-size: 12px;
            font-weight: 600;
            color: #fff;
        }

        .badge-prosesa {
            background: #d4a017;
        }

        .badge-simu {
            background: #28a745;
        }

        .badge-lasimu {
            background: #9c1f2d;
        }

        /* Tombol Aksi */
        .aksi {
            display: flex;
            gap: 8px;
        }

        .btn-edit {
            background: #d4a017;
            color: #fff;
            padding: 7px 12px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
        }

        .btn-edit:hover {
            background: #b88613;
        }

        .btn-hapus {
            background: #9c1f2d;
            color: #fff;
            padding: 7px 12px;
            border-radius: 5px;
            border: none;
            font-size: 13px;
            cursor: pointer;
            font-weight: 500;
        }

        .btn-hapus:hover {
            background: #7e1824;
        }

        /* Ringkasan Departemen — Bisa Diklik */
        .summary-section {
            margin-top: 40px;
        }

        .summary-section h3 {
            font-size: 18px;
            color: #9c1f2d;
            margin-bottom: 20px;
            font-weight: 600;
        }

        .dept-boxes {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }

        .dept-box {
            background: #fff;
            padding: 18px;
            border-radius: 8px;
            border-top: 3px solid #ccc;
            text-align: center;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .dept-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.12);
        }

        .dept-box.has-data {
            border-top-color: #d4a017;
        }

        .dept-box .count {
            font-size: 28px;
            font-weight: 700;
            color: #9c1f2d;
        }

        .dept-box .name {
            font-size: 13px;
            color: #666;
            margin-top: 5px;
        }

        /* Daftar per Departemen */
        .dept-list-card {
            background: #fff;
            border-radius: 8px;
            margin-bottom: 20px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            overflow: hidden;
        }

        .dept-list-header {
            background: #9c1f2d;
            color: #fff;
            padding: 12px 20px;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .dept-list-count {
            background: #d4a017;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 13px;
        }

        .dept-list-body {
            padding: 15px 20px;
        }

        .dept-list-body ul {
            list-style: none;
            columns: 2;
            gap: 10px;
        }

        .dept-list-body li {
            padding: 6px 0;
            border-bottom: 1px solid #f0f0f0;
            font-size: 14px;
        }

        .dept-empty {
            padding: 15px 20px;
            color: #999;
            font-style: italic;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .header {
                flex-direction: column;
                gap: 15px;
                padding: 20px;
            }

            .dept-list-body ul {
                columns: 1;
            }

            .table-wrapper {
                overflow-x: auto;
            }

            table {
                min-width: 800px;
            }
        }
    </style>
</head>
<body>

<!-- Header -->
<div class="header">
    <div class="header-left">
        <img src="{{ asset('images/logo-estv-gti.webp') }}" alt="Logo ESTV-GTI Becora">
        <h1>Lista Dados Estudante</h1>
    </div>
    <div class="header-right">
        <a href="{{ route('admin.dashboard') }}" class="btn-kembali">← Dashboard</a>
        <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
    @csrf
    <button type="submit" class="btn-logout">Logout</button>
</form>
    </div>
</div>

<!-- Konten -->
<div class="container">
    <!-- Pesan Sukses -->
    @if(session('success'))
        <div class="alert alert-suksesu">
            {{ session('success') }}
        </div>
    @endif

    <!-- Tabel Data -->
    <div class="table-wrapper">
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Numero Rejistu</th>
                    <th>Naran Estudante</th>
                    <th>Eskola Anterior</th>
                    <th>Numero Tlfn</th>
                    <th>Departamentu</th>
                    <th>Status</th>
                    <th>Dokumentos</th>
                    <th>Data Rejistu</th>
                    <th>Aksaun</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudantes as $index => $e)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $e->no_regis }}</td>
                    <td>{{ $e->nrn_estudante }}</td>
                    <td>{{ $e->eskola_anterior }}</td>
                    <td>{{ $e->no_tlf }}</td>
                    <td>{{ $e->departamentu }}</td>
                    <td>
                        @if($e->status == 'prosesa')
                            <span class="badge badge-prosesa">Prosesa</span>
                        @elseif($e->status == 'Simu')
                            <span class="badge badge-simu">Simu</span>
                        @elseif($e->status == 'La simu')
                            <span class="badge badge-lasimu">La Simu</span>
                        @else
                            <span class="badge">{{ $e->status }}</span>
                        @endif
                    </td>
                    <td>
                        <div style="font-size: 12px; line-height: 1.6;">
                            @if($e->dokumen_kartaun)
                                <a href="{{ asset('storage/' . $e->dokumen_kartaun) }}" target="_blank" style="color: #28a745; text-decoration: none;">📄 Foto estudante</a><br>
                            @else
                                <span style="color: #999;">❌ Kartaun</span><br>
                            @endif

                            @if($e->dokumen_sertifikadu)
                                <a href="{{ asset('storage/' . $e->dokumen_sertifikadu) }}" target="_blank" style="color: #28a745; text-decoration: none;">📄 Diploma & Deklarasaun Saude</a><br>
                            @else
                                <span style="color: #999;">❌ Sertifikadu</span><br>
                            @endif

                            @if($e->dokumen_nascimentu)
                                <a href="{{ asset('storage/' . $e->dokumen_nascimentu) }}" target="_blank" style="color: #28a745; text-decoration: none;">📄 Certidaun Baptismo & RDTL</a><br>
                            @else
                                <span style="color: #999;">❌ Nascimentu</span><br>
                            @endif

                            @if($e->dokumen_seluk)
                                <a href="{{ asset('storage/' . $e->dokumen_seluk) }}" target="_blank" style="color: #28a745; text-decoration: none;">📄 Valor Ezame Nasional</a>
                            @else
                                <span style="color: #999;">❌ Seluk</span>
                            @endif
                        </div>
                    </td>
                    <td>{{ $e->data_regis }}</td>
                    <td>
    <div class="aksi">
        <a href="{{ route('admin.estudantes.edit', $e->id) }}" class="btn-edit">Edit</a>
        <form action="{{ route('admin.estudantes.destroy', $e->id) }}" method="POST" onsubmit="return confirm('Tebes hakarak hamos estudante nee?')" style="display:inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn-hapus">Hamos</button>
        </form>
    </div>
</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Bagian Ringkasan Per Jurusan -->
    <div class="summary-section">
        <h3>📋 Total Estudante Hosi Departamentu</h3>

        <!-- Kotak Ringkasan Jumlah — Bisa Diklik -->
        <div class="dept-boxes">
            @foreach($listaDepartamentu as $dept)
                @php $jumlah = $estudanteKadaDepartamentu[$dept]->count(); @endphp
                <a href="{{ route('admin.departamentu', $dept) }}" 
                   class="dept-box {{ $jumlah > 0 ? 'has-data' : '' }}">
                    <div class="count">{{ $jumlah }}</div>
                    <div class="name">{{ $dept }}</div>
                </a>
            @endforeach
        </div>

        <!-- Daftar Nama Siswa Per Jurusan (Tampil Langsung di Halaman) -->
        <h3>📋 Lista Estudante Hosi Departamentu</h3>

        @foreach($listaDepartamentu as $dept)
            @php $daftar = $estudanteKadaDepartamentu[$dept]; @endphp
            <div class="dept-list-card">
                <div class="dept-list-header">
                    <span>{{ $dept }}</span>
                    <span class="dept-list-count">{{ $daftar->count() }} Estudante</span>
                </div>

                @if($daftar->isNotEmpty())
                    <div class="dept-list-body">
                        <ul>
                            @foreach($daftar as $s)
                                <li>
                                    <strong>{{ $s->no_regis }}</strong> — {{ $s->nrn_estudante }}
                                    @if($s->status == 'Simu')
                                        <span style="color: #28a745; font-size: 12px; font-weight: 600; margin-left: 8px;">✓ Simu</span>
                                    @elseif($s->status == 'La simu')
                                        <span style="color: #9c1f2d; font-size: 12px; font-weight: 600; margin-left: 8px;">✗ La Simu</span>
                                    @else
                                        <span style="color: #d4a017; font-size: 12px; font-weight: 600; margin-left: 8px;">⏳ Prosesa</span>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @else
                    <div class="dept-empty">
                        Seidauk iha estudante ne'ebé hili departamentu ne'e.
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>

</body>
</html>