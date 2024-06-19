<?php
include('../includes/connection.php');

if(isset($_POST['insert_cat'])){
  $cat_tittle=$_POST['cat_tittle'];

  //SQL Query
  $insert_query="INSERT INTO `categories_tb`()";
}

?>


<form action="" method="POST">
  <div class="input-group mb-3 mt-5">
  <span class="input-group-text" id="basic-addon1">Category Tittle</span>
  <input type="text" class="form-control" name="cat_tittle" placeholder="Enter Category Name" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10">
  <input type="submit" name="insert_cat" class="form-control bg-warning btn btn-outline-dark" value="insert category">
</div>
</form>