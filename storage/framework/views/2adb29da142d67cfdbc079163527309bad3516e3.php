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
                            <h4><?php echo e($user->nama); ?></h4>
                            <ul>
                                <li><?php echo e($user->nip); ?></li>
                                <li><?php echo e($user->tgl_lahir); ?></li>
                                <li><?php echo e($user->tmp_lahir); ?></li>
                                <li><?php echo e($user->email); ?></li>
                                <li><?php echo e($user->jenkel); ?></li>
                                <li><?php echo e($user->stream->stream); ?></li>
                                <li><?php echo e($user->pendidikan->pendidikan); ?></li>
                                <li><?php echo e($user->thn_join); ?></li>
                                <li><?php echo e($user->no_telp); ?></li>
                                <li><?php echo e($user->agama); ?></li>
                                <li><?php echo e($user->alamat); ?></li>
                            </ul>
                            <a href="<?php echo e(url('/admin/karyawan')); ?>" class="btn btn-primary ml-4">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/karyawan/detailkaryawan.blade.php ENDPATH**/ ?>