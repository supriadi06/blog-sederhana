@extends('admin.layouts.master')

@section('main-content')
<aside class="right-side">
	<section class="content-header">
		<h2>Comments</h2>
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
			  		<h3 class="panel-title pull-left">Approved Comments</h3>
					<div class="pull-right">
						
					</div>
				</div>
			  <div class="panel-body">
			  	<div class="table-responsive">
			  		<table class="table table-bordered table-striped">
			  			@if(count($comments) > 0)
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
			  				@php
			  					$no=1;
			  				@endphp
			  				@foreach($comments as $data)
			  				<tr>
			  					<td class="text-center">{{ $no++ }}</td>
			  					<td><a href="{{ route('articles.show', $data->article_id) }}" title="View Article">{{ $data->article->title }}</a></td>
			  					<td>{{ substr($data->comments, 0,200) }}</td>
			  					<td>{{ date('d M Y H:i:s', strtotime($data->created_at)) }}</td>
			  					<td class="text-center">{{ 'Showing' }}</td>
			  					<td class="text-center">
			  						<a href='{{ url('admin/reply/'.$data->id) }}' class='reply-data' data-toggle='tooltip' title='Reply'><i class='fa fa-comments'></i></a>
			  						<a href='#' onclick='return deactivated({{$data->id}})' class='check-data' data-toggle='tooltip' title='Deactivated'><i class='fa fa-minus-square-o'></i></a>
			  						{{-- <a href='#' onclick='return deletedata({{$data->id}})' class='delete-data' data-toggle='tooltip' title='Delete'><i class='fa fa-trash-o'></i></a> --}}
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
					{{ $comments->links() }}
				</div>
			  </div>
		</div>
	</section>
</aside>
<form action="#" method="POST" id="form-delete">
	{{ method_field('DELETE') }}
	{{ csrf_field() }}
</form>
<form action="#" method="get" id="form-deactivated">
	{{ method_field('get') }}
	{{ csrf_field() }}
</form>
<script>

function deletedata(id) 
{
	if(confirm('Are sure to delete this data ?'))
	{
		var str = "{{ route('comments.hapus.comment', 'id') }}";
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
		var str = "{{ route('comments.deactivated', 'id') }}";
		var url = str.replace("id", id);
		$("#form-deactivated").attr("action", url);
		$('#form-deactivated').submit()
	}

	return false;
}
</script>
@endsection