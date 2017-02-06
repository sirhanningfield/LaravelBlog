@extends('main')

@section('title','Index')

@section('content')
	
	<div class="row">
		<div class="col-md-12 text-center lead">
			<h1>Blog</h1>
			<hr>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			@foreach($posts as $post)
			
				<h2>{{$post->title}}</h2>
				<h5><i>{{date('M j, Y', strtotime($post->created_at))}}<i><h5>
				<p class="lead">{{substr($post->body,0,250)}}{{strlen($post->body) > 250 ? "..." : ""}}</p>
				{{Html::linkRoute('blog.single','Read More',array($post->slug))}}
				<hr>
			@endforeach
		</div>
	</div>

@endsection