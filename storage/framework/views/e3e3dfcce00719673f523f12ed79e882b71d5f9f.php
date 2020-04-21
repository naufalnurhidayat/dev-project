<?php $__env->startSection('title', 'Form Pengajuan Cuti'); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mb-5">
      <?php if(session('status')): ?>
        <div class="alert alert-danger">
          <?php echo e(session('status')); ?>

        </div>
      <?php endif; ?>
      <div class="row mx-auto">
        <div class="col">
          <h3 class="mb-4"><i class="fas fa-calendar-alt"></i> Form Pengajuan Cuti</h3>
          <form action="<?php echo e(url('/cuti')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="form-group">
              <label for="karyawan">Karyawan</label>
              <input type="text" class="form-control <?php $__errorArgs = ['karyawan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="karyawan" id="karyawan" value="<?php echo e(auth()->user()->nama); ?>" readonly>
              <?php $__errorArgs = ['karyawan'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
              <label for="jencut">Jenis Cuti</label>
              <select  class="form-control <?php $__errorArgs = ['Jenis_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Jenis_Cuti" id="jencut">
                  <option value="">-- Pilih Jenis Cuti --</option>
                <?php $__currentLoopData = $jencut; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $j): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($j->id); ?>"><?php echo e($j->jenis_cuti); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php $__errorArgs = ['Jenis_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group row">
              <div class="col-6">
                <label for="datePickerAwalCuti">Awal Cuti</label>
                <input type="text" autocomplete="off" readonly class="form-control <?php $__errorArgs = ['Awal_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Awal_Cuti" id="datePickerAwalCuti" value="<?php echo e(old('Awal_Cuti')); ?>">
                <?php $__errorArgs = ['Awal_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
              <div class="col-6">
                <label for="datePickerAkhirCuti">Akhir Cuti</label>
                <input type="text" autocomplete="off" readonly class="form-control <?php $__errorArgs = ['Akhir_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Akhir_Cuti" id="datePickerAkhirCuti" value="<?php echo e(old('Akhir_Cuti')); ?>">
                <?php $__errorArgs = ['Akhir_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
              </div>
            </div>
            <div class="form-group">
              <label for="totalCuti">Total Cuti</label>
              <input type="number" min="1" class="form-control <?php $__errorArgs = ['Total_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Total_Cuti" id="totalCuti" value="<?php echo e(old('Total_Cuti')); ?>">
              <?php $__errorArgs = ['Total_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <div class="form-group">
              <label for="alasan">Alasan Cuti</label>
              <textarea class="form-control <?php $__errorArgs = ['Alasan_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="Alasan_Cuti" id="alasan" rows="3"><?php echo e(old('Alasan_Cuti')); ?></textarea>
                <?php $__errorArgs = ['Alasan_Cuti'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?><div class="invalid-feedback"><?php echo e($message); ?></div><?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>
            <button type="submit" class="btn btn-success float-right">Submit</button>
            <a href="<?php echo e(url('/cuti')); ?>" class="btn btn-danger float-right mr-2">Kembali</a>
          </form>
        </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script>
  $(document).ready(function(){

    const pickerAwalCuti = datepicker('#datePickerAwalCuti', {
      formatter: (input, date, instance) => {
        input.value = date.toLocaleDateString()
      },
      minDate: new Date(<?php echo e(date('Y')); ?>, <?php echo e(date('m')-1); ?>, <?php echo e(date('d')); ?>),
      noWeekends: true
    });
    
    const pickerAkhirCuti = datepicker('#datePickerAkhirCuti', {
      formatter: (input, date, instance) => {
        input.value = date.toLocaleDateString()
      },
      minDate: new Date(<?php echo e(date('Y')); ?>, <?php echo e(date('m')-1); ?>, <?php echo e(date('d')); ?>),
      noWeekends: true
    });

    $("#jencut").change(function () {
      const jencut = $("#jencut").val();
      if (jencut == 1) {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '12');
          }
        });
      } else if (jencut == 2) {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '90');
          }
        });
      } else if (jencut == 3) {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").attr('max', '3');
          }
        });
      } else {
        $.ajax({
          type: 'get',
          dataType: 'html',
          success: function () {
            $("#totalCuti").removeAttr('max');
          }
        });
      }
    });

  });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates/template-home', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\devProject\resources\views/cuti/create.blade.php ENDPATH**/ ?>