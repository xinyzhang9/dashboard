
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>index</title>
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style type ="text/css">

	input{
		display: inline-block;
		margin: 10px 10px 10px 0;
	}
	.block{
		width: 220px;
		margin: 10px;
		display: inline-block;
		vertical-align: top;
	}

	.row{
		border: 1px solid silver;
	}
	.form-group{
		padding: 10px;
	}
	.placeholder{
		margin: 0 20px;
	}
	.placeholder_l{
		margin: 0 300px;
	}
	.hero-unit{
		width: 800px;
		background-color: lightgray;
		padding: 20px;
		
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
			<?php 
				if (isset($errors)) {
				 	echo $errors;
				 } 
			?>
		<div class = "hero-unit">
			<h2>Welcome to the Test</h2>
			<p>
				We're going to build a cool application using a MVC framework! 
				This application was biult with the Village88 folks!
			</p>
			<a href="/main/show_signin" class = 'btn btn-info btn-large'>Start</a>
		</div>
		<div class = 'block'>
			<h4>Manage Users</h4>
			<p>
				Using this application, you'll learn how to add, remove, and edit user for the application.
			</p>
		</div>
		<div class = 'block'>
			<h4>Leave message</h4>
			<p>
				Users will be able to leave a message to another user using this application.
			</p>
		</div>
		<div class = 'block'>
			<h4>Edit User Infomation</h4>
			<p>
				Admins will be able to edit another user's information
				(email address, first name, last name, etc).
			</p>
		</div>
	</div>
	

</body>
</html>