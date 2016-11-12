<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<title>тестовое задание</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
		  crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
		  crossorigin="anonymous">
	
</head>
<body>
<div class="container">

	<br>
	<form id="customer-from">
		<div class="form-group">
			<label>Поиск:
				<input type="search" class="form-control" name="search">
			</label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox" name="status[work]" value="1"> work:</label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox" name="status[connecting]" value="1"> connecting:</label>
		</div>
		<div class="checkbox">
			<label><input type="checkbox" name="status[disconnected]" value="1"> disconnected:</label>
		</div>
		<button type="submit" class="btn btn-default send">Отправить</button>
	</form>
	<div class="info-data"></div>


</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
		crossorigin="anonymous"></script>
<script src='./js/main.js'></script>
</body>
</html>