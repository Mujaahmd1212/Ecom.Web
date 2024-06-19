<?php
include('../includes/connection.php');

if(isset($_POST['insert_brands'])){
  $brands_tittle=$_POST['brands_tittle'];

  //SQL Query
  //Check For Duplicates
  
  $select_Query = "SELECT * FROM `brands_tb` WHERE brand_name= '$brands_tittle' ";
  $runselect_Query=mysqli_query($con, $select_Query);
  $countRows = mysqli_num_rows($runselect_Query);

  if($countRows>0){
    echo"<script>alert('Brand is already enterd')</script>";
  }
  else{

  //we use the backtick TABLE 
  $insert_query="INSERT INTO `brands_tb`(brand_name)VALUES('$brands_tittle')";
  
  //Execute the variable
  $run=mysqli_query($con, $insert_query);

  if($run){
    echo"<script> alert ('brand Insterted!') </script>";
    }
  }
}

?>

<form action="" method="POST">
  <div class="input-group mb-3 mt-5">
  <span class="input-group-text" id="basic-addon1">Brands Tittle</span>
  <input type="text" class="form-control" name="brands_tittle" placeholder="Enter brands Name" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10">
  <input type="submit" name="insert_brands" class="form-control bg-warning btn btn-outline-dark" value="insert brands">
</div>
</form>