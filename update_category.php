<?php
session_start();
ob_start(); 
$style="addMember.css";
include 'init.php';
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
// if(isset($_SESSION['role'])){
require './layout/topNav.php';

// incase of exist session
// if(isset($_SESSION['username'])){
    if(isset($_GET["id"]) && is_numeric($_GET['id'])){
        $id=$_GET["id"];
    $data = getData_with_id("categories",$id);
    
    }
// incase of send from post and some filed is not empty 
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    if(empty($_POST["cat_name"]) ){
        echo "
        <script>
            toastr.error('Sorry Category Can not be empty......!')
        </script>";
      }else{

        $name      = FILTER_VAR( $_POST['cat_name'], FILTER_SANITIZE_STRING);

        update_category ($name,$id);
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
        <p class="secondParagraph text-center pb-5">From this page you can Update a Category to dashboard</p>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" >
           
            <div class="row  m-2">
              <!--User Name-->
                <div class="col-md-6 m-auto col-xs-12">
                    <label for="Name">Category Name</label>
                    <input type="text" class="form-control"  id="Name " 
                        placeholder="Enter Category name" required name="cat_name" autocomplete="off" value="<?php echo $data['cat_name']?>">
                </div>

              </div>
              
              <!--btn -> add--->
                <button style="margin-top: 15px !important;" class="btn btn-primary d-block m-auto mt-3 ml-4">Update Categories </button>
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
