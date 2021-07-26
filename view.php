<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM posts WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<?php require_once "header.php"; ?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a href="index.php" class="navbar-brand font-weight-bold"><h2><i class="fa fa-tree"></i><i>CreativeBlog</i></h2></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>        
    </ul>
  </div>
</nav>

<div class="container my-5">
<div class="text-center">
	<h2 class="my-4">TRENDING POSTS</h2>
	<a class="btn btn-primary my-2" href="add.php">Add New Post</a> 
</div>
	<table class="table" id="myTable">
		<thead class="d-none">
			<tr>
				<th>Blog Title</th>
				<th>Blog Description</th>
				<th>Blog Comments</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($res = mysqli_fetch_array($result)) {		
				echo "<tr>";
				echo "<td><b>".$res['name']."</b></td>";
				echo "<td>".$res['blog_description']."</td>";
				echo "<td>".$res['blog_comment']."</td>";	
				echo "<td><a class='btn btn-primary m-2' href=\"edit.php?id=$res[id]\">Update</a><a class='btn btn-primary mx-2' href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
			}
			?>
		</tbody>
	</table>
</div>

<?php require_once "footer.php"; ?>
