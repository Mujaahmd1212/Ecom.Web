<?php
include('./includes/connection.php');

//---------get products
function getproducts(){
  global $con;//functuion is make d.base so make it global database
  $select_query="SELECT*FROM`products_tb` ORDER BY RAND()";
  $run_select_query=mysqli_query($con, $select_query);
  
  while($row=mysqli_fetch_assoc($run_select_query)){
    $product_id=$row['product_id'];
    $product_title=$row['product_title'];
    $product_detail=$row['product_detail'];
    $product_keyword=$row['product_keyword'];
    $cat_id=$row['category_id'];
    $brand_id=$row['brand_id'];
    $product_image1=$row['product_image1'];
    $product_price=$row['product_price'];

    //loop the cart with the above variable
    echo"<div class='col-md-4 mb-3 px-4'>
            <div class='card' style='width: 18rem;'>
              <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
              <div class='card-body'>
                <h5 class='card-title'>$product_title</h5>
                <p class='card-text'>$product_detail</p>
                <h3>LKR. $product_price</h3>
                <a href='#' class='btn btn-success'>Add To Cart</a>
                <a href='#' class='btn btn-warning'>Details</a>
              </div>
            </div>
          </div>";
  }
}

//---------get Brands
function getBrands(){
  global $con;
  $select_brand_query="SELECT * FROM `brands_tb`";  //backtick
  $run_query=mysqli_query($con, $select_brand_query);
  //cut this code ($row_data=mysqli_fetch_assoc($run_query));
  
  while ($row_data=mysqli_fetch_assoc($run_query)) {
    $brand_name=$row_data['brand_name'];
    $brand_id=$row_data['brand_id'];
    

    echo" <li class='nav-item'>
<a href='index.php?brands=$brand_id' class='nav-link text-light'>$brand_name</a>
</li>";

  }
}

//---------get Categories
function getCategories(){
  global $con;
  $select_categories_query=" SELECT * FROM `categories_tb`";//bactick for databse
                $run_query=mysqli_query($con, $select_categories_query);              
                
                //echo $row_data['category_name']
                while ($row_data=mysqli_fetch_assoc ($run_query)){

                  $category_name=$row_data['category_name'];
                  $category_id=$row_data['category_id'];

                  //echo $row_data['category_name'];

                  echo "<li>
            <a href='index.php?category=$category_id' class='nav-link text-light'>$category_name</a>
          </li>";
                }
}
?>