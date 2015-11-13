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
			<div id="container" class="col-md-offset-1 col-md-10" style="padding-top: 100px">

				<!-- Main -->
					<div id="col-md-12">

						<!-- Overview -->
							<article id="contact" class="panel col-md-12">

								<div class="col-md-offset-1 col-md-5">
									<header>
										<h1>
											<strong>
												Contact ME
											</strong>
										</h1>
									</header>

									<section>

										<div class="row">
											<div class="col-sm-12">
												<p><i class="fa fa-envelope fa-2x" style="margin-right: 20px"></i> obed.tandadjaja@gmail.com</p>
												<p><i class="fa fa-envelope fa-2x" style="margin-right: 20px"></i> obed.tandadjaja@covenant.edu</p>
												<p><i class="fa fa-phone fa-2x" style="margin-right: 30px"></i>(559)-473-7555</p>
												<a href="https://www.linkedin.com/profile/view?id=AAMAABWeVbMBIGUriUbRS6Orbxt_mfNNLMqR9Ls&trk=hp-identity-name" target="_blank">
													<p><i class="fa fa-linkedin-square fa-2x" style="margin-right: 20px"></i>
													Connect with me on LinkedIn</p>
												</a>
												<a href="https://www.facebook.com/obed.josiah" target="_blank">
													<p><i class="fa fa-facebook-square fa-2x" style="margin-right: 20px"></i>
													Add me on Facebook</p>
												</a>
											</div>
										</div>

									</section>
								</div>
								<div class="col-md-5">
									<header>
										<h1 class="col-md-12">
											<strong>
												Shoot me an EMAIL
											</strong>
										</h1>
									</header>
									<section class="col-md-12" style="padding-top: 20px">
										<form class="form-horizontal" role="form" method="POST" action="contact">
											<input type="hidden" name="_token" value="{{ csrf_token() }}">
											<div class="col-sm-12" style="border-radius: 5px; background-color: #34495e; padding: 10px 10px 10px 10px">
												<div class="row">
													<div class="col-sm-12" style="padding-top: 25px">
														{!! Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Full Name']) !!}
													</div>
													<div class="col-sm-12" style="padding-top: 15px">
														{!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Your Email']) !!}
													</div>
													<div class="col-sm-12" style="padding-top: 15px">
														{!! Form::textarea('bodymessage', '', ['class' => 'form-control', 'placeholder' => 'Message', 'rows' => '5']) !!}
													</div>
													<div class="col-sm-12" style="padding-top: 15px">
														{!! Form::submit('Send', ['class' => 'btn btn-primary col-sm-12']) !!}
													</div>
												</div>
											</div>
										</form>
									</section>
								</div>

							</article>

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