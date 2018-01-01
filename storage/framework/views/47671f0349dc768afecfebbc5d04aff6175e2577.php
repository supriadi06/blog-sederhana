<?php $__env->startSection('main-content'); ?>

<style type="text/css">
	img {
    	max-width: 40%;
    	max-height: 100px;
	}

</style>
<aside class="right-side">
	<section class="content-header">
		<h2>Articles</h2>
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
			  		<h3 class="panel-title pull-left">Articles list</h3>
					<div class="pull-right">
						<a class="btn btn-sm btn-success" href="<?php echo e(route('articles.create')); ?>"><span class="fa fa-plus"></span> Create</a>
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			<?php if(count($articles) > 0): ?>
			  			<thead>
			  				<tr>
			  					<th class="text-center">No</th>
			  					<th class="text-center">Category</th>
			  					<th class="text-center">Title</th>
			  					<th class="text-center">Content</th>
			  					<th class="text-center">Header Picture</th>
			  					<th class="text-center">Created At</th>
			  					<th class="text-center">Status</th>
			  					<th class="text-center">Action</th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				<?php 
			  					$no=1;
			  				 ?>
			  				<?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  				<tr>
			  					<td class="text-center"><?php echo e($no++); ?></td>
			  					<td><?php echo e($data->category->title); ?></td>
			  					<td><a href="<?php echo e(route('articles.show', $data->id)); ?>" title="Preview"><?php echo e($data->title); ?></td></td>
			  					<td><?php echo substr($data->content,0, 100); ?></td>
			  					<td class="text-center"><img src="<?php echo e(asset('/images/'.$data->header_pic)); ?>" style="max-height:100px;max-width:100px;margin-top:10px;"></td>
			  					<td class="text-center"><?php echo e(date('Y-M-d H:i:s', strtotime($data['created_at']))); ?></td>
			  					<td>
			  						<?php if($data->is_show == TRUE): ?>
			  							<?php echo e('Showing'); ?>

			  						<?php else: ?>
			  							<?php echo e('Not Showing'); ?>

			  						<?php endif; ?>
			  					</td>
			  					<td class="text-center">
			  						<?php if($data->is_show == TRUE): ?>
			  						<a href='#' onclick='return deactivated(<?php echo e($data->id); ?>)' class='minus-data' data-toggle='tooltip' title='Deactivated'><i class='fa fa-minus-square-o'></i></a>
			  						<?php else: ?>
			  						<a href='#' onclick='return activated(<?php echo e($data->id); ?>)' class='check-data' data-toggle='tooltip' title='Activated'><i class='fa fa-check-square-o'></i></a>
			  						<?php endif; ?>
			  						<a href='articles/<?php echo e($data['id']); ?>/edit' class='edit-data' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>
			  						<a href='#' onclick='return deletedata(<?php echo e($data->id); ?>)' class='delete-data' data-toggle='tooltip' title='Delete'><i class='fa fa-trash-o'></i></a>
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
					<?php echo e($articles->links()); ?>

				</div>
			  </div>
		</div>
	</section>
</aside>
<form action="#" method="POST" id="form-delete">
	<?php echo e(method_field('DELETE')); ?>

	<?php echo e(csrf_field()); ?>

</form>
<form action="#" method="POST" id="form-activated">
	<?php echo e(method_field('POST')); ?>

	<?php echo e(csrf_field()); ?>

</form>
<form action="#" method="POST" id="form-deactivated">
	<?php echo e(method_field('GET')); ?>

	<?php echo e(csrf_field()); ?>

</form>
<script>

function deletedata(id) 
{
	if(confirm('Are you sure to delete thid data?'))
	{
		var str = "<?php echo e(route('articles.destroy', 'id')); ?>";
		var url = str.replace("id", id);
		$("#form-delete").attr("action", url);
		$('#form-delete').submit()
	}

	return false;
}

function activated(id) 
{
	if(confirm('Are you sure to show this article ?'))
	{
		var str = "<?php echo e(route('articles.activated', 'id')); ?>";
		var url = str.replace("id", id);
		$("#form-activated").attr("action", url);
		$('#form-activated').submit()
	}

	return false;
}

function deactivated(id) 
{
	if(confirm('Are you sure to not show this article ?'))
	{
		var str = "<?php echo e(route('articles.deactivated-article', 'id')); ?>";
		var url = str.replace("id", id);
		$("#form-deactivated").attr("action", url);
		$('#form-deactivated').submit()
	}

	return false;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>