<?php
session_start();
ob_start(); 
$style="addMember.css";
include 'init.php';
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
// if(isset($_SESSION['role'])){
require './layout/topNav.php';
$categories=getAllData("categories");
$brands=getAllData("brands");
// incase of exist session
// if(isset($_SESSION['username'])){

// incase of send from post and some filed is not empty 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['cat_id'])&& !empty($_POST['p_name']) ){

        $cat_id         = FILTER_VAR( $_POST['cat_id'], FILTER_SANITIZE_NUMBER_INT);
        $brand_id       = FILTER_VAR( $_POST['brand_id'], FILTER_SANITIZE_NUMBER_INT);
        $p_name         = FILTER_VAR( $_POST['p_name'], FILTER_SANITIZE_STRING);
        $desc           = FILTER_VAR( $_POST['desc'], FILTER_SANITIZE_STRING);
        $price          = FILTER_VAR( $_POST['price'], FILTER_SANITIZE_NUMBER_INT);
        $quantity       = FILTER_VAR( $_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
        $discount       = FILTER_VAR( $_POST['discount'], FILTER_SANITIZE_NUMBER_INT);

        $avatar_name = $_FILES["img"]["name"];
        $size = $_FILES["img"]["size"];
        $tmp_name = $_FILES["img"]["tmp_name"];
        $type = $_FILES["img"]["type"];
        $extention_allowed = array("png","jpg","jpeg","webp");   
        @$extention             = strtolower(end(explode(".",$avatar_name)));
        if(in_array($extention,$extention_allowed)){
            $avatar = "Product-" . rand(0,1000000) . "." . $extention ;
            $destination = "img/products/" . $avatar ;


            /*check if info already added*/

            global $con;
            $stmt = $con->prepare("SELECT * FROM products WHERE product_name = ?");
            $stmt->execute(array($p_name));
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            if ($count){
                echo "
                    <script>
                        toastr.error('Sorry Admin Email is already excit.')
                    </script>";
            }
            else{
                insert_product($cat_id,$brand_id,$p_name,$price,$quantity,$discount,$desc,$avatar);
                move_uploaded_file($tmp_name,$destination);
            }

        }else{
            echo "
            <script>
                toastr.error('Sorry This Extention not excit.')
            </script>";
        }  


    }
    
    // else{
    //     echo "<div class='alert alert-danger'>you can not add member</div>";
    //     header("refresh:5;url=index.html");
    // }
// }
// else{ echo "<div class='alert alert-danger'>you can not see this page id not exist</div>";
//     header("refresh:5;url=index.html");
//     exit();
// }

?>
<div id="layoutSidenav">     
    <?php 
      require './layout/sidNav.php';
    ?> 
    <div id="layoutSidenav_content">
      <div class="container-fluid ">
        <div class="allContent">
    <div class="container mainAddForm">
        <img style="display: block;width:100px;margin:auto;margin-bottom: 20px;" src="img/addMember.png">
        <p class="firstParagraph text-center">Welcome to website dashboard</p>
        <p class="secondParagraph text-center pb-5">From this page you can add new Admin to dashboard</p>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
           
            <div class="row  m-2">
                
              <!--category--->
                <div class="col-md-3 mb-3 col-xs-12">
                    <label for="cat_id">Category</label>
                    <select class="custom-select ui search dropdown"  name="cat_id" id="cat_id" required>
                        <option selected disabled value="">Choose...</option>

                       <?php foreach($categories as $cat){?>
                            <option value="<? echo $cat['id'];?>"><?php echo $cat["cat_name"]; ?></option>
                       <?php } ?>

                    </select>
                </div>
                
              <!--brand--->
                <div class="col-md-3 mb-3 col-xs-12">
                    <label for="brand_id">Brand</label>
                    <select class="custom-select ui search dropdown"  name="brand_id" id="brand_id" required>
                        <option selected disabled value="">Choose...</option>

                       <?php foreach($brands as $brand_data){?>
                            <option value="<? echo $brand_data['id'];?>"><?php echo $brand_data["brand"]; ?></option>
                       <?php } ?>

                    </select>
                </div>

              <!--Product Name-->
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="p_name">Product Name</label>
                    <input type="text" class="form-control"  id="p_name" 
                        placeholder="Enter Product Name" required name="p_name" autocomplete="off">
                </div>

                <!--price-->           
                <div class="col-md-4 mb-3 col-xs-12">
                    <label for="price">Price</label>
                    
                            <div style="width: 100%;" class="input-group-prepend">
                                <input type="number" required class="form-control" id="price"
                                placeholder="Enter price" name="price" >
                                <div class="input-group-text"> $ </div>

                    </div>


                </div><!--autocomplete="new-off"-->


                <!--quantity--->
                <div class="col-md-4 mb-3 col-xs-12">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity"
                    placeholder="Enter Quantity" required name="quantity" autocomplete="off">
                </div>

                <!--discount--->
                <div class="col-md-4 mb-3 col-xs-12">
                    <label for="discount">Discount</label>
                    <select class="custom-select ui search dropdown"  name="discount" id="discount" required>
                        <option selected disabled value="">Choose...</option>
                            <option value="0"><?php echo "No Discount"; ?></option>
                       <?php for($i=5;$i<=95;$i+=5){?>
                            <option value="<? echo $i;?>"><?php echo $i . " %"; ?></option>
                       <?php } ?>

                    </select>
                </div>
                
                <div class="col-md-12 mt-1">
                    <label for="des">Description</label>
                    <textarea id="des" name="desc" class="form-control" placeholder="Enter Arical description:" rows="4" required autocomplete="off"></textarea>
                </div>  

                <!--img-->
                <div style="margin-top: 15px !important;" class=" col-md-4 m-auto">
                    <label for="img">img</label>
                    <input type="file" class="form-control" required id="img" name="img" >
                </div>

              </div>
              
              <!--btn -> add--->
                <button style="margin-top: 30px !important;padding: 15px 30;" class="btn btn-primary d-block m-auto">Add to Products </button>
            </form>
        </div>
        </div>
      </div>
    </div>
</div>
    <?php
    require_once "./includes/template/footer.php";
}else{
    header("Location:LogIn.php");
}
    ob_end_flush();?>
