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
		<style>
			input[type=text] {
			  height:17px;
			  border: 0;
			  width: calc(100% - 2px);
			  margin-left:1px;
			  box-shadow: -8px 10px 0px -7px gray, 8px 10px 0px -7px gray;
			  -webkit-transition: box-shadow 0.3s;
			  transition: box-shadow 0.3s;
			}
			input[type=text]:focus {
			  outline: none;
			  box-shadow: -8px 10px 0px -7px #4EA6EA, 8px 10px 0px -7px #4EA6EA;
			}
		</style>
	</head>
	<body>

			<div class="header">
    			<p>
    			<a href="/">Home</a>
    			<a>|</a>
    			<a href="/portfolio">Portfolio</a>
    			<a>|</a>
    			<a href="/about">About</a>
    			<a>|</a>
    			<a href="/contact">Contact</a>
    			</p>
    		</div>

		<!-- Wrapper-->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
						
						<article id="contact" class="panel col-sm-12">
							<div class="col-sm-offset-1 col-sm-5">
								<section>
									<div class="col-sm-12">
										<div class="col-sm-12">
											<p><i class="fa fa-envelope fa-2x" style="margin-right: 20px"></i> obed.tandadjaja@gmail.com</p>
											<p><i class="fa fa-envelope fa-2x" style="margin-right: 20px"></i> obed.tandadjaja@covenant.edu</p>
											<p><i class="fa fa-phone fa-2x" style="margin-right: 30px"></i>(559)-473-7555</p>
											<a href="https://www.linkedin.com/in/obedtandadjaja" target="_blank">
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
							<div class="col-sm-5">
								<section class="col-sm-12">
									<form class="form-horizontal col-sm-12" role="form" method="POST" action="contact">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<div class="col-sm-12" style="border-radius: 5px; padding: 10px 10px 10px 10px">
											<div class="row">
												<div class="col-sm-12" style="padding-top: 25px">
													{!! Form::text('name', '', ['class' => 'form-control col-sm-12', 'placeholder' => 'Full Name',
														'style' => 'background: none']) !!}
												</div>
												<div class="col-sm-12" style="padding-top: 15px">
													{!! Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Your Email',
														'style' => 'background: none']) !!}
												</div>
												<div class="col-sm-12" style="padding-top: 15px">
													{!! Form::textarea('bodymessage', '', ['class' => 'form-control', 'placeholder' => 'Message', 'rows' => '5']) !!}
												</div>
												<div class="col-sm-12" style="padding-top: 15px">
													{!! Form::submit('Send', ['class' => 'btn btn-primary pull-right']) !!}
												</div>
											</div>
										</div>
									</form>
								</section>
							</div>
						</article>

					</div>

				<!-- Footer -->
					<div id="footer">
						<ul class="copyright">
							<!-- <li><a href="/">Home</a></li> -->
                            <li><a href="#">Back To Top</a></li>
						</ul>
					</div>

			</div>

			<div class="footer">
            	<p class="pull-left">Obed Josiah Tandadjaja</p>
            	<p class="pull-right">www.obedtandadjaja.com</p>
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