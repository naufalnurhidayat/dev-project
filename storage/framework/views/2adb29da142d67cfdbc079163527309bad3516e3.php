<?php $__env->startSection('title', 'Detail Karyawan'); ?>
    
<?php $__env->startSection('content'); ?>
    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card mb-3">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="<?php echo e(asset('img/profile/' . $user->foto)); ?>" class="card-img">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h4><strong>Nama: </strong><?php echo e($user->nama); ?></h4>
                            <ul>
                                <li><strong>NIP: </strong><?php echo e($user->nip); ?></li>
                                <li><strong>Tanggal Lahir: </strong><?php echo e($user->tgl_lahir); ?></li>
                                <li><strong>Tempat Lahir: </strong><?php echo e($user->tmp_lahir); ?></li>
                                <li><strong>Email: </strong><?php echo e($user->email); ?></li>
                                <li><strong>Jenis Kelamin: </strong><?php echo e($user->jenkel); ?></li>
                                <li><strong>Stream: </strong><?php echo e($user->stream->stream); ?></li>
                                <li><strong>Role: </strong><?php echo e($user->role->role); ?></li>
                                <li><strong>Pendidikan: </strong><?php echo e($user->pendidikan->pendidikan); ?></li>
                                <li><strong>Tahun Join: </strong><?php echo e($user->thn_join); ?></li>
                                <li><strong>Nomor Telpon: </strong><?php echo e($user->no_telp); ?></li>
                                <li><strong>Agama: </strong><?php echo e($user->agama); ?></li>
                                <li><strong>Alamat: </strong><?php echo e($user->alamat); ?></li>
                                <?php if( $user->is_active == 0): ?>
                                <li><strong>Akun: </strong><span class="badge badge-danger">Tidak aktif</span></li>
                                <?php else: ?>
                                <li><strong>Akun: </strong><span class="badge badge-success">Aktif</span></li>
                                <?php endif; ?>
                            </ul>
                            <a href="<?php echo e(url('/admin/karyawan')); ?>" class="btn btn-primary ml-4">Kembali</a>
                            <?php if( $user->is_active == 0): ?>
                            <form action="<?php echo e(url('/admin/karyawan/aktivasi/' . $user->id)); ?>" method="POST" class="d-inline">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('patch'); ?>
                                <button name="aktivasi" class="btn btn-success" value="1" onclick="return confirm('Aktivasi akun ini?')">Aktivasi</button>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/karyawan/detailkaryawan.blade.php ENDPATH**/ ?>