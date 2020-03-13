<?php $__env->startSection('title', 'Daftar Kehadiran'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  <?php if(session('danger')): ?>
    <div class="alert alert-danger">
        <?php echo e(session('danger')); ?>

    </div>
  <?php endif; ?>
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h3 class="m-0 font-weight-bold text-primary mb-2">Data Kehadiran Karyawan</h3>
      <a href="<?php echo e(url('/admin/absen/exportexcel')); ?>" class="btn btn-success btn-sm" onclick="return confirm('Download Excel?');"><i class="fas fa-print mr-1"></i>Export Execel</a>
      <a href="<?php echo e(url('/admin/absen/exportpdf')); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Cetak PDF?');" target="_blank"><i class="fas fa-print mr-1"></i>Cetak PDF</a>
      <a href="#" class="btn btn-primary btn-sm" data-target="#filter" data-toggle="modal"><i class="fas fa-print mr-1"></i>Filter Data</a>
    </div>
    <div class="card-body">
      <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>No</th>
                  <th>NIP</th>
                  <th>Nama</th>
                  <th>Stream</th>
                  <th>Pukul</th>
                  <th>Tanggal</th>
                  <th>Keterangan</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="content">
                <?php $__currentLoopData = $data_absen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $da): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr align="center">
                  <td><?php echo e($loop->iteration); ?></td>
                  <td><?php echo e($da->User['nip']); ?></td>
                  <td><?php echo e($da->User['nama']); ?></td>
                  <td><?php echo e($da->User->Stream['stream']); ?></td>
                  <td><?php echo e($da->jam_masuk); ?></td>
                  <td><?php echo e($da->tanggal); ?></td>
                  <td><?php echo e($da->catatan); ?></td>
                  <?php if($da->status == 'Accepting'): ?>
                    <td><span class="badge badge-success"><?php echo e($da->status); ?></span></td>
                  <?php elseif($da->status == 'Rejecting'): ?>
                    <td><span class="badge badge-danger"><?php echo e($da->status); ?></span></td>
                  <?php else: ?>
                    <td><span class="badge badge-warning"><?php echo e($da->status); ?></span></td>
                  <?php endif; ?>
                  <td>
                    <form action="<?php echo e(url('/admin/data-kehadiran/'. $da->id_absen)); ?>" method="POST">
                      <?php echo method_field('patch'); ?>
                      <?php echo csrf_field(); ?>
                      <a href="<?php echo e(url('/admin/data-kehadiran/' . $da->id_absen)); ?>" class="badge badge-primary">Detail</a>
                      <button type="submit" class="badge badge-success" name="prove" value="Accepting" onclick="return confirm('Accept?')">Accept</button>
                      <button type="submit" class="badge badge-danger" name="prove" value="Rejecting" onclick="return confirm('Reject?')">Reject</button>
                    </form>
                  </td>
                </tr>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="filter" tabindex="-1" role="dialog" aria-labelledby="filter" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="filter">Filter Data</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
        <div class="modal-body">
          <div class="row mb-3">
            <div class="col">
              <select id="nama" class="form-control js-example-basic-single" name="nama">
                <option value="">Pilih Nama</option>
                <?php $__currentLoopData = $data_karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($dk->id); ?>"><?php echo e($dk->nama); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="row justify-content-center">
            <div class="col">
              <input type="date" id="tanggalAwalAbsen" class="form-control" name="tanggalAwalAbsen">
            </div>
            <div class="col">
              <input type="date" id="tanggalAkhirAbsen" class="form-control" name="tanggalAkhirAbsen">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button id="filter-absen" class="btn btn-primary" data-dismiss="modal">Cari</button>
        </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/absen/index.blade.php ENDPATH**/ ?>