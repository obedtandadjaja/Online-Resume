@extends('app')

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

<div class="col-md-10 col-md-offset-1">
	<h2>
		Activities
		<hr/>
	</h2>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					Add
				</div>
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="POST" action="">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-4 control-label">Activity Name:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Time Period:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="time_period">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Description:</label>
								<div class="col-md-6">
									<textarea class="form-control" name="description" rows="4"></textarea>
								</div>
							</div>
							<div class="form-group">
								<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Submit
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

	@foreach ($activities as $activity)
		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							<strong>Activity Name:</strong>
							{{ $activity->name }}
						</div>
						
						<!-- Time Period -->

						<div class="panel-body">
							<strong>Time Period:</strong>
							<br/>
							<p class="col-md-12">{{ $activity->time_period }}</p>
						</div>
						
						<!-- Description -->
						
						<div class="panel-body">
							<strong>Description:</strong>
							<br/>
							<p class="col-md-12">{{ $activity->description }}</p>
						</div>

						<!-- Buttons -->
						
						<div class="panel-body">
							{!! Form::open(array('route' => array('update_activities.destroy', $activity->id), 'method' => 'delete', 'class' => 'pull-right')) !!}
								<button class="btn btn-primary">Remove</button>
							{!! Form::close() !!}
							<a href="update_activities/{{ $activity->id }}" class="pull-left">
								<button class="btn btn-primary">Edit</button>
							</a>
						</div>

					</div>
				</div>
			</div>
		</div>
	@endforeach

@endsection

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/thumbnail/font-awesome.min.css') }}">

@endsection