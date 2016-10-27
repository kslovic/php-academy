<?php
    session_start();
 if(isset($_POST['logout'])){session_destroy(); header('location:index.php');}
    if( isset($_POST['username']) && $_POST['username'] == 'admin' &&
        isset($_POST['password']) && $_POST['password'] == 'phpacademy'
    ) {
        $_SESSION['is_logged_in'] = true;
    }
?>

<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <title>Login example</title>
    <style>
    input, textarea { display: block; }
	button, a{
		background-color:olivedrab;
		color:white;
		border-color:olivedrab;
		padding:10px 25px;
		text-decoration: none;
		margin:20px;
	}
	button:hover,a:hover{
    background-color: yellowgreen;
	
}
h1{
	color:olivedrab;
	font-size:25px;
		}
		body{
			border:5px solid olivedrab;
			border-radius: 25px;
			margin:20px 500px 20px 500px;
			padding:20px;
			color:olivedrab;
			
		}
    </style>
</head>
<body>
    <?php
 
    if(isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']): ?>

        <p>Dobrodošli na administratorsko sučelje!!</p>
		<a href="uploads/">Pregledaj prijave</a>
       
        <form method="post" action="login.php">
        <button type="submit" name="logout">Log out</button>
        </form>
    <?php else: ?>
	<h1>Log in:</h1>
        <form method="post">

            <label for="username">Username</label>
            <input type="text" id="username" name="username" required />

            <label for="password">Password</label>
            <input id="password" name="password" type="password" required />

            <label for="remember-me">Remember me</label>
            <input id="remember-me" name="remember-me" type="checkbox" />

            <button type="submit">Login</button>

        </form>

    <?php endif ?>

</body>
</html>