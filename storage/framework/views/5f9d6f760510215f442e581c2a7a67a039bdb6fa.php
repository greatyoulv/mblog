<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">新增一篇文章</div>
                <div class="panel-body">

                    <?php if(count($errors) > 0): ?>
                        <div class="alert alert-danger">
                            <strong>新增失败</strong> 输入不符合要求<br><br>
                            <?php echo implode('<br>', $errors->all()); ?>

                        </div>
                    <?php endif; ?>

                    <form action="<?php echo e(url('admin/articles')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        <input type="text" name="title" class="form-control" required="required" placeholder="请输入标题">
                        <br>
                    	<textarea name="body" class="form-control" id="fieldTest" rows="10" placeholder="请输入内容"></textarea>
                        <br>
                        <button class="btn btn-lg btn-info">新增文章</button>
                    </form><br>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>