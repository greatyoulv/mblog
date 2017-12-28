<?php $__env->startSection('content'); ?>
<div class="container">
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">
					文件管理
				</h3>
			</div>
			<div class="panel-body">
				 <?php if(count($errors) > 0): ?>
                 	<div class="alert alert-danger">
                    	<strong>新增失败</strong> 输入不符合要求<br><br>
                        <?php echo implode('<br>', $errors->all()); ?>

                    </div>
                 <?php endif; ?>

				<a href="<?php echo e(url('files/create')); ?>" class="btn btn-lg btn-success">上传</a>

			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>