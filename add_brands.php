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

// incase of send from post and some filed is not empty 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['brand_name'])){
        $name      = FILTER_VAR( $_POST['brand_name'], FILTER_SANITIZE_STRING);


        /*check if info already added*/

        global $con;
        $stmt = $con->prepare("SELECT * FROM brands WHERE brand = ?");
        $stmt->execute(array($name));
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count){
            echo "
                <script>
                    toastr.error('Sorry Brand Name is already excit.')
                </script>";
        }
        else{
            insert_brand($name);
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
        <p class="secondParagraph text-center pb-5">From this page you can add new Brand to dashboard</p>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" >
           
            <div class="row  m-2">
              <!--User Name-->
                <div class="col-md-6 m-auto col-xs-12">
                    <label for="Name">Brand Name</label>
                    <input type="text" class="form-control"  id="Name " 
                        placeholder="Enter Brand name" required name="brand_name" autocomplete="off">
                </div>

              </div>
              
              <!--btn -> add--->
                <button style="margin-top: 15px !important;" class="btn btn-primary d-block m-auto mt-3 ml-4">Add to Categories </button>
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
