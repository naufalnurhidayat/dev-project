<?php $__env->startSection('title', 'Edit Agama'); ?>

<?php $__env->startSection('content'); ?>

<div class="container">
	<div class="row">
		<div class="col">
			<h3><i class="fas fa-edit"></i> Edit Agama</h3>
		</div>
	</div>
  <div class="row">
		<div class="col-4">
			<form method="post" action="<?php echo e('/admin/agama'); ?>/<?php echo e($agama->id); ?>">
				<?php echo method_field('patch'); ?>
				<?php echo csrf_field(); ?>
				<div class="form-group">
					<label for="agama">Agama</label>
					<input type="text" class="form-control <?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" id="agama" name="agama" value="<?php echo e($agama->agama); ?>">
					<?php $__errorArgs = ['agama'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <div class="invalid-feedback"><?php echo e($message); ?></div> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
				<button type="submit" class="btn btn-primary mt-3">Edit</button>
			</form>
		</div>
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Folder_iqbal\Prakerin\projek_pkl\Program_Cuti\dev-project\resources\views/admin/agama/edit.blade.php ENDPATH**/ ?>