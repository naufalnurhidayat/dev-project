<?php $__env->startSection('title', 'Halaman Cuti'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
  <!-- Page Heading -->
  <?php if(session('status')): ?>
    <div class="alert alert-success">
      <?php echo e(session('status')); ?>

    </div>
  <?php endif; ?>
  
  <div class="row mt-3">
      <div class="col">
          <div class="jumbotron mx-auto text-center">
              <h1 class="display-3">Hallo, Nama User!</h1>
              <p class="lead">Selamat datang di fitur cuti (Divisi Digital Service) PT Telekomunikasi Indonesia</p>
              <hr class="my-4">
              <p>Silahkan klik tombol kalender jika anda ingin membuat pengajuan cuti. Silahkan klik tombol home jika ingin kembali ke home.</p>
              <a href="<?php echo e(url('/cuti/create')); ?>" class="btn btn-success btn-circle btn-lg">
                  <i class="fas fa-calendar-plus"></i>
              </a>
          </div>
      </div>
  </div>
        <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Data Cuti Anda</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead class="bg-dark text-white">
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Role</th>
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
                        <td><?php echo e($c->User->Role['role']); ?></td>
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
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Prakerin\projek_pkl\Program_Cuti\dev-project\resources\views/cuti/index.blade.php ENDPATH**/ ?>