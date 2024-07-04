<?php
include('../includes/connection.php');

//button (insert_product)
if(isset($_POST['insert_product'])){
  $product_title=$_POST['product_title'];
  $product_description=$_POST['description'];
  $product_keyword=$_POST['keyword'];
  $product_category=$_POST['product_categories'];
  $product_brand=$_POST['product_brands'];
  $product_price=$_POST['product_price'];
  $product_status="true";

  //Access images
  $product_image1=$_FILES['product_image1']['name'];
  $product_image2=$_FILES['product_image2']['name'];
  $product_image3=$_FILES['product_image3']['name'];

  //Access images tmp name
  $tmp_product_image1=$_FILES['product_image1']['tmp_name'];
  $tmp_product_image2=$_FILES['product_image2']['tmp_name'];
  $tmp_product_image3=$_FILES['product_image3']['tmp_name'];

  //Check empty Conditions
  if($product_title=='' OR $product_description=='' OR $product_keyword=='' OR $product_category=='' OR $product_brand=='' OR $product_price=='' OR $product_image1=='' OR $product_image2=='' OR $product_image3==''){
    echo"<script> alert('Please Fill All Fields') </script>";
    exit();
  }
  else{
    move_uploaded_file($tmp_product_image1, "./product_images/$product_image1");
    move_uploaded_file($tmp_product_image2, "./product_images/$product_image2");
    move_uploaded_file($tmp_product_image3, "./product_images/$product_image3");

    //now files are moved we can put the query (query means add the data in to the database)
    //Insert Query
    $insert_Query="INSERT INTO `products_tb`(`product_title`, `product_detail`, `product_keyword`, `category_id`, `brand_id`, `product_image1`, `product_image2`, `product_image3`, `product_price`, `date`, `satatus`) VALUES ('$product_title','$product_description', '$product_keyword', '$product_category', '$product_brand', '$product_image1', '$product_image2', '$product_image3', '$product_price', NOW(),'$product_status')";

    $run_insert_Query=mysqli_query($con, $insert_Query);
    if($run_insert_Query){
      echo"<script> alert('Product inserted successfully') </script>";
    }

  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Insert Products - Admin Panel</title>

<!--Boostrap 5.3 Link-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<!--Fontawesome Link-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!--Custom Css-->
<link rel="stylesheet" href="/CSS/Style.css">

</head>
<body class="bg-light">
  <div class="container">
    <h1 class="text-center">Insert Product</h1>

  <!--Form Area-->
    <form action="" method="POST" enctype="multipart/form-data">
  <!--Product Title-->  
    <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="product_title">Product Title</label>
        <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product Title" required="Please Enter The Product Title">
      </div>

      <!--Product Description-->  
    <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="description">Product Description</label>
        <input type="text" name="description" id="description" class="form-control" placeholder="Enter Product description" required="Please Enter The Product description">
      </div>

      <!--Keyword-->
      <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="product_keyword">Product keyword</label>
        <input type="text" name="keyword" id="keyword" class="form-control" placeholder="Enter Product keyword" required="Please Enter The Product keyword">
      </div>
      
      <!--Categories-->
        <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_categories" id="product_categories" class="form-select">
            <option value="">select category</option>

      <!--Calling The Category Table-->
            <?php
              $select_query="SELECT*FROM `categories_tb`";
              $run_select_query=mysqli_query($con, $select_query);

              //loop to show table data
              while($row=mysqli_fetch_assoc($run_select_query)){
                $cat_name=$row['category_name'];
                $cat_id=$row['category_id'];
              
              echo"<option value='$cat_id'>$cat_name</option>";
              }
            ?>

          </select>
      </div>

      <!--Brands-->
      <div class="form-outline mb-4 w-50 m-auto">
          <select name="product_brands" id="product_brands" class="form-select">
            <option value="">select Brand</option>
            <?php
            $select_query="SELECT*FROM `brands_tb`";
            $run_select_query=mysqli_query($con, $select_query);

            while($row_data=mysqli_fetch_assoc($run_select_query)){
              $brand_name=$row_data['brand_name'];
              $brand_id=$row_data['brand_id'];

              echo "<option value='$brand_id'>$brand_name</option>";
            }
            ?>
          </select>
      </div>

       <!--Image-01-->
       <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="product_image1">Product image 01</label>
        <input type="file" name="product_image1" id="product_image1" class="form-control"  required="Please insert Image-01 ">
      </div>

      <!--Image-02-->
      <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="product_image2">Product image 02</label>
        <input type="file" name="product_image2" id="product_image2" class="form-control"  required="Please insert Image-02 ">
      </div>

      <!--Image-03-->
      <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="product_image3">Product image 03</label>
        <input type="file" name="product_image3" id="product_image3" class="form-control"  required="Please insert Image-03 ">
      </div>

      <!--Price-->
      <div class="form-outline mb-4 w-50 m-auto">
        <label class="form-label" for="product_price">Product price</label>
        <input type="text" name="product_price" id="product_price" class="form-control" placeholder="Enter Product price" required="Please Enter The Product keyword">
      </div>

      <!--Submit Button-->
      <div class="form-outline mb-4 w-50 m-auto">
        <input type="submit" name="insert_product" class="btn btn-success" value="insert product">

      </div>
      
    </form>
  </div>
  


<!--Javascript B.Strap Link-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>