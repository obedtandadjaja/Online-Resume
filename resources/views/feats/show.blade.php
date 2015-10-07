@extends('app')

@section('script')

<script type="text/javascript" src="{{ URL::asset('js/choose_picture/main.js') }}"></script>

@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-body">
					<form class="form-horizontal" role="form" method="GET" action="{{ $feat->id }}/edit">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-4 control-label">Honor/Award Name:</label>
								<div class="col-md-6">
									<textarea class="form-control" name="name">{{ $feat->name }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Occupation ATM:</label>
								<div class="col-md-6">
									<textarea class="form-control" name="occupation">{{ $feat->occupation }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Issuer:</label>
								<div class="col-md-6">
									<textarea class="form-control" name="issuer">{{ $feat->issuer }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Time Period:</label>
								<div class="col-md-6">
									<textarea class="form-control" name="time_period">{{ $feat->time_period }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Description:</label>
								<div class="col-md-6">
									<textarea class="form-control" name="description" rows="4">{{ $feat->description }}</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Pictures:</label>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Select Pictures</button>
                                    {!! Form::text('imageUri', '', ['class' => 'form-control', 'id' => 'imageUri']) !!}
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-body col-sm-12">
                
                @foreach ($images as $image)
                <div class="col-sm-3">
                    <img src="{{ $image->location }}" alt="{{ $image->id }}" class="img-responsive" id="picture">
                </div>
                @endforeach

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

@endsection