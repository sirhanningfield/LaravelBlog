@extends('main')

@section('title','Posts')
@section('content')
	
	<div class="row">
		<div class="col-md-10">
			<h1>All Posts</h1>
		</div>
		<div class="col-lg-2">
			{!!Html::linkRoute('posts.create', 'Create New Post', array(),array('class'=>'btn btn-block btn-success btn-h1-spacing'))!!}
		</div>
		<div class="col-md-12">
			<hr>
		</div>
	</div><!-- end of row -->
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<thead>
					<th>#</th>
					<th>Title</th>
					<th>Body</th>
					<th>Created At</th>
					<th></th>
				</thead>
				<tbody>
					@foreach($posts as $post)
						<tr>
							<th>{{$post->id}}</th>
							<td>{{$post->title}}</td>
							<td>{{substr($post->body, 0,50)}}{{strlen($post->body) > 50 ? "...":""}}</td>
							<td>{{date('d M, Y h:ia', strtotime($post->created_at))}}</td>
							<td>
								{!!Html::linkRoute('posts.show','View',array($post->id),array('class'=>'btn btn-default btn-sm btn-block'))!!} 

								{!! Form::open(['route'=>['posts.destroy', $post->id],'method'=>'DELETE']) !!}

									{{Form::submit('Delete',['class'=>'btn btn-danger btn-block btn-sm'])}}
								
								{!! Form::close() !!}
							</td>

						</tr>
					@endforeach
				</tbody>
			</table>
			<div class="text-center">
				
				{!! $posts->links(); !!}

			</div>
		</div>
	</div> <!-- end of .row -->


@endsection