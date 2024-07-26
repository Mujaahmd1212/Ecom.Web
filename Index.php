<?php //connection file linked 
  include('./includes/connection.php');
  include('./functions/common_functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecom.Web</title>

  <!--Boostrap 5.3 Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--Fontawesome Link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  
  <!--Custom Css-->
  <link rel="stylesheet" href="/CSS/Style.css">

</head>

<body>
  <!--Navbar Start-->
  <nav class="navbar navbar-expand-lg navbar-light bg-warning">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Logo</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Product</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>3</sup></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Total:2500 Rs</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-danger" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
  <!--Navbar End-->

  <!--content area start-->
  <div calss="bg-light">
    <h3 class="text-center">online store </h3>
    <p class="text-center">All your elctronics need in one place</p>

    <div class="row">
      <!--Products Area-->
      <div class="col-md-10">
        <div class="row">
  <!--Fetch data from DB for Products from function-->
  <?php
      getproducts();
  ?>
        </div>
      </div>

      <!--Side Nav Area-->
      <div class="col-md-2 bg-warning p-0">
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-danger">
            <h4 class="text-light">Brands</h4>
          </li>
          <!--connection to the data base tables wicha are brand tables in there-->
          <?php
             getBrands();
          ?>
          
        </ul>

        <!--Categories-->
        <ul class="navbar-nav me-auto text-center">
          <li class="nav-item bg-danger">
            <h4 class="text-light">Categories</h4>
          </li>
              <?php
              getCategories();           
              ?>

        </ul>
      </div>

    </div>
    <!--content area End-->

    
    <!--Footer Section Start-->
    <div class="bg-warning text-center p-3 ">
      <p>All right reserved Designed by Wdd B4 - 2024 (diploma) </p>
    </div>
    <!--Footer End-->











    <!--Javascript B.Strap Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>