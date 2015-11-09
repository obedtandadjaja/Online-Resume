@extends('app')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

<div class="col-md-10 col-md-offset-1">
	<h2>
		Update Bio
		<hr/>
	</h2>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Full Name:</strong>
					<p rows="1">{{ $user->name }}</p>

				</div>

				<!-- Age-->

				<div class="panel-body">
					<strong>Age:</strong>
					<br/>
					<p class="col-md-12">{{ $user->age }}</p>
				</div>

                <!-- Occupation-->

                <div class="panel-body">
                    <strong>Occupation:</strong>
                    <br/>
                    <p class="col-md-12">{{ $user->occupation }}</p>
                </div>

                <!-- Focus -->

                <div class="panel-body">
                    <strong>Focus:</strong>
                    <br/>
                    <p class="col-md-12">{{ $user->focus }}</p>
                </div>

				<!-- Religion -->

				<div class="panel-body">
					<strong>Religion:</strong>
					<br/>
					<p class="col-md-12">{{ $user->religion }}</p>
				</div>
								
				<!-- Degrees -->
				
				<div class="panel-body">
					<strong>Degrees:</strong>
					<br/>
					<p class="col-md-12">{{ $user->degree }}</p>
				</div>

				<!-- Nationality -->
				
				<div class="panel-body">
					<strong>Nationality:</strong>
					<br/>
					<p class="col-md-12">{{ $user->nationality }}</p>
				</div>

				<!-- Ethnicity -->
				
				<div class="panel-body">
					<strong>Ethnicity:</strong>
					<br/>
					<p class="col-md-12">{{ $user->ethnicity }}</p>
				</div>

				<!-- Language -->
				
				<div class="panel-body">
					<strong>Language:</strong>
					<br/>
					<p class="col-md-12">{{ $user->language }}</p>
				</div>

				<!-- Summary -->
				
				<div class="panel-body">
					<strong>Summary:</strong>
					<br/>
					<p class="col-md-12" rows="5">{{ $user->summary }}</p>
				</div>

				<!-- Photos -->
				
				<div class="panel-body">
					<strong>Pictures:</strong>

					<br/>
                    @foreach($user->imageUri as $image)
                    <img src="{{ $image->location }}">
                    @endforeach
				</div>

				<!-- Buttons -->
				
				<div class="panel-body">
					<a href="update_bio/1">
						<button class="btn btn-primary">Edit</button>
					</a>
				</div>

			</div>
		</div>
	</div>
</div>

@endsection

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/thumbnail/font-awesome.min.css') }}">

@endsection