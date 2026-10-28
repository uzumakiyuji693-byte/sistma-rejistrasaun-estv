<!DOCTYPE html>
<html lang="tet">
<head>
    <link rel="icon" href="<?php echo e(asset('images/logo-estv-gti.webp')); ?>" type="image/webp">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Estudante — <?php echo e($nome); ?></title>
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
    <h1>📋 Lista Estudante — <?php echo e($nome); ?></h1>
    <a href="<?php echo e(route('admin.estudantes.index')); ?>">← Fali ba Lista</a>
</div>

<div class="container">
    <a href="<?php echo e(route('admin.estudantes.index')); ?>" class="back-btn">← Back to Dashboard</a>
    
    <div class="card">
        <div class="card-header">
            Estudante sira ne'ebé hili <?php echo e($nome); ?>

        </div>
        <div class="card-body">
            <?php if($estudantes->count() > 0): ?>
            <!-- KOTAK PENCARIAN -->
            <div style="margin: 20px;">
                <form method="GET" action="" style="display: flex; gap: 10px; align-items: center; max-width: 600px;">
                    <input 
                        type="text" 
                        name="cari" 
                        placeholder="Buka ho Naran Estudante ka Númeru Rejistu..." 
                        value="<?php echo e(request('cari')); ?>"
                        style="flex: 1; padding: 10px 15px; border: 1px solid #ddd; border-radius: 6px; font-size: 14px;"
                    >
                    <button 
                        type="submit" 
                        style="padding: 10px 20px; background: #9c1f2d; color: white; border: none; border-radius: 6px; cursor: pointer; font-weight: 600;"
                    >
                        Buka
                    </button>
                    <?php if(request('cari')): ?>
                        <a 
                            href="<?php echo e(url()->current()); ?>"
                            style="padding: 10px 20px; background: #666; color: white; border: none; border-radius: 6px; text-decoration: none; display: inline-block; line-height: 1;"
                        >
                          Buka Fila Fali
                        </a>
                    <?php endif; ?>
                </form>
            </div>

            <?php
                $kunci = request('cari');
                if ($kunci) {
                    $estudantes = $estudantes->filter(function($item) use ($kunci) {
                        return stripos($item->nrn_estudante, $kunci) !== false 
                            || stripos($item->no_regis, $kunci) !== false;
                    });
                }
            ?>

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
                        <?php $__currentLoopData = $estudantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $ditemukan = $kunci && (
                                    stripos($est->nrn_estudante, $kunci) !== false || 
                                    stripos($est->no_regis, $kunci) !== false
                                );
                            ?>
                        <tr class="<?php echo e($ditemukan ? 'ditemukan' : ''); ?>">
                            <td><?php echo e($index + 1); ?></td>
                            <td>
                                <?php if($ditemukan): ?>
                                    <strong style="color: #9c1f2d;"><?php echo e($est->no_regis); ?></strong>
                                <?php else: ?>
                                    <?php echo e($est->no_regis); ?>

                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if($ditemukan): ?>
                                    <strong style="color: #9c1f2d; font-size: 15px;"><?php echo e($est->nrn_estudante); ?></strong>
                                <?php else: ?>
                                    <?php echo e($est->nrn_estudante); ?>

                                <?php endif; ?>
                            </td>
                            <td><?php echo e($est->eskola_anterior); ?></td>
                            <td>
                                <?php if($est->status == 'Simu'): ?>
                                    <span style="color:green; font-weight:bold;">Simu</span>
                                <?php elseif($est->status == 'Rejeita'): ?>
                                    <span style="color:red; font-weight:bold;">Rejeita</span>
                                <?php else: ?>
                                    <span style="color:orange; font-weight:bold;">Prosesa</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo e(route('admin.estudantes.edit', $est->id)); ?>" style="color:#2980b9; text-decoration:none; margin-right:10px;">Edita</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="total-info">
                    Total: <strong><?php echo e($estudantes->count()); ?></strong> Estudante
                </div>
            <?php else: ?>
                <div class="empty">
                    <h3>Seidauk iha estudante ne'ebé hili <?php echo e($nome); ?></h3>
                    <p>Seidauk iha dadus rejistu tanba ainda la iha estudante ne'ebé hili departamentu ne'e.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>

</body>
</html><?php /**PATH C:\Users\user\Desktop\rejistu_estv\resources\views/admin/departamentu-lista.blade.php ENDPATH**/ ?>