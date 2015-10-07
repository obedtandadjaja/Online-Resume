@extends('app')

@section('content')

		<div class="container">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="panel panel-default">
						<div class="panel-body">
							<form class="form-horizontal" role="form" method="GET" action="{{ $activity->id }}/edit">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
									<div class="form-group">
										<label class="col-md-4 control-label">Activity Name:</label>
										<div class="col-md-6">
											<textarea class="form-control" name="name" rows="1">{{ $activity->name }}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Time Period:</label>
										<div class="col-md-6">
											<textarea class="form-control" name="time_period" rows="1">{{ $activity->time_period }}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label class="col-md-4 control-label">Description:</label>
										<div class="col-md-6">
											<textarea class="form-control" name="description" rows="4">{{ $activity->description }}</textarea>
										</div>
									</div>
									<div class="form-group">
										<div class="col-md-6 col-md-offset-4">
											<button type="submit" class="btn btn-primary">
												Save Edit
											</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>

@endsection

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/thumbnail/font-awesome.min.css') }}">

@endsection