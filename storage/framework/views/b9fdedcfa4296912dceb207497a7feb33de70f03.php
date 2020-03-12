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
  <a href="<?php echo e(url('/tampil/table')); ?>" class="btn btn-primary mb-2">Pengajuan</a>
  
  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">

    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" height="20px" cellspacing="0">
          <thead>
            <tr align="center">
              <th>Nama Barang</th>
              <th>Nama Kategori</th>
              <th>Jumlah Pinjam</th>
              <th>Tanggal Pinjam</th>
              <th>Kembali</th>
              <th>Status</th>  
              <th>Action</th>
            </tr>
          </thead>
      
          <tbody>
            <?php $__currentLoopData = $pinjam; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $box): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
           <tr align="center"> 
           <td><?php echo e($box->Barang['nama_barang']); ?></td> 
           <td><?php echo e($box->Kategori->nama_kategori); ?></td>
           <td><?php echo e($box->jumlah_pinjam); ?></td>
           <td><?php echo e($box->tgl_pinjam); ?></td>
           <td><?php echo e($box->Kembali['status_kembali']); ?></td>
           <td>
            <?php if( $box->status == "Pending" ): ?>
                <span class="badge badge-warning btn-sm">Pending</span>
               <?php elseif( $box->status == "Accept" ): ?>
                <span class="badge badge-success btn-sm"><i class="fas fa-check"> Accept</i></span>
               <?php else: ?>
                <span class="badge badge-danger btn-sm">Rejected</span>
               <?php endif; ?>
           </td>
           <td>
             <a href="" class="btn btn-primary btn-sm "><i class="fas fa-print"> Print</i></a>
             <?php if($box->status == "Pending"): ?>
             <?php else: ?>
             <a href="" class="btn btn-secondary btn-sm" data-target="#kembali_<?php echo e($box->id_barang); ?>" data-toggle="modal">Pengembalian</a>
      </div>
    </div>
  </div>

     
  <div class="modal fade" id="kembali_<?php echo e($box->id_barang); ?>" tabindex="-1" role="dialog" aria-labelledby="kembali" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="kembali">Peminjaman</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        
        <div class="container">
          <div class="row justify-content-center">
            <div class="col">
              
                <form method="post" action="<?php echo e(url('/kembali/store')); ?>">
                <?php echo e(csrf_field()); ?>

                
              <input type="hidden" name="id_barang" value="<?php echo e($box->id_barang); ?>"> 
              <input type="hidden" name="id_kategori" value="<?php echo e($box->Kategori['id_kategori']); ?>">
              
              <div class="modal-body">Yakin ingin dikembalikan ?</div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Ajukan</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php endif; ?>
</td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</tbody>
</table>
</div>
<!-- /.container-fluid -->

      



<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/Invetaris/barang.blade.php ENDPATH**/ ?>