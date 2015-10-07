@extends('app')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

    <form class="panel panel-default col-sm-offset-1 col-sm-10" method="post" files="true" enctype="multipart/form-data">
        <div class="panel-body">
        {!! Form::label('title_label', 'Title:') !!}
        {!! Form::text('title', '', ['class' => 'form-control']) !!}

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        {!! Form::label('file_label', 'Picture:') !!}
        <input type="file" name="image[]" class="form-control" multiple>

        {!! Form::label('description_label', 'Description:') !!}
        {!! Form::textarea('description', '', ['class' => 'form-control', 'rows' => '2']) !!}

        {!! Form::submit('submit', ['class' => 'btn btn-primary']) !!}
        </div>
    </form>

    <div class="container col-sm-offset-1 col-sm-10">
        @foreach ($images as $image)
        <div class="col-sm-4">
            <img src="{{ $image->location }}" alt="{{ $image->title }}" class="img-responsive"/>
            <p>{{ $image->description }}</p>
        </div>
        @endforeach
    </div>

@endsection