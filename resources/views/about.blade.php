<!DOCTYPE HTML>
<!--
	Astral by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Obed's Portfolio</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
		<link rel="stylesheet" href="{{ URL::asset('css/content/main.css') }}" />
		<noscript><link rel="stylesheet" href="{{ URL::asset('css/content/noscript.css') }}" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Wrapper-->
			<div id="wrapper">

				<br/>

				<!-- Nav -->
					<nav id="nav">
						<a href="#me" class="icon fa-user active"><span>Bio</span></a>
						<a href="#summary" class="icon fa-file"><span>Overview</span></a>
						<a href="#feats" id="feats_button" class="icon fa-graduation-cap"><span>Feats</span></a>
						<a href="#activities" class="icon fa-child"><span>Activities</span></a>
					</nav>

				<!-- Main -->
					<div id="main">

						<!-- Overview -->
							<article id="me" class="panel">
								<header>
									<h1>{{ $user->name }}</h1>
									<p style="font-size: 100%">Student Programmer</p>
								</header>
								<a href="#summary" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"></span>
									@if(sizeof($user->imageUri) != 0)
									<img src="{{ $user->imageUri[0]->location }}" alt="" style="max-width:500px" />
									@endif
								</a>
							</article>

						<!-- Summary -->
							<article id="summary" class="panel col-sm-12">
                                <div class="col-sm-12" style="margin-bottom: 20px">
                                    <div class="col-sm-offset-1 col-sm-10" id="profile">
                                        <div class="col-sm-5" style="padding-left: 0px">
                                        	@if(sizeof($user->imageUri) >= 2)
                                            <img src="{{ $user->imageUri[1]->location }}" style="border-radius: 50%" class="img-responsive" id="profile_picture"/>
                                            @endif
                                        </div>
                                        <div class="col-md-7" style="padding-left: 30px">
                                            <br/>
                                            <h1 style="color: #2980b9" id="user_name"><strong>{{ $user->name }}</strong></h1>
                                            <h4 id="occupation">{{ $user->occupation }}</h4>
                                            <a><h4 id="email_focus">{{ $user->email }}</h4></a>
                                            <h4 id="degree">{{ $user->degrees }}</h4>
                                            <h4 id="focus">Focus: {{ $user->focus }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="bio" class="col-sm-offset-1 col-sm-10" style="margin-top: 20px; display:none"><strong>Summary:</strong><br/>
                                {!! $user->summary !!}
                                </div>
                                <div class="col-sm-12 text-center" id="button_group" style="display:none; margin-top: 50px">
                                    <a href="/portfolio"><button id="go_to_portfolio" class="btn btn-primary">Go To My Portfolio</button></a>
                                    <button id="go_to_feats" class="btn btn-warning">See My Achievements</button>
                                </div>
                                <button id="tell_me_more" class="btn btn-primary col-sm-offset-1 col-sm-10" style="margin-top: 50px">Tell Me More About Obed</button>

							</article>

						<!-- Feats -->
							<article id="feats" class="panel">
								<header>
									<h2>Feats | Achievements</h2>
									<hr/>
									@foreach ($feats as $feat)
										<div class="col-sm-9 box" style="margin-bottom: 30px">
											<h1>{{ $feat->name }}</h1>
											<h2>{{ $feat->issuer }}</h2>
											<h2>{{ $feat->time_period }}</h2>
											<p>{!! $feat->description !!}</p>
										</div>
										<div class="col-sm-3 box">
											@if($feat->logo)
	                                        <img src="{{ $feat->logo->location }}" class="img-responsive" height="200px" width="200px" />
	                                        @endif
										</div>
									@endforeach
								</header>

							</article>

						<!-- Activities -->
							<article id="activities" class="panel">
								<header>
									<h2>Activities</h2>
									<hr/>
								</header>
								@foreach ($activities as $activity)
									<div class="col-sm-12 box" style="margin-bottom: 30px">
										<h1>{{ $activity->name }}</h1>
										<h2>{{ $activity->time_period }}</h2>
										<p>{!! $activity->description !!}</p>
									</div>
								@endforeach
							</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<li><a href="/">Home</a></li>
                            <li><a href="#">Back To Top</a></li>
						</ul>
					</div>

			</div>

		<!-- Scripts -->
			<script src="{{ URL::asset('js/content/jquery.min.js') }}"></script>
			<script src="{{ URL::asset('js/content/skel.min.js') }}"></script>
			<script src="{{ URL::asset('js/content/skel-viewport.min.js') }}"></script>
			<script src="{{ URL::asset('js/content/util.js') }}"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="{{ URL::asset('js/content/main.js') }}"></script>
            <script src="{{ URL::asset('js/about/main.js') }}"></script>

	</body>
</html>