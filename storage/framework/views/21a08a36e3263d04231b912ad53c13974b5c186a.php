<?php $__env->startSection('main-content'); ?>
<aside class="right-side">
	<section class="content-header">
		<h2>Comments</h2>
	</section>
	<section class="content">
		<div class="flash-message">
			<?php $__currentLoopData = ['danger','warning','success','info']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pesan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				<?php if(Session::has('alert-'.$pesan)): ?>
				<p class="alert alert-<?php echo e($pesan); ?> text-center">
					<?php echo e(Session::get('alert-'.$pesan)); ?>

					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
				<?php endif; ?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
		<div class="row"></div>
			<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			  		<h3 class="panel-title pull-left">Approved Comments</h3>
					<div class="pull-right">
						
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			<?php if(count($comments) > 0): ?>
			  			<thead>
			  				<tr>
			  					<th class="text-center">No</th>
			  					<th class="text-center">Article Title</th>
			  					<th class="text-center">Comments</th>
			  					<th class="text-center">Created At</th>
			  					<th class="text-center">Status</th>
			  					<th class="text-center">Action</th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				<?php 
			  					$no=1;
			  				 ?>
			  				<?php $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  				<tr>
			  					<td class="text-center"><?php echo e($no++); ?></td>
			  					<td><a href="<?php echo e(route('articles.show', $data->article_id)); ?>" title="View Article"><?php echo e($data->article->title); ?></a></td>
			  					<td><?php echo e(substr($data->comments, 0,200)); ?></td>
			  					<td><?php echo e(date('d M Y H:i:s', strtotime($data->created_at))); ?></td>
			  					<td class="text-center"><?php echo e('Showing'); ?></td>
			  					<td class="text-center">
			  						<a href='<?php echo e(url('admin/reply/'.$data->id)); ?>' class='reply-data' data-toggle='tooltip' title='Reply'><i class='fa fa-comments'></i></a>
			  						<a href='#' onclick='return deactivated(<?php echo e($data->id); ?>)' class='check-data' data-toggle='tooltip' title='Deactivated'><i class='fa fa-minus-square-o'></i></a>
			  						
			  					</td>
			  				</tr>
			  				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  			</tbody>
			  			<?php else: ?>
			  				<div class="text-center text-danger">No Data Available</div>
			  			<?php endif; ?>
			  		</table>
			  	</div>
	  			<div class="text-center">
					<?php echo e($comments->links()); ?>

				</div>
			  </div>
		</div>
	</section>
</aside>
<form action="#" method="POST" id="form-delete">
	<?php echo e(method_field('DELETE')); ?>

	<?php echo e(csrf_field()); ?>

</form>
<form action="#" method="get" id="form-deactivated">
	<?php echo e(method_field('get')); ?>

	<?php echo e(csrf_field()); ?>

</form>
<script>

function deletedata(id) 
{
	if(confirm('Are sure to delete this data ?'))
	{
		var str = "<?php echo e(route('comments.hapus.comment', 'id')); ?>";
		var url = str.replace("id", id);
		$("#form-delete").attr("action", url);
		$('#form-delete').submit()
	}

	return false;
}
function deactivated(id) 
{
	if(confirm('Are you sure to not showing this comment ?'))
	{
		var str = "<?php echo e(route('comments.deactivated', 'id')); ?>";
		var url = str.replace("id", id);
		$("#form-deactivated").attr("action", url);
		$('#form-deactivated').submit()
	}

	return false;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>