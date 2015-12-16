
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>profile</title>
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

	.row{
		border: 1px solid silver;
	}
	.form-group{
		padding: 10px;
	}
	.navbar{
		border-bottom: 1px solid black;
		font-size: 20px;
	}
	.placeholder{
		margin: 0 20px;
	}
	.placeholder_l{
		margin: 0 300px;
	}
	.block{
		width: 220px;
		margin: 10px 10px 10px 0;
		display: inline-block;
		vertical-align: top;
		border: 1px solid silver;
		border-radius: 20px;
		padding: 10px;
	}
	.bottom{
		margin: 10px 10px 10px 0;
		border-top: 1px solid silver;
	}
	</style>
</head>
<body>
	<div class = 'container'>
		<div id = 'header' class = 'navbar'>
			<a href="/">Test App</a>
			<span class = 'placeholder'></span>
			<a href="/login/profile">Dashboard</a>
			<span class = 'placeholder'></span>
			<a href="/wall/show_profile/<?=$this->session->userdata['id']?>">Profile</a>
			<span class = 'placeholder_l'></span>
			<a href="/login/log_off">Log off</a>
		</div>
		<div class = 'container'>
			<?php
		
				if (isset($errors)) {
				 	echo $errors;
				} 
			?>
			<h3>Edit User #<?=$user['id']?></h3>
			<a href="/login/profile" class = 'btn btn-info'>Back to Dashboard</a>
			<br>
			<div class = 'block'>
				<h4>Edit Information</h4>
				<form action="/main/edit_info/<?=$user['id']?>" method = 'post'>
					Email Address:
					<input type="text" name = 'email' value = '<?= $user['email']?>' >
					<br>
					First Name:
					<input type="text" name = 'first_name' value = '<?= $user['first_name']?>'>
					<br>
					Last Name:
					<input type="text" name = 'last_name' value = '<?= $user['last_name']?>'>
					<br>
					<input type="submit" value = 'Save' class = 'btn btn-success'>
					<br>
				</form>
			</div>
			
			<div class = 'block'>
				<h4>Change Password</h4>
				<form action="/main/edit_password/<?=$user['id']?>" method = "post">
					Password:
					<input type="password" name = 'password'>
					<br>
					Password Confirmation:
					<input type="password" name = 'confirm_password'>
					<br>
					<input type="submit" value = 'Update' class = 'btn btn-success'>
				</form>
			</div>
			
			<div class = 'bottom'>
				<h4>Edit description</h4>
				<form action="/main/edit_description/<?=$user['id']?>" method = "post">
					<input type="text" name = 'description' value = '<?= $user['description']?>'>
					<br>
					<input type="submit" value = 'Save' class = 'btn btn-success'>
				</form>
			</div>	
		</div>
	</div>
	

</body>
</html>