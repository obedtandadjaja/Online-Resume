@extends('app')

@section('script')

<script type="text/javascript" src="{{ URL::asset('js/choose_picture/main.js') }}"></script>

@endsection

@section('content')

@if(Session::has('success'))
    <div class="alert alert-success">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

<div class="col-md-10 col-md-offset-1">
	<h2>
		Projects
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
					<form class="form-horizontal" role="form" method="POST" action="update_projects" files="true" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<div class="form-group">
								<label class="col-md-4 control-label">Project Name:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="name">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Occupation ATM:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="occupation">
								</div>
							</div>
							<div class="form-group">
								<label class="col-md-4 control-label">Team Members:</label>
								<div class="col-md-6">
									<input type="text" class="form-control" name="team_members">
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
                                <label class="col-md-4 control-label">Logo:</label>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Select Pictures</button>
                                    {!! Form::text('logo', '', ['class' => 'form-control', 'id' => 'imageUri']) !!}
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-md-4 control-label">Pictures:</label>
                                <div class="col-sm-6">
                                    <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">Select Pictures</button>
                                    {!! Form::text('imageUri', '', ['class' => 'form-control', 'id' => 'imageUri']) !!}
                                    Or Upload<br>
                                    {!! Form::label('title_label', 'Title:') !!}
							        {!! Form::text('title', '', ['class' => 'form-control']) !!}

							        <input type="hidden" name="_token" value="{{ csrf_token() }}">
							        {!! Form::label('file_label', 'Picture:') !!}
							        <input type="file" name="image[]" class="form-control" multiple>

							        {!! Form::label('description_label', 'Description:') !!}
							        {!! Form::textarea('image_description', '', ['class' => 'form-control', 'rows' => '2']) !!}
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

@foreach ($projects as $project)
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong>Project Name:</strong>
					<p rows="1">{{ $project->name }}</p>

				</div>

                <!-- Picture -->
				
				@if(isset($project->logo))
                <div class="panel-body">
            		<strong>Logo:</strong>
            		<br/>
            		<img src="{{ $project->logo->location }}" />
                </div>
                @endif

                <div class="panel-body">
                    @if(isset($project->imageUri))
                        <strong>Picture:</strong>
                        <br/>
                        @foreach ($project->imageUri as $project_image)
                            <img src="{{ $project_image->location }}"/>
                        @endforeach
                    @endif
                </div>

				<!-- Occupation -->

				<div class="panel-body">
					<strong>Occupation ATM:</strong>
					<br/>
					<p class="col-md-12">{{ $project->occupation }}</p>
				</div>

				<!-- Team Members -->

				<div class="panel-body">
					<strong>Team Members:</strong>
					<br/>
					<p class="col-md-12">{{ $project->team_members }}</p>
				</div>
				
				<!-- Time Period -->

				<div class="panel-body">
					<strong>Time Period:</strong>
					<br/>
					<p class="col-md-12">{{ $project->time_period }}</p>
				</div>
				
				<!-- Description -->
				
				<div class="panel-body">
					<strong>Description:</strong>
					<br/>
					<p class="col-md-12" rows="3">{{ $project->description }}</p>
				</div>

				<!-- Buttons -->
				
				<div class="panel-body">
					{!! Form::open(array('route' => array('update_projects.destroy', $project->id), 'method' => 'delete', 'class' => 'pull-right')) !!}
						<button class="btn btn-primary">Remove</button>
					{!! Form::close() !!}
					<a href="update_projects/{{ $project->id }}" class="pull-left">
						<button class="btn btn-primary">Edit</button>
					</a>
				</div>

			</div>
		</div>
	</div>
</div>
@endforeach

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

@section('css')

<link rel="stylesheet" href="{{ URL::asset('css/thumbnail/font-awesome.min.css') }}">

@endsection