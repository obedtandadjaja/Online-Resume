@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>
				<div class="panel-body">
					You are logged in!
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Add Image</div>
				<div class="panel-body">
					<a href="image" class="button">
						Add/Edit Images
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Portfolio</div>
				<div class="panel-body">
					<a href="update_professionals" class="button">
						Add/Edit Professional Experience
					</a>
				</div>
				<div class="panel-body">
					<a href="update_volunteers">
						Add/Edit Volunteer Experience
					</a>
				</div>
				<div class="panel-body">
					<a href="update_projects">
						Add/Edit Personal Project
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">About Me</div>
				<div class="panel-body">
					<a href="update_bio" class="button">
						Edit Bio
					</a>
				</div>
				<div class="panel-body">
					<a href="update_activities">
						Add/Edit Activity
					</a>
				</div>
				<div class="panel-body">
					<a href="update_feats">
						Add/Edit Feat
					</a>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection
