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
		<link rel="stylesheet" href="{{ URL::asset('css/content/main.css') }}" />
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
		<noscript><link rel="stylesheet" href="{{ URL::asset('css/content/noscript.css') }}" /></noscript>
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            @for($i = 0; $i < sizeof($projects[0]->imageUri); $i++)
                                @if($i == 0)
                                    <li data-target="#myCarousel" data-slide-to="{{ $i }}" class="active"></li>
                                @else
                                    <li data-target="#myCarousel" data-slide-to="{{ $i }}"></li>
                                @endif
                            @endfor
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @for($i = 0; $i < sizeof($projects[0]->imageUri); $i++)
                                @if($i == 0)
                                    <div class="item active">
                                        <img src="{{ $projects[0]->imageUri[0]->location }}" alt="Chania" style="max-height: 600px" class="center-block">
                                    </div>
                                @else
                                    <div class="item">
                                        <img src="{{ $projects[0]->imageUri[$i]->location }}" alt="Chania" style="max-height: 600px" class="center-block">
                                    </div>
                                @endif
                            @endfor
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev" style="background:transparent">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true" style="color: #999999"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next" style="background:transparent">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true" style="color: #999999"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

		<!-- Wrapper-->
			<div id="wrapper">

				<br/>

				<!-- Nav -->
					<nav id="nav">
						<a href="#me" class="icon fa-folder-open active"><span>Portfolio</span></a>
						<a href="#professionals" class="icon fa-briefcase"><span>Professional</span></a>
						<a href="#projects" class="icon fa-pencil-square-o"><span>Project</span></a>
						<a href="#volunteers" class="icon fa-users"><span>Volunteer</span></a>
					</nav>

				<!-- Main -->
					<div id="main">


						<!-- Intro -->
							<article id="me" class="panel">
								<header>
									<h1>Welcome To My Portfolio</h1>
									<p>Get Started!</p>
								</header>
								<a href="#professionals" class="jumplink pic">
									<span class="arrow icon fa-chevron-right"></span>
									<img src="images/me.jpg" alt="" />
								</a>
							</article>

						<!-- Professional -->
							<article id="professionals" class="panel">
								<header>
									<h1>
										<strong>
											Professional Experience
										</strong>
									</h1>
								</header>

								<hr/>

								<section>

									<div class="row">
										<div class="col-sm-12">

											@foreach ($professionals as $professional)
											<div class="col-sm-12 box" style="margin-bottom: 30px">
                                                <div class="col-sm-9">
                                                    <a><h1>{{ $professional->position_title }}</h1></a>
    												<h2>{{ $professional->name }}</h2>
    												<h2>{{ $professional->time_period }} | {{ $professional->location }}</h2>
    												<p>{{ $professional->description }} <a>Show More</a></p>
                                                </div>
                                                <div class="col-sm-3" style="margin-top: 20px; margin-bottom: 20px">
                                                    <img src="http://placehold.it/200" class="img-responsive"/>
                                                </div>
											</div>
											@endforeach
		
										</div>
									</div>

								</section>

							</article>


					<!-- Projects -->
							<article id="projects" class="panel">
								<header>
									<h1>
										<strong>
											Projects
										</strong>
									</h1>
								</header>

								<hr/>

								<section>

									<div class="row">
										<div class="col-sm-12">
											@foreach ($projects as $project)
											<div class="col-sm-12 box" style="margin-bottom: 30px">
                                                <div class="col-sm-9">
    												<a><h1>{{ $project->name }}</h1></a>
    												<h2>{{ $project->time_period }}</h2>
    												<p>{{ $project->description }}</p>
                                                </div>
                                                <div class="col-sm-3" style="margin-top: 20px; margin-bottom: 20px">
                                                    <img src="{{ $project->imageUri[0]->location }}" class="img-responsive"/>
                                                    <button type="button" class="btn btn-primary col-sm-12" data-toggle="modal" data-target="#myModal">See All Pictures</button>
                                                </div>
											</div>
											@endforeach

										</div>
									</div>

								</section>

							</article>


					<!-- Volunteer -->

							<article id="volunteers" class="panel">
								<header>
									<h1>
										<strong>
											Volunteer Experience
										</strong>
									</h1>
								</header>

								<hr/>

								<section>
								
									<div class="row">
										<div class="col-sm-12">
											@foreach ($volunteers as $volunteer)
											<div class="col-sm-12 box" style="margin-bottom: 30px">
                                                <div class="col-sm-9">
    												<a><h1>{{ $volunteer->role }}</h1></a>
    												<h2>{{ $volunteer->name }}</h2>
    												<h2>{{ $volunteer->time_period }} | {{ $volunteer->cause }}</h2>
    												<p>{{ $volunteer->description }} <a>Show More</a></p>
                                                </div>
                                                <div class="col-sm-3" style="margin-top: 20px; margin-bottom: 20px">
                                                    <img src="http://placehold.it/200" class="img-responsive"/>
                                                </div>
											</div>
											@endforeach

										</div>
									</div>

								</section>

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
            <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

	</body>
</html>