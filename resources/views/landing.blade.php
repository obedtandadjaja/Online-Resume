<!DOCTYPE HTML>
<!--
	Aerial by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Obed Tandadjaja's Resume</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="{{ URL::asset('css/landing/main.css') }}" />
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	</head>
	<body class="loading">
		<div id="wrapper">
			<div id="bg"></div>
			<!-- <div id="overlay"></div> -->
			<div id="main">

				<!-- Header -->
					<header id="header">
						<h1>Obed Josiah Tandadjaja</h1>
						<p style="color:white">A Programmer's Humble Resume</p>
						<nav>
							<ul>
								<li><a href="portfolio"><img src="images/landing_folder.png" class="circle" id="portfolio"></a></li>
								<li><a href="about"><img src="images/landing_person.png" class="circle" id="aboutMe"></a></li>
								<li><a href="contact"><img src="images/landing_phone.png" class="circle" id="contactMe"></a></li>
							</ul>
							<ul>
								<li><p class="textbox" id="portfolioText">Portfolio</p></li>
								<li><p class="textbox" id="aboutMeText">About</p></li>
								<li><p class="textbox" id="contactMeText">Contact</p></li>
							</ul>
						</nav>
					</header>

				<!-- Footer -->
					<!-- <footer id="footer">
						<span class="copyright">&copy; Untitled. Design: <a href="http://html5up.net">HTML5 UP</a>.</span>
					</footer> -->

			</div>
		</div>
		<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.1/jquery-ui.min.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
		<script>
			window.onload = function() { document.body.className = ''; }
			window.ontouchmove = function() { return false; }
			window.onorientationchange = function() { document.body.scrollTop = 0; }
		</script>
		<script>
			$(document).ready(function(){
				
				$('#portfolio').hover(
					function()
					{
						$(this).fadeTo(200, 1).animate({height: 110+'px', width: 110+'px', borderWidth: 4}, 200);
						$('#portfolioText').css('color', 'yellow');
					},
    				function()
    				{
    					$(this).fadeTo(200, 0.5).animate({height: 100+'px', width: 100+'px', borderWidth: 2}, 200);
    					$('#portfolioText').css('color', 'black');
    				}
    			);
				$('#aboutMe').hover(
					function()
					{
						$(this).fadeTo(200, 1).animate({height: 110+'px', width: 110+'px', borderWidth: 4}, 200);
						$('#aboutMeText').css('color', 'yellow');
					},
    				function()
    				{
    					$(this).fadeTo(200, 0.5).animate({height: 100+'px', width: 100+'px', borderWidth: 2}, 200);
    					$('#aboutMeText').css('color', 'black');
    				}
    			);
				$('#contactMe').hover(
					function()
					{
						$(this).fadeTo(200, 1).animate({height: 110+'px', width: 110+'px', borderWidth: 4}, 200);
						$('#contactMeText').css('color', 'yellow');
					},
    				function()
    				{
    					$(this).fadeTo(200, 0.5).animate({height: 100+'px', width: 100+'px', borderWidth: 2}, 200);
    					$('#contactMeText').css('color', 'black');
    				}
    			);

			});
		</script>
	</body>
</html>