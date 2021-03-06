<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
	<title>тестовое задание</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css"
		  crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="./css/bootstrap-theme.min.css"
		  crossorigin="anonymous">
    <style>
        .help-block {
            color: red;
        }
    </style>
</head>
<body>
<div class="container">

	<br>
	<form id="customer-from">
		<div class="form-group">
			<label>Поиск:
				<input type="text" class="form-control" name="search">
			</label>
			<span class="help-block" style="display: none;">Допустим только числовой ввод</span>
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
	<div class="info-data">
		<?php include 'template.php'; ?>
	</div>
    <h3 class="for-error" style="display: none;"></h3>


</div>
<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"
		crossorigin="anonymous"></script>
<script src="./js/jquery.form.validation.js"></script>
<script src='./js/main.js'></script>
</body>
</html>