<?php require_once "header.php"; ?>

<?php
include("connection.php");
$insert = false;
$emptVal ="";

if(isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];

	if($user == "" || $pass == "" || $name == "" || $email == "") {
		$emptVal= "All fields should be filled. Either one or many fields are empty.";
	} 
	else {
		$result=mysqli_query($mysqli, "INSERT INTO login(name, email, username, password) VALUES('$name', '$email', '$user', md5('$pass'))")
			or die("Could not execute the insert query.");
			
		if($result){ 
      $insert = true;
  }	
	}
} 
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href="index.php" class="navbar-brand font-weight-bold" ><h2><i class="fa fa-tree"></i> <i>CreativeBlog</i></h2></a>
  <?php 
  if($insert){
    echo "<ul class='navbar-nav'>
    	<li class='nav-item'>
        	<a class='nav-link' href='login.php'>Admin Login</a>
      </li>        
    </ul>";
	}
    ?>
</nav>
<?php
  if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!</strong> Your note has been inserted successfully
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<?php
  if($emptVal){
    echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
    <strong>Error!</strong> All fields should be filled. Either one or many fields are empty.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>×</span>
    </button>
  </div>";
  }
  ?>
<div class="container my-4">
	<h2 class="text-center my-4">Register</h2>
	<form name="form1" method="post" action="">
		<div class="form-group">
			<label for="Fullname">Full Name <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="name">
		</div>
		<div class="form-group">
			<label for="email">Email <span class="text-danger">*</span></label>
			<input type="email" class="form-control" name="email">
		</div>			
		<div class="form-group">
			<label for="username">Username <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="username">
		</div>
		<div class="form-group">
			<label for="username">Password <span class="text-danger">*</span></label>
			<input type="password" class="form-control" name="password">
		</div>
		<div class="form-group">
			<input type="submit" value="submit" name="submit" class="form-control btn btn-primary">
		</div>
	</form>
</div>

<?php require_once "footer.php"; ?>