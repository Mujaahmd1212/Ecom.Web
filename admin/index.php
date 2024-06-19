<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>

  <!--Boostrap 5.3 Link-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--Fontawesome Link-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!--Custom Css-->
  <link rel="stylesheet" href="/CSS/Style.css">

</head>

<body>
  <!--Nav Bar Start-->
  <nav class="navbar navbar-dark bg-success">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <img src="/docs/5.3/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Welcome Admin
      </a>
    </div>
  </nav>
  <!--Nav Bar End-->

  <!--DashBoard Area Start-->
  <div class="bg-light">
    <h3 class="text-center p-3">DashBoard</h3>

    <div class="row">
      <div class="col-md-12 bg-warning p-3">
        <div class="button text-center">
          <button class="bg-danger">
            <a href="index.php?insert_products" class="nav-link text-light">Insert Products</a><!--we add the index.php? means load this inside the index.php also we removed the .php bcz we use that index.php? in the start but this link only change if i dont code the 64-77 lines-->
          </button>
          <button class="bg-danger">
            <a href="#" class="nav-link text-light ">View Products</a>
          </button>
          <button class="bg-danger">
            <a href="index.php?insert_categories" class="nav-link text-light ">Insert Categories</a>
          </button>
          <button class="bg-danger">
            <a href="#" class="nav-link text-light bg-danger">View Categories</a>
          </button>
          <button class="bg-danger">
            <a href="index.php?insert_brands" class="nav-link text-light bg-danger">Insert Brands</a>
          </button>
          <button class="bg-danger">
            <a href="#" class="nav-link text-light bg-danger">View Brands</a>
          </button>
        </div>
      </div>
    </div>

    <!--forms Display area-->
    <!--helps to load the insert products.php file in this file (admin file) after click the INSERT PRODUCTS button-->
    <div class="container">
      <?php
      
      if(isset($_GET['insert_products']))
      {
        include('insert_products.php');
      }
      
      if(isset($_GET['insert_categories']))
      {
        include('insert_categories.php');
      }
      
      if(isset($_GET['insert_brands']))
      {
        include('insert_brands.php');
      }
      
      ?>

    </div>
    

    <!--Git test -->




    <!--Javascript B.Strap Link-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>