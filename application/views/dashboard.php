
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>dashboard(normal)</title>
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
			<h3>Manage Users</h3>
			<table class = 'table table-striped'>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>email</th>
					<th>created_at</th>
					<th>user_level</th>
				</tr>
				<?php 
					foreach ($users as $user) {
						$id = $user['id'];
						$user_name = $user['first_name']." ".$user['last_name'];
						echo "<tr>";
						echo "<td>".$user['id']."</td>";
						echo "<td>"."<a href = '/wall/show_profile/{$id}'>".$user_name."</a></td>";
						echo "<td>".$user['email']."</td>";
						echo "<td>".$user['created_at']."</td>";
						if($user['user_level']==9){
							echo "<td>admin</td>";
						}else{
							echo "<td>normal</td>";
						}
						echo "</tr>";			
					}
				 ?>	
			</table>
		
				
		</div>
	</div>
	

</body>
</html>