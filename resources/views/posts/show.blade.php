@extends('main')

@section('title', 'View Post')
@section('content')

	<div class="row">
		<div class="col-md-8">
			<div class="panel panel-primary">
			  <div class="panel-heading"><h1> {{ $post->title }} </h1></div>
			  <div class="panel-body">
			    <p class="lead"> {{$post->body}} </p>
			  </div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="well">
			<dl class="dl-horizontal">
				  	<dt>Url Slug: </dt>
				  	<dd><a href="{{url('blog/'.$post->slug) }}">{{$post->slug}}</a></dd>
				</dl>
				<dl class="dl-horizontal">
				  	<dt>Created At:</dt>
				  	<dd><i>{{ date('d, M Y  h:ia',strtotime($post->created_at))}}<i></dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last update:</dt>
					<dd><i>{{date('d, M Y  h:ia',strtotime($post->updated_at))}}<i></dd>
				</dl>
				<hr>
				<div class="row">
					<div class="col-sm-6">
						{!! Html::linkRoute('posts.edit','Edit',array($post->id), array('class'=>'btn btn-primary btn-block')) !!}
					</div>
					<div class="col-sm-6">
						{!! Form::open(['route'=>['posts.destroy', $post->id],'method'=>'DELETE']) !!}

							{{Form::submit('Delete',['class'=>'btn btn-danger btn-block'])}}
						
						{!! Form::close() !!}
					</div>
					<div class="col-sm-12">
						{!! Html::linkRoute('posts.index','<<Back to all posts', array(),array('class'=>'btn btn-block btn-default btn-spacing')) !!}
					</div>
				</div>
			</div>
		</div>
	</div>

	
	
	

@endsection