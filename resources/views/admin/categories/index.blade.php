@extends('admin.layouts.master')

@section('main-content')
<aside class="right-side">
	<section class="content-header">
		<h2>Categories</h2>
	</section>
	<section class="content">
		<div class="flash-message">
			@foreach (['danger','warning','success','info'] as $pesan)
				@if(Session::has('alert-'.$pesan))
				<p class="alert alert-{{ $pesan }} text-center">
					{{Session::get('alert-'.$pesan)}}
					<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a></p>
				@endif
			@endforeach
		</div>
		<div class="row"></div>
			<div class="panel panel-default">
			  	<div class="panel-heading clearfix">
			  		<h3 class="panel-title pull-left">Categories list</h3>
					<div class="pull-right">
						<a class="btn btn-sm btn-success" href="{{ route('categories.create') }}"><span class="fa fa-plus"></span> Create</a>
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			@if(count($categories) > 0)
			  			<thead>
			  				<tr>
			  					<th class="text-center">No</th>
			  					<th class="text-center">Title</th>
			  					<th class="text-center">Active</th>
			  					<th class="text-center">Action</th>
			  				</tr>
			  			</thead>
			  			<tbody>
			  				@php
			  					$no=1;
			  				@endphp
			  				@foreach($categories as $data)
			  				<tr>
			  					<td class="text-center">{{ $no++ }}</td>
			  					<td>{{ $data['title'] }}</td>
			  					<td class="text-center"><?php echo ($data['is_active'] == TRUE) ? "<i class='fa fa-check-square-o'></i>" : "<i class='fa fa-minus-square-o'></i>" ?></td>
			  					<td class="text-center">
			  						<a href='categories/{{ $data['id'] }}/edit' class='edit-data' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>
			  						<a href='#' onclick='return deletedata({{$data->id}})' class='delete-data' data-toggle='tooltip' title='Delete'><i class='fa fa-trash-o'></i></a>
			  					</td>
			  				</tr>
			  				@endforeach
			  			</tbody>
			  			@else
			  				<div class="text-center text-danger">No Data Available</div>
			  			@endif
			  		</table>
			  	</div>
			  </div>
		</div>
	</section>
</aside>
<form action="#" method="POST" id="form-delete">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
</form>
<script>

function deletedata(id) 
{
	if(confirm('Apakah anda yakin akan menghapus data ini ?'))
	{
		var str = "{{ route('categories.destroy', 'id') }}";
		var url = str.replace("id", id);
		$("#form-delete").attr("action", url);
		$('#form-delete').submit()
	}

	return false;
}
</script>
@endsection