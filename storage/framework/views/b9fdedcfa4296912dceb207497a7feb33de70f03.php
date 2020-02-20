<?php $__env->startSection('title', 'Data Barang'); ?>

<?php $__env->startSection('content'); ?>


<?php if(session('status')): ?>
    <div class="alert alert-success">
        <?php echo e(session('status')); ?>

    </div>
<?php endif; ?>
<!-- Begin Page Content -->
<div class="container-fluid">
  <!-- Page Heading -->
  
  <h1 class="h3 mb-2 text-gray-800">Data Barang</h1>
  <a href="/" class="btn btn-danger mb-2">Kembali</a>
<a href="<?php echo e(url('/invetaris/pengajuan')); ?>" class="btn btn-primary mb-2">Pengajuan</a>
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Stok</th>
              <th>Type</th>
              <th>Kondisi</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            <?php $__currentLoopData = $barang; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $box): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr> 
           <td><?php echo e($box->nama_barang); ?></td> 
           <td><?php echo e($box->Kategori->nama_kategori); ?></td>
           <td><?php echo e($box->stok); ?></td>
           <td><?php echo e($box->type); ?></td>
           <td><?php echo e($box->kondisi); ?></td>
           <td>
           <a href="<?php echo e(url('/show')); ?>/<?php echo e($box->id_barang); ?>" class="btn btn-primary btn-sm"><i class="fa fa-search-plus"></i> Detail</a>
           <a href="" data-toggle="modal" data-target="#pinjam" class="btn btn-success btn-sm"><i class="fa fa-book"></i> Pinjam</a>
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

<div class="modal fade" id="pinjam" tabindex="-1" role="dialog" aria-labelledby="pinjam" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="pinjam">Ingin mengajukan peminjaman barang ?</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Klik 'OK' untuk Pengajuan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
      <a class="btn btn-primary" href="<?php echo e(url('/pinjam/create')); ?>/<?php echo e($box->id_barang); ?>">OK</a>
      </div>
    </div>
  </div>
</div>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/Invetaris/barang.blade.php ENDPATH**/ ?>