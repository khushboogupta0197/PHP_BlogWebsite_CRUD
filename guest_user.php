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
      <li class="nav-item active">
        <a class="nav-link">Welcome Guest User <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
<div class="container mt-4">
  <h2 class="text-center">Welcome Guest User</h3>
    <hr>

    <table class="table" id="myTable">
      <thead class="d-none">
        <tr>
          <th scope="col">S.No</th>
          <th scope="col">Blog Title</th>
          <th scope="col">Blog Description</th>
          <th scope="col">Blog Comments</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><b>1.</b></th>
          <td><b>Sass</b></td>
          <td>Sass is a preprocessor scripting language that is interpreted or compiled into Cascading Style Sheets.
            SassScript is the scripting language itself. Sass consists of two syntaxes. The original syntax, called "the
            indented syntax," uses a syntax similar to Haml.</td>
          <td><b>Comments: </b><i>This makes easy to manage complex code</i></td>
        </tr>
        <tr>
          <td><b>2.</b></th>
          <td><b>Bootstrap</b></th>
          <td>Bootstrap is a free and open-source CSS framework directed at responsive, mobile-first front-end web
            development. It contains CSS- and JavaScript-based design templates for typography, forms, buttons,
            navigation, and other interface components.</td>
          <td><b>Comments: </b><i>It makes to write Minimal css</i></td>
        </tr>
        <tr>
          <td><b>3.</b></th>
          <td><b>Jquery</b></th>
          <td>jQuery is a JavaScript library designed to simplify HTML DOM tree traversal and manipulation, as well as
            event handling, CSS animation, and Ajax. It is free, open-source software using the permissive MIT License.
            As of May 2019, jQuery is used by 73% of the 10 million most popular websites.</td>
          <td><b>Comments: </b><i>The Write Less, Do More</i></td>
        </tr>
        <tr>
          <td><b>4.</b></th>
          <td><b>CSS</b></th>
          <td>Cascading Style Sheets is a style sheet language used for describing the presentation of a document
            written in a markup language such as HTML. CSS is a cornerstone technology of the World Wide Web, alongside
            HTML and JavaScript</td>
          <td><b>Comments: </b><i>Look $ feel of webpage</i></td>
        </tr>
      </tbody>
    </table>

</div>

<?php require_once "footer.php"; ?>