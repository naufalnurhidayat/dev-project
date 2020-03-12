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
      <h3 class="m-0 font-weight-bold text-primary d-inline">Data Kehadiran Karyawan</h3>
      <a href="<?php echo e(url('/admin/absen/exportexcel')); ?>" class="btn btn-success float-right"><i class="fas fa-print"></i></a>
      <a href="<?php echo e(url('/admin/absen/exportpdf')); ?>" class="btn btn-danger float-right mr-2"><i class="fas fa-print"></i></a>
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
              <tbody>
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

  <?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/admin/absen/index.blade.php ENDPATH**/ ?>