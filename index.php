<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
		integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="style.css">
	<title>CreativeBlog</title>

</head>

<body style="background-image: url('blog.webp'); background-size: cover; opacity: 0.8">

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<a class="navbar-brand font-weight-bold">
			<h2><i class="fa fa-tree"></i> <i>CreativeBlog</i></h2>
		</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
			aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNavDropdown">
			<ul class="navbar-nav">
				<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
				<li class="nav-item">
					<a class="nav-link" href="view.php">
						<i class="fa fa-user" aria-hidden="true"></i>
						Hello
						<?php echo $_SESSION['name'] ?>!
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="logout.php">Logout</a>
				</li>
				<?php	
	} 
	else { ?>
				<li class="nav-item">
					<a class="nav-link" href="login.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="register.php">Register</a>
				</li>
				<?php } ?>
				<li class="nav-item">
					<a class="nav-link" href="guest_user.php">Guest User <i class="fa fa-user-circle"></i></a>
				</li>
			</ul>
		</div>
	</nav>


	<div class="container my-5">

		<?php
	if(isset($_SESSION['valid'])) {			
		include("connection.php");					
		$result = mysqli_query($mysqli, "SELECT * FROM login");
	?>
		<div class="float-right">
			<h1>Welcome
				<?php echo $_SESSION['name'] ?> <br>
				<a href='view.php'>Continue adding <br>amazing Blogs <i class="fa fa-angle-double-right"></i></a>
				<hr>
				THIS IS TRUE<br> EMPOWERMENT.
			</h1>
		</div>
		<?php	
	} 
	else {
		?>
		<div class="float-right">
			<h1 class="font-weight-bold">
				THE BEST FORM OF<br> EXPRESSION IS<br>BLOGGING
			</h1>
			<h2 class="font-weight-bold">
				WE MUST NOT ONLY<BR> BLOG WHAT IS POPULAR
			</h2>
			<h3 class="font-weight-bold">
				<i>WE MUST BLOG ABOUT<br> OUR PASSIONS.</i>
			</h3>
		</div>
		<?php
	}
	?>
	</div>

	<?php require_once "footer.php"; ?>