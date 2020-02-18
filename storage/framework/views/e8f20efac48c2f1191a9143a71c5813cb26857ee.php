<?php $__env->startSection('title', 'Halaman Cuti'); ?>


<?php $__env->startSection('content'); ?>
  <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3 bg-primary">
              <h6 class="m-0 font-weight-bold text-white">Data Cuti Karyawan</h6>
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
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="table table-bordered">
                    <?php $__currentLoopData = $karyawan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <tr align="center">
                        <td><?php echo e($loop->iteration); ?></td>
                        <td><?php echo e($k->nama); ?></td>
                        <td><?php echo e($k->jenkel); ?></td>
                        <td><?php echo e($k->karyawan->role->role); ?></td>
                        <td>16-09-2020</td>
                        <td><span class="badge badge-warning">Pending</span></td>
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

<?php echo $__env->make('templates/template-cuti', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/cuti/index.blade.php ENDPATH**/ ?>