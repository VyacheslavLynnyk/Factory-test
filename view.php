<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<title>тестовое задание</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
		  integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	
</head>
<body>
<div class="container">

	<br>
	<forms id="customer-from">
		<div class="form-group">
			<label>Поиск:
				<input type="search" class="form-control">
			</label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox"> work:</label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox"> connecting:</label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox"> dosconnected:</label>
		</div>
		<button type="submit" class="btn btn-default">Submit</button>
	</forms>
	<div class="info"></div>


	<?php echo $content; ?>

</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		crossorigin="anonymous"></script>
<script src='./js/main.js'></script>
</body>
</html>