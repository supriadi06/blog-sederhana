<?php $__env->startSection('main-content'); ?>
<aside class="right-side">
	<section class="content-header">
		<h2>Categories</h2>
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
			  		<h3 class="panel-title pull-left">Categories list</h3>
					<div class="pull-right">
						<a class="btn btn-sm btn-success" href="<?php echo e(route('categories.create')); ?>"><span class="fa fa-plus"></span> Create</a>
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			<?php if(count($categories) > 0): ?>
			  			<thead>
			  				<tr>
			  					<th class="text-center">No</th>
			  					<th class="text-center">Title</th>
			  					<th class="text-center">Active</th>
			  					<th class="text-center">Action</th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				<?php 
			  					$no=1;
			  				 ?>
			  				<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  				<tr>
			  					<td class="text-center"><?php echo e($no++); ?></td>
			  					<td><?php echo e($data['title']); ?></td>
			  					<td class="text-center"><?php echo ($data['is_active'] == TRUE) ? "<i class='fa fa-check-square-o'></i>" : "<i class='fa fa-minus-square-o'></i>" ?></td>
			  					<td class="text-center">
			  						<a href='categories/<?php echo e($data['id']); ?>/edit' class='edit-data' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>
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
			  </div>
		</div>
	</section>
</aside>
<form action="#" method="POST" id="form-delete">
	<?php echo e(method_field('DELETE')); ?>

	<?php echo e(csrf_field()); ?>

</form>
<script>

function deletedata(id) 
{
	if(confirm('Apakah anda yakin akan menghapus data ini ?'))
	{
		var str = "<?php echo e(route('categories.destroy', 'id')); ?>";
		var url = str.replace("id", id);
		$("#form-delete").attr("action", url);
		$('#form-delete').submit()
	}

	return false;
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>