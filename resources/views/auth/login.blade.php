@extends('main')

@section('title','Login')

@section('content')
	
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			
			{!!Form::open()!!}

				{!!form::label('name','Name: ')!!}
				{!!form::email('name',null,['class'=>'form-control'])!!}

				<br>
				{!!form::label('email','Email: ')!!}
				{!!form::email('email',null,['class'=>'form-control'])!!}

				<br>
				{!!form::label('password','Password: ')!!}
				{!!form::password('password',['class'=>'form-control'])!!}

				<br>
				{!!form::checkbox('remember_token')!!}
				{!!form::label('Remember me')!!}

				<br><br>
				{!!form::submit('Login',['class'=>'btn btn-success'])!!}




			{!!Form::close()!!}

		</div>
	</div>
	
	

@endsection