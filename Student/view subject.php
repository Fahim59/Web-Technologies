<!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	<div id="show"></div>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			setInterval(function () {
				$('#show').load('view-subject.php')
			}, 1000);
		});
	</script>
</body>
</html>