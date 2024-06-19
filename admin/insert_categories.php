<?php
include('../includes/connection.php');

if(isset($_POST['insert_cat'])){
  $cat_tittle=$_POST['cat_tittle'];

  //SQL Query
  //Check For Duplicates

  $select_Query = "SELECT * FROM `categories_tb` WHERE category_name= '$cat_tittle' ";
  $runselect_Query=mysqli_query($con, $select_Query);
  $countRows = mysqli_num_rows($runselect_Query);

  if($countRows>0){
    echo"<script>alert('category is already enterd')</script>";
  }
  else{







  //we use the backtick TABLE 
  $insert_query="INSERT INTO `categories_tb`(category_name)VALUES('$cat_tittle')";
  
  //Execute the variable
  $run=mysqli_query($con, $insert_query);

  if($run){
    echo"<script> alert ('Category Insterted!') </script>";
  }
  }
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