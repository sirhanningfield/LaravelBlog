@extends('main')

@section('title', 'Homepage')


@section('content')

      <div class="row">
        <div class="col-md-12">
          <div class="jumbotron">
            <h1>SirHanningfield's Blog!</h1>
            <p class="lead">This is my first ever website </p>
          </div>
        </div> 
      </div> <!--end of .row-->
      <div class="row">
        <div class="col-md-8">
          @foreach($posts as $post)

            <div class="post">
              <h3>{{$post->title}}</h3>
              <p>{{substr($post->body,0,200) }}{{strlen($post->body) > 200 ? "...":""}}</p>
              {!! Html::linkRoute('blog.single','Read More',array($post->slug),array('class'=>'btn btn-primary'))!!}
            </div>
            <hr>
          @endforeach
        </div>
        <div class="col-md-3">
          <h2>Side bar</h2>
        </div>
        
      </div><!-- end row-->
@endsection

@section('scripts')
  
@endsection