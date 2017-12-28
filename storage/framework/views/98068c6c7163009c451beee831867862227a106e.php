<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

					<div >
            				<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                				<div class="title">
                    				<a href="<?php echo e(url('article/'.$article->id)); ?>">
                        				<h4><?php echo e($article->title); ?></h4>
                    				</a>
                				</div>
								<br>
                				<div class="body">
                    				<p><?php echo e($article->body); ?></p>
                				</div>
								<hr>
            				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    				</div>
					
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>