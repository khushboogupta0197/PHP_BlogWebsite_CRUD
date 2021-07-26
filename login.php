<?php session_start(); ?>
<?php require_once "header.php"; ?>

<?php
include("connection.php");
$emptVal=$invalidVal="";

if(isset($_POST['submit'])) {
	$user = mysqli_real_escape_string($mysqli, $_POST['username']);
	$pass = mysqli_real_escape_string($mysqli, $_POST['password']);

	if($user == "" || $pass == "") {
		$emptVal= "Either one or many fields are empty";
		 	} 
		 	else {
				$result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
					or die("Could not execute the select query.");
		
		$row = mysqli_fetch_assoc($result);
		
		if(is_array($row) && !empty($row)) {
			$validuser = $row['username'];
			$_SESSION['valid'] = $validuser;
			$_SESSION['name'] = $row['name'];
			$_SESSION['id'] = $row['id'];
		} else {
			$invalidVal= "Invalid username or password.";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a class="navbar-brand font-weight-bold" href="index.php">
		<h2><i class="fa fa-tree"></i><i>CreativeBlog</i></h2>
	</a>
</nav>
<?php
if($emptVal){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error! </strong>Either one or many fields are empty.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  if($invalidVal){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error! </strong> Invalid username or password.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
?>
<div class="container my-4">
	<h2 class="text-center my-4">Login</h2>
	<form name="form1" method="post" action="">
		<div class="form-group">
			<label for="Username">Username</label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="text" class="form-control" name="password">
		</div>
		<button type="submit" class="btn btn-primary form-control" name="submit" value="submit">Submit</button>

	</form>
</div>

<?php require_once "footer.php"; ?>