@extends('main')

@section('title', 'Edit Post')

@section('content')
	
	<div class="row">
		{!!Form::model($post, ['route'=>['posts.update',$post->id], 'method'=> 'PUT', 'files'=>true]) !!}
			<div class="col-md-8">
				<div class="panel panel-primary">
				  <div class="panel-heading">
				  	{{form::label('title','Title:')}}
				  	{{form::text('title', null, ['class'=>"form-control input-lg "])}}
				  </div>
				
				  <div class="panel-body">
				  	{{form::label('body','Body:')}}
				    {{form::textarea('body',null,['class'=>"form-control"])}}
				  </div>
				</div>
				{{form::label('featured_image','update the Image')}}
				{{form::file('featured_image')}}<br>
			</div>
			<div class="col-md-4">
				<div class="well">
				<dl class="dl-horizontal">
					  	<dt>Url:</dt>
					  	<dd>
					  		{{form::text('slug',null,array('class'=>'form-control'))}}
					  	</dd>
					</dl>
					<dl class="dl-horizontal">
					  	<dt>Category:</dt>
					  	<dd>
					  		{{form::select('category_id',$cats,null,array('class'=>'form-control'))}}
					  	</dd>
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
							{{form::submit('Save Changes',['class'=>'btn btn-success btn-block'])}}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show','Cancel',array($post->id), array('class'=>'btn btn-danger btn-block')) !!}
						</div>
					</div>
				</div>
			</div>
		{!!form::close()!!}
	</div> <!-- end .row(form) -->

@endsection