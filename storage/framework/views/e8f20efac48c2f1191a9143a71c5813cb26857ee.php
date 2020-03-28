<?php $__env->startSection('title', 'Halaman Cuti'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <!-- Page Heading -->
  <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  <?php if(session('jatah')): ?>
    <div class="alert alert-danger">
      <?php echo e(session('jatah')); ?>

    </div>
  <?php endif; ?>
  <a href="<?php echo e(url('/cuti/create')); ?>" class="btn btn-primary mb-3"><i class="fas fa-calendar-plus">&nbsp; Buat Pengajuan Cuti</i></a>
<!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h5 class="m-0 font-weight-bold text-primary d-inline">Data Cuti Anda</h5>
      <h6 class="float-right text-info font-weight-bold mt-1"><?php $user = auth()->user()->jatah_cuti; ?>
        Sisa Cuti :
        <?php if($user == 0): ?>
            <span class="text-danger"><?php echo e($user); ?></span>
        <?php else: ?>
            <span class="text-success"><?php echo e($user); ?></span>
        <?php endif; ?>
      </h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
          <thead class="bg-dark text-white">
            <tr>
              <th>No</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Stream</th>
              <th>Tanggal Pengajuan Cuti</th>
              <th>Jenis Cuti</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody class="table table-bordered">
            <?php $__currentLoopData = $cuti; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <tr align="center">
                <td><?php echo e($loop->iteration); ?></td>
                <td><?php echo e($c->User['nama']); ?></td>
                <td><?php echo e($c->User['jenkel']); ?></td>
                <td><?php echo e($c->User->Stream['stream']); ?></td>
                <td><?php echo e($c->tgl_cuti); ?></td>
                <td><?php echo e($c->jenis_cuti['jenis_cuti']); ?></td>
                <td>
                  <?php if($c->status === 'Terima'): ?>
                    <span class="badge badge-success"><?php echo e($c->status); ?></span>
                  <?php elseif($c->status === 'Tolak'): ?>
                    <span class="badge badge-danger"><?php echo e($c->status); ?></span>
                  <?php else: ?>                          
                    <span class="badge badge-warning"><?php echo e($c->status); ?></span>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/cuti/index.blade.php ENDPATH**/ ?>