<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
// including the database connection file
include_once("connection.php");

$update = false;
$emptVal ="";

if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$name = $_POST['name'];
	$blog_description = $_POST['blog_description'];
	$blog_comment = $_POST['blog_comment'];	
	
	// checking empty fields
	if(empty($name) || empty($blog_description) || empty($blog_comment)) {
		$emptVal= "All fields should be filled. Either one or many fields are empty.";			
	} 
	else {	
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE posts SET name='$name', blog_description='$blog_description', blog_comment='$blog_comment' WHERE id=$id");
		
		//redirectig to the display page. In our case, it is view.php
		header("Location: view.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$blog_description = $res['blog_description'];
	$blog_comment = $res['blog_comment'];
}
?>
<?php require_once "header.php"; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
	<a href="index.php" class="navbar-brand font-weight-bold">
		<h2><i class="fa fa-tree"></i><i>CreativeBlog</i></h2>
	</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
		aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarNavDropdown">
		<ul class="navbar-nav">
			<li class="nav-item">
				<a class="nav-link" href="view.php">View Blogs</a>
			</li>
			<li class="nav-item">
				<a class="nav-link" href="logout.php">Logout</a>
			</li>
		</ul>
	</div>
</nav>

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
	<h2 class="text-center my-4">EDIT POST</h2>
	<form name="form1" method="post" action="edit.php">
		<div class="form-group">
			<label for="name">Blog Title <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="name" value="<?php echo $name;?>">
		</div>
		<div class="form-group">
			<label>Blog Description <span class="text-danger">*</span></label>
			<td><input type="text" class="form-control" name="blog_description" value="<?php echo $blog_description;?>">
			</td>
		</div>
		<div class="form-group">
			<label>Blog Comments <span class="text-danger">*</span></label>
			<input type="text" class="form-control" name="blog_comment" value="<?php echo $blog_comment;?>">
		</div>
		<div class="form-group">
			<input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
			<input type="submit" name="update" value="Update" class="form-control btn btn-primary">
		</div>
	</form>
</div>
<?php require_once "footer.php"; ?>