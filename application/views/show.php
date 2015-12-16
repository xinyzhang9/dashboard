
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>show profile</title>
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
	p{
		color: orange;
	}
	p.comment{
		color: blue;
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
				// var_dump('messages',$messages);
				// die();

				if (isset($errors)) {
				 	echo $errors;
				} 
			?>
			<h4><?= $owner['first_name'].' '.$owner['last_name']?></h4>
			Registered at: <?= $owner['created_at'] ?>
			<br>
			User ID: <?= $owner['id']?>
			<br>
			Email address: <?= $owner['email']?>
			<br>
			Description: <?= $owner['description']?>
			<br>
			<hr>
			<h4>Leave a message for <?= $owner['first_name']?></h4>
			<form action="/wall/add_message/<?=$owner['id']?>/<?=$this->session->userdata['id']?>" method = "post">
				<input type="text" name = 'message'>
				<br>
				<input type="submit" value = 'Post' class = 'btn btn-success'>
			</form>
			<hr>
			<?php
				if (($messages[0]['id'])!=null) {
				  	foreach ($messages as $message) {
						echo "<h5>".$message['poster_first_name'].' '.$message['poster_last_name']." wrote at: ".$message['created_at']
							."</h5>";
						echo "<p>".$message['message']."</p>";
						//display comment
						foreach ($comments as $key=>$comment) {
							if(!empty($comment)){
								foreach ($comment as $key2 => $value) {
									if ($value['message_id'] == $message['id']) {
										echo "<h5>".$value['poster_first_name'].' '.$value['poster_last_name']
										." wrote at: ".$value['created_at']."</h5>";
										echo "<p class = 'comment'>".$value['comment']."</p>";
									}
								}			
							}				
						}

						//post comment
						echo "<form action='/wall/add_comment/{$this->session->userdata["id"]}/{$message["id"]}' method = 'post'>";
						echo "<input type='text' name = 'comment'><br>";
						echo "<input type='submit' value = 'Post Comment' class = 'btn btn-success'>";
						echo "</form>";
					}
				  }  
				
			?>

			
		</div>
	</div>
	

</body>
</html>