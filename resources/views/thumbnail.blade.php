<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8">
		<title>Photos</title>

		<link rel="stylesheet" href="{{ URL::asset('css/thumbnail/main.css') }}" />
		<link rel="stylesheet" href="{{ URL::asset('css/thumbnail/font-awesome.min.css') }}">
	</head>

	<body>

		<div class="container">
			<p style="left: 20px; position: fixed">Photo Name</p>
			<p style="">1 / 36</p>
			<i class="fa fa-times fa-2x" style="right: 10px; top: 0px; margin: 10px; position: fixed"></i>
		</div>

		<div class="outer">
			<div class="middle">
				<div class="inner">
					
					<span class="fa-stack fa-2x" id="left">
						<i class="fa fa-circle-thin fa-stack-2x"></i>
						<i class="fa fa-arrow-left fa-stack-1x"></i>
					</span>

					<span class="fa-stack fa-2x" id="right">
						<i class="fa fa-circle-thin fa-stack-2x"></i>
						<i class="fa fa-arrow-right fa-stack-1x"></i>
					</span>

				</div>
			</div>
		</div>

		<!-- Scripts -->
		<script src="{{ URL::asset('js/content/jquery.min.js') }}"></script>

		<script type="text/javascript">

			$(document).ready(function () {
				var idleState = false;
				var idleTimer = null;
				var hov = false;

				    $('*').bind('mousemove click mouseup mousedown keydown keypress keyup submit change mouseenter scroll resize dblclick', function ()
				    {
				        clearTimeout(idleTimer);
				        if (idleState == true)
				        {
				            $('.fa-stack').fadeTo(100, 1);
							$('.container').fadeTo(100, 1);
				        }
				        idleState = false;
				        idleTimer = setTimeout(function ()
				        {
				        	if(idleState == false)
				        	{
				        		$('.fa-stack').fadeTo(800, 0);
								$('.container').fadeTo(800, 0);
				            	idleState = true;
				        	}
				        	
				        }, 1000);
				    });
				    $("body").trigger("mousemove");

			});
		</script>

	</body>

</html>