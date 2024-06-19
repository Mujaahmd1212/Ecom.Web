<?php
include('../includes/connection.php');

if(isset($_POST['insert_products'])){
  $products_tittle=$_POST['products_tittle'];

  //SQL Query
  //Check For Duplicates
  
  $select_Query = "SELECT * FROM `products_tb` WHERE product_name= '$products_tittle' ";
  $runselect_Query=mysqli_query($con, $select_Query);
  $countRows = mysqli_num_rows($runselect_Query);

  if($countRows>0){
    echo"<script>alert('product is already enterd')</script>";
  }
  else{

  //we use the backtick for SQL TABLE 
  $insert_query="INSERT INTO `products_tb`(product_name)VALUES('$products_tittle')";
  
  //Execute the variable
  $run=mysqli_query($con, $insert_query);

  if($run){
    echo"<script> alert ('product Insterted!') </script>";
   }
  }
}

?>

<form action="" method="POST">
  <div class="input-group mb-3 mt-5">
  <span class="input-group-text" id="basic-addon1">Products Tittle</span>
  <input type="text" class="form-control" name="products_tittle" placeholder="Enter products Name" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10">
  <input type="submit" name="insert_products" class="form-control bg-warning btn btn-outline-dark" value="insert products">

</div>
</form>