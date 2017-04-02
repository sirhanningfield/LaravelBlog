@extends('main')

@section('title', 'Create Post')

@section('stylesheet')
	{!! Html::style('css/parsley.css')!!}
@endsection

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2>Create new post</h2>
		<hr>
		{!! Form::open(['route' => 'posts.store', 'data-parsley-validate'=>'', 'files'=>true]) !!}
   		 
			{{form::label('title',"Title")}}
			{{form::text('title', null, array('class' => 'form-control', 'required'=>'', 'maxlength'=>'255'))}}<br>
			
			{{form::label('Slug','Slug: ')}}
			{{form::text('slug',null,array('class'=>'form-control','required'=>'', 'minlength'=>'5', 'maxlength'=>'255'))}}<br>

			{{form::label('category_id','Category:')}}
			<select class="form-control" name="category_id">
				@foreach($categories as $category)
					<option value="{{$category->id}}">{{$category->name}}</option>
				@endforeach
				
			</select><br>

			{{form::label('tag_id','Tags:')}}
			<select class="js-example-basic-multiple form-control" multiple="multiple">
				@foreach($tags as $tag)
				  <option value="{{$tag->id}}">{{$tag->name}}</option>
				@endforeach    
			</select><br>

			{{form::label('featured_image','Upload an Image:')}}
			{{form::file('featured_image')}}<br>

			{{form::label('body',"Post Body")}}
			{{form::textarea('body',null,array('class'=>'form-control', 'required'=>''))}}<br>

			{{form::submit('Create Post',array('class'=>'btn btn-success'))}}
		{!! Form::close() !!}
	</div>
</div>



@endsection

@section('scripts')
	{{!! Html::script('js/parsley.min.js')!!}}
@endsection