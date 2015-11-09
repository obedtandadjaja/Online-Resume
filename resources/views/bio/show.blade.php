@extends('app')

@section('script')

    <script type="text/javascript" src="{{ URL::asset('js/choose_picture/main.js') }}"></script>

@endsection

@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<form action="1/edit" method="get" files="true" enctype="multipart/form-data" class="form-horizontal">
					<div class="panel-heading">
						<strong>Full Name:</strong>
						<textarea rows="1">{{ $user->name }}</textarea>

					</div>

					<!-- Age-->

					<div class="panel-body">
						<strong>Age:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="age">{{ $user->age }}</textarea>
					</div>

                    <!-- Occupation-->

                    <div class="panel-body">
                        <strong>Occupation:</strong>
                        <br/>
                        <textarea class="col-md-12 form-control" name="occupation">{{ $user->occupation }}</textarea>
                    </div>

                    <!-- Focus-->

                    <div class="panel-body">
                        <strong>Focus:</strong>
                        <br/>
                        <textarea class="col-md-12 form-control" name="focus">{{ $user->focus }}</textarea>
                    </div>

					<!-- Religion -->

					<div class="panel-body">
						<strong>Religion:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="religion">{{ $user->religion }}</textarea>
					</div>
									
					<!-- Degrees -->
					
					<div class="panel-body">
						<strong>Degrees:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="degree">{{ $user->degree }}</textarea>
					</div>

					<!-- Nationality -->
					
					<div class="panel-body">
						<strong>Nationality:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="nationality">{{ $user->nationality }}</textarea>
					</div>

					<!-- Ethnicity -->
					
					<div class="panel-body">
						<strong>Ethnicity:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="ethnicity">{{ $user->ethnicity }}</textarea>
					</div>

					<!-- Language -->
					
					<div class="panel-body">
						<strong>Language:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="language">{{ $user->language }}</textarea>
					</div>

					<!-- Summary -->
					
					<div class="panel-body">
						<strong>Summary:</strong>
						<br/>
						<textarea class="col-md-12 form-control" name="summary" rows="5">{{ $user->summary }}</textarea>
					</div>

					<!-- Photos -->
					
					<div class="panel-body">
						<strong>Pictures:</strong>

						<br/>

						<!-- <button class="btn btn-danger form-control">Select Picture</button> -->
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Select Pictures</button>
                        {!! Form::text('imageUri', $imageUri, ['class' => 'form-control', 'id' => 'imageUri']) !!}

					</div>

					<!-- Buttons -->
					
					<div class="panel-body">
						{!! Form::submit('Submit', array('class' => 'btn btn-primary')) !!}
					</div>
				</form>
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