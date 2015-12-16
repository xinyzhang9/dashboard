
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign In</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type ="text/css">
	body{
/*		text-align: center;*/
	}
	input{
		display: inline-block;
		margin: 10px 10px 10px 0;
	}
	.error{
		color: red;

	}
	.row{
		border: 1px solid silver;
	}
	.form-group{
		padding: 10px;
	}
	.message{
		color: red;
	}
	.placeholder{
		margin: 0 20px;
	}
	.placeholder_l{
		margin: 0 300px;
	}
	.navbar{
		border-bottom: 1px solid black;
		font-size: 20px;
	}
	</style>
</head>
<body>
	<div class = 'container'>
		<div id = 'header' class = 'navbar'>
			<a href="/">Test App</a>
			<span class = 'placeholder'></span>
			<a href="/">Home</a>
			<span class = 'placeholder_l'></span>
			<a href="/main/show_signin">sign in</a>
		</div>
		<div id = 'body'>
			<?php 
				if (isset($errors)) {
				 	echo $errors;
				 } 
			?>
			<h3>Sign In</h3>
			<form action="/login/log_in" method = "post">
				Email:
				<input type="text" name = "login_email">
				<br>
				Password:
				<input type="password" name = "login_password">
				<br>
				<input type="submit" value = "Sign in" class = "btn btn-success">
			</form>
			<hr>
		</div>
		<a href="/main/show_register">Don't have an account? Register.</a>
	</div>

</body>
</html>