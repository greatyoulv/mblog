<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					文件上传
				</h3>
			</div>
			<div class="panel-body">

				<form action="<?php echo e(url('admin/files')); ?>" method="POST" enctype="multipart/form-data" >
					<?php echo e(csrf_field()); ?>


					<input type="file" class="form-control" name="file">
					<button type="submit" class="btn btn-success">提交</button>
				</form>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>