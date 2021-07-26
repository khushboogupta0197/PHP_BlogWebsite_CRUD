<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
  header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");
$insert = false;
$emptVal ="";

if(isset($_POST['Submit'])) { 
  $name = $_POST['name'];
  $blog_description = $_POST['blog_description'];
  $blog_comment = $_POST['blog_comment'];
  $loginId = $_SESSION['id'];
    
  // checking empty fields
  if(empty($name) || empty($blog_description) || empty($blog_comment)) {
      $emptVal= "All fields should be filled. Either one or many fields are empty.";
  } 
  else { 
    // if all the fields are filled (not empty)   
    //insert data to database 
    $result = mysqli_query($mysqli, "INSERT INTO posts(name, blog_description, blog_comment, login_id) VALUES('$name','$blog_description','$blog_comment', '$loginId')");
    
    //display success message
    if($result){ 
      $insert = true;
     } 
  }
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
        <a class="nav-link" href="view.php">View Posts</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
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
  <h2 class="text-center my-4">ADD POST</h2>
  <form action="add.php" method="post" name="form1">
    <div class="form-group">
      <label for="name">Blog Title <span class="text-danger">*</span></label>
      <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
      <label>Blog Description <span class="text-danger">*</span></label>
      <td><textarea type="text" name="blog_description" class="form-control"></textarea>
    </div>
    <div class="form-group">
      <label>Blog Comments <span class="text-danger">*</span></label>
      <input type="text" name="blog_comment" class="form-control">
    </div>
    <div class="form-group">
      <input type="submit" name="Submit" value="Add Post" class="form-control btn btn-primary">
    </div>
  </form>
</div>
<?php require_once "footer.php"; ?>