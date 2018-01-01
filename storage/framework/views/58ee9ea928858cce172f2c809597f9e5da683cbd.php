<?php $__env->startSection('main-content'); ?>
<style type="text/css">
	.post-container {
	    margin: 1px;
	}
	.post-thumb {
	    float: left
	}
	.post-thumb img {
	    display: block;
	    max-height:150px;
	    max-width:150px;
	    margin-top:10px;
	}
	.post-content {
	    margin-left: 160px
	}
	.post-title {
	    font-weight: bold;
	    font-size: 200%
	}
	.box-content{
		margin: 1px;
		border: 2px solid #EFF0F1;

	}
	.post-thumb {
		margin: 2px;
		border: 1px solid #EFF0F1;
	}
	#not_found {
		margin-top: 20px;
	}
	h6.date-comment {
		margin-left: 0px;
		font-size: 10px;
	}
	hr{
		margin: 5px;
	}
	h4.post-title {
		margin-bottom: 0px;
	}
	img {
	    max-width: 40%;
	    max-height: 100px;
	}
</style>
	<?php if(count($articles)>0): ?>
		<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row box-content">
			<div class="col-md-12">
				<div class="box-body">
					<h4 class="post-title"><?php echo e($data->title); ?></h4>
					<h6 class="date-comment"><i class="fa fa-user"></i> <?php echo e(ucwords($data->user->name)); ?> &nbsp;&nbsp;<i class="fa fa-calendar"></i> <?php echo e(date('d M Y', strtotime($data->created_at))); ?> &nbsp;&nbsp;<i class="fa fa-comments"> <?php echo e($data->comment->count()); ?></i></h6>
					<div class="post-container">
						<div class="post-thumb"><img src="<?php echo e(asset('/images/'.$data->header_pic)); ?>" class="img-responsive" width="304" height="236"></div>
					    <div class="post-content">
					        <p><?php echo substr($data->content, 0, 300); ?><a href="<?php echo e('/article/'.$data->id.'/show'); ?>">Read more...</a></p>
					   </div>
					</div>
				</div>
				<div class="text-center">
					<?php echo e($articles->links()); ?>

				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
		<div class="text-center" id="not_found">Data not Available</div>
	<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>