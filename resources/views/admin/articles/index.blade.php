@extends('admin.layouts.master')

@section('main-content')

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
			  		<h3 class="panel-title pull-left">Articles list</h3>
					<div class="pull-right">
						<a class="btn btn-sm btn-success" href="{{ route('articles.create') }}"><span class="fa fa-plus"></span> Create</a>
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			@if(count($articles) > 0)
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
			  				@php
			  					$no=1;
			  				@endphp
			  				@foreach($articles as $data)
			  				<tr>
			  					<td class="text-center">{{ $no++ }}</td>
			  					<td>{{ $data->category->title }}</td>
			  					<td><a href="{{ route('articles.show', $data->id) }}" title="Preview">{{ $data->title }}</td></td>
			  					<td><?php echo substr($data->content,0, 100); ?></td>
			  					<td class="text-center"><img src="{{ asset('/images/'.$data->header_pic)  }}" style="max-height:100px;max-width:100px;margin-top:10px;"></td>
			  					<td class="text-center">{{ date('Y-M-d H:i:s', strtotime($data['created_at'])) }}</td>
			  					<td>
			  						@if($data->is_show == TRUE)
			  							{{ 'Showing' }}
			  						@else
			  							{{ 'Not Showing' }}
			  						@endif
			  					</td>
			  					<td class="text-center">
			  						@if($data->is_show == TRUE)
			  						<a href='#' onclick='return deactivated({{$data->id}})' class='minus-data' data-toggle='tooltip' title='Deactivated'><i class='fa fa-minus-square-o'></i></a>
			  						@else
			  						<a href='#' onclick='return activated({{$data->id}})' class='check-data' data-toggle='tooltip' title='Activated'><i class='fa fa-check-square-o'></i></a>
			  						@endif
			  						<a href='articles/{{ $data['id'] }}/edit' class='edit-data' data-toggle='tooltip' title='Edit'><i class='fa fa-pencil-square-o'></i></a>
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
	  			<div class="text-center">
					{{ $articles->links() }}
				</div>
			  </div>
		</div>
	</section>
</aside>
<form action="#" method="POST" id="form-delete">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
</form>
<form action="#" method="POST" id="form-activated">
	{{ method_field('POST') }}
	{{ csrf_field() }}
</form>
<form action="#" method="POST" id="form-deactivated">
	{{ method_field('GET') }}
	{{ csrf_field() }}
</form>
<script>

function deletedata(id) 
{
	if(confirm('Are you sure to delete thid data?'))
	{
		var str = "{{ route('articles.destroy', 'id') }}";
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
		var str = "{{ route('articles.activated', 'id') }}";
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
		var str = "{{ route('articles.deactivated-article', 'id') }}";
		var url = str.replace("id", id);
		$("#form-deactivated").attr("action", url);
		$('#form-deactivated').submit()
	}

	return false;
}
</script>
@endsection