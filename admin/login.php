<?php 
	include '../classes/adminlogin.php';
?>
<?php 
    $class = new adminlogin();
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$username = $_POST['username'];
		$password = md5($_POST['password']);

		$login_check = $class->login_admin($username, $password);
	}
?>

<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Đăng nhập Admin</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
		<form action="login.php" method="post">
			<h1>Đăng Nhập</h1>
			<span>
				<?php
					if(isset($login_check)){
						echo $login_check;
					}
			
				?>
			</span>
			<div>
				<input type="text" placeholder="Username"  name="username"/>
			</div>
			<div>
				<input type="password" placeholder="Password"  name="password"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>