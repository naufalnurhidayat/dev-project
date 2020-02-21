<?php $__env->startSection('title', 'Absen'); ?>

<?php $__env->startSection('content'); ?>

<?php
    date_default_timezone_set("Asia/Jakarta")
?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Form Keterangan Hadir</h5>
                        <form method="post" action="/absen">
                            <?php echo csrf_field(); ?>
                            <input type="hidden" class="form-control" id="id_karyawan" value="<?php echo e(1); ?>" name="id_karyawan">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" value="181910038" readonly name="nip">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="Naufal Nur Hidayat" readonly name="nama">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role" value="Admin" readonly name="role">
                            </div>
                            <div class="form-group">
                                <label for="masuk_pukul">Masuk Pukul</label>
                                <input type="text" class="form-control" id="masuk_pukul" value="<?php echo e(date('h:i:s')); ?>" readonly name="masuk_pukul">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" value="<?php echo e(date('d-M-Y')); ?>" readonly name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan" value="Masuk" readonly>
                            </div>
                            <button type="submit" class="btn btn-primary" name="masuk">Masuk</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/absen/absen.blade.php ENDPATH**/ ?>