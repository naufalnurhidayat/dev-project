<?php $__env->startSection('title', 'Detail Karyawan'); ?>
    
<?php $__env->startSection('content'); ?>
    
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <h1>Detail Karyawan</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <ul>
                            <li>NIP: <?php echo e($karyawan->nip); ?></li>
                            <li>Nama: <?php echo e($karyawan->nama); ?></li>
                            <li>Tempat Lahir: <?php echo e($karyawan->tmp_lahir); ?></li>
                            <li>Tanggal Lahir: <?php echo e($karyawan->tgl_lahir); ?></li>
                            <li>Email: <?php echo e($karyawan->email); ?></li>
                            <li>Jenis Kelamin: <?php echo e($karyawan->jenkel); ?></li>
                            <li>Role: <?php echo e($karyawan->Role['role']); ?></li>
                            <li>Pendidikan: <?php echo e($karyawan->Pendidikan['pendidikan']); ?></li>
                            <li>Tahun Join: <?php echo e($karyawan->thn_join); ?></li>
                            <li>No. Telpon: <?php echo e($karyawan->no_telp); ?></li>
                            <li>Agama: <?php echo e($karyawan->Agama['agama']); ?></li>
                            <li>Alamat: <?php echo e($karyawan->alamat); ?></li>
                        </ul>
                        <a href="<?php echo e(url('/karyawan')); ?>" class="btn btn-primary ml-4">Kembali</a>
                    </div>
                  </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/karyawan/detailkaryawan.blade.php ENDPATH**/ ?>