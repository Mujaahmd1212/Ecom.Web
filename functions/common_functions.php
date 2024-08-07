<?php
include('./includes/connection.php');

//---------get all products
function getproducts(){

  //check isset condition to see if user has clicked brand or category
  if(!isset($_GET['category'])){
    if(!isset($_GET['brands'])){

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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>Details</a>
              </div>
            </div>
          </div>";
  }
}

}
}

//get uniqe categories
function getUniqeCategory(){

    //check isset condition to see if user has clicked category
    if(isset($_GET['category'])){
      $category_id=$_GET['category'];
  
    global $con;//function is make d.base so make it global database
    $select_query="SELECT*FROM`products_tb` where category_id=$category_id ORDER BY RAND()";
    $run_select_query=mysqli_query($con, $select_query);
    //check row count on table
    $num_of_rows=mysqli_num_rows($run_select_query);
    if($num_of_rows==0){
      echo"<h2 class='text-center text-danger'>No Stock in this Category</h2>";
    }
    
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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add To Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>Details</a>
                </div>
              </div>
            </div>";
    }
  
  }
  
}

//get uniqe brands

function getuniquebrands(){

  //check isset condition to see if user has clicked brand 
    if(isset($_GET['brands'])){
      $brand_id=$_GET['brands'];

  global $con;//functuion is make d.base so make it global database
  $select_query="SELECT*FROM`products_tb` where brand_id=$brand_id ORDER BY RAND()";
  $run_select_query=mysqli_query($con, $select_query);
  //check row count on table
  $num_of_rows=mysqli_num_rows($run_select_query);
  if($num_of_rows==0){
    echo"<h2 class='text-center text-danger'>No Stock in this Brands</h2>";
  }
  
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
                <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add To Cart</a>
                <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>Details</a>
              </div>
            </div>
          </div>";
  }
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

// search products
function searchProducts(){

    global $con;//functuion is make d.base so make it global database
    if(isset($_GET['search_data_btn'])){
      $search_data_value=$_GET['search_data_txt'];
      $select_query="SELECT*FROM`products_tb` WHERE product_keyword LIKE '%$search_data_value%' ORDER BY RAND()";
    
    
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
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add To Cart</a>
                  <a href='product_details.php?product_id=$product_id' class='btn btn-warning'>Details</a>
                </div>
              </div>
            </div>";

               }
          }
      }
      
function view_details(){
    //check isset condition to see if user has clicked brand or category
    if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
    if(!isset($_GET['brands'])){

    $product_id=$_GET['product_id'];
      global $con;//functuion is make d.base so make it global database
      $select_query="SELECT*FROM`products_tb` WHERE product_id=$product_id ORDER BY RAND()";
      $run_select_query=mysqli_query($con, $select_query);
    
    while($row=mysqli_fetch_assoc($run_select_query)){
      $product_id=$row['product_id'];
      $product_title=$row['product_title'];
      $product_detail=$row['product_detail'];
      $product_keyword=$row['product_keyword'];
      $cat_id=$row['category_id'];
      $brand_id=$row['brand_id'];
      $product_image1=$row['product_image1'];
      $product_image2=$row['product_image2'];
      $product_image3=$row['product_image3'];
      $product_price=$row['product_price'];
  
      //loop the cart with the above variable
      echo"<div class='col-md-4 mb-3 px-4'>
              <div class='card' style='width: 18rem;'>
                <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>$product_title</h5>
                  <p class='card-text'>$product_detail</p>
                  <h3>LKR. $product_price</h3>
                  <a href='index.php?add_to_cart=$product_id' class='btn btn-success'>Add To Cart</a>
                  
                </div>
              </div>
            </div>

            <div class='col-md-8'>
            <div class='row'>
              <div class='col-md-12'>
                <h4 class='text-center'>Related Images</h4>
              </div>
              <!--related images 2-->
              <div class='col-md-6'>
              <img src='./admin/product_images/$product_image2' class='card-img-top' alt='...'>
              </div>
              <!--related images 3-->
              <div class='col-md-6'>
              <img src='./admin/product_images/$product_image3' class='card-img-top' alt='...'>
              </div>
            </div>
          </div>";

             }
           }  
         }
       }
    }
    //get ip address
    function getIPAddress(){  
      //whether ip is from the share internet  
       if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                  $ip = $_SERVER['HTTP_CLIENT_IP'];  
          }  
      //whether ip is from the proxy  
      elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                  $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
       }  
  //whether ip is from the remote address  
      else{  
               $ip = $_SERVER['REMOTE_ADDR'];  
       }  
       return $ip; 
  }

  //cart funstions
  function cart(){
    if (isset($_GET['add_to_cart'])) {
        global $con;

        $ip = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];

        $select_query = "SELECT * FROM `card_details` WHERE ip_address='$ip' AND product_id=$get_product_id";
        $run_select_query = mysqli_query($con, $select_query);
        $num_of_row = mysqli_num_rows($run_select_query);

        if ($num_of_row > 0){
            echo "<script>alert('Item is already in the cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_query = "INSERT INTO `card_details` (product_id, ip_address, quantity) VALUES ($get_product_id, '$ip', 1)";
            $run_insert_query = mysqli_query($con, $insert_query);

            if ($run_insert_query){
                echo "<script>window.open('index.php', '_self')</script>";
            } else {
                echo "<script>alert('Failed to add to cart')</script>";
            }
        }
    }
}

function cart_item_count(){
  if (isset($_GET['add_to_cart'])) {
    global $con;
    $ip = getIPAddress();

    $select_query = "SELECT * FROM `card_details` WHERE ip_address='$ip'";
    $run_select_query = mysqli_query($con, $select_query);
    $num_of_row = mysqli_num_rows($run_select_query);
  }
  else{
      global $con;
      $ip = getIPAddress();
      $select_query = "SELECT * FROM `card_details` WHERE ip_address='$ip'";
      $run_select_query = mysqli_query($con, $select_query);
      $num_of_rows = mysqli_num_rows($run_select_query);
      
      }
      echo $num_of_rows;
    
  }
?>