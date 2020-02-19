<?php $__env->startSection('title', 'Izin Absen'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">Form Keterangan Tidak Hadir</h5>
                        <form method="POST" action="">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" class="form-control" id="nip" value="NIP" readonly name="nip">
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" value="Nama Karyawan" readonly name="nama">
                            </div>
                            <div class="form-group">
                                <label for="role">Role</label>
                                <input type="text" class="form-control" id="role" value="Role Karyawan" readonly name="role">
                            </div>
                            <div class="form-group">
                                <label for="izin_pukul">Izin Pukul</label>
                                <input type="text" class="form-control" id="izin_pukul" value="<?php echo e(time()); ?>" readonly name="izin_pukul">
                            </div>
                            <div class="form-group">
                                <label for="tanggal">Tanggal</label>
                                <input type="text" class="form-control" id="tanggal" value="<?php echo e(date('d-M-Y')); ?>" readonly name="tanggal">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input type="text" class="form-control" id="keterangan" name="keterangan">
                            </div>
                            <button type="submit" class="btn btn-primary" name="izin">Izin</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/absen/izinabsen.blade.php ENDPATH**/ ?>