<?php
include('../includes/connection.php');
?>

<form action="" method="POST">
  <div class="input-group mb-3 mt-5">
  <span class="input-group-text" id="basic-addon1">Products Tittle</span>
  <input type="text" class="form-control" name="products_tittle" placeholder="Enter products Name" aria-describedby="basic-addon1">
</div>

<div class="input-group w-10">
  <input type="submit" name="insert_cat" class="form-control bg-warning btn btn-outline-dark" value="insert products">
</div>
</form>