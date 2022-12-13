<?php
session_start();
ob_start(); 
$style="addMember.css";
include 'init.php';
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
// if(isset($_SESSION['role'])){
require './layout/topNav.php';
$categories=getAllData("categories");
// incase of exist session
// if(isset($_SESSION['username'])){

// incase of send from post and some filed is not empty 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['adress'])&& !empty($_POST['desc']) ){

        $adress         = FILTER_VAR( $_POST['adress'], FILTER_SANITIZE_STRING);
        $desc         = FILTER_VAR( $_POST['desc'], FILTER_SANITIZE_STRING);

        $avatar_name = $_FILES["img"]["name"];
        $size = $_FILES["img"]["size"];
        $tmp_name = $_FILES["img"]["tmp_name"];
        $type = $_FILES["img"]["type"];
        $extention_allowed = array("png","jpg","jpeg","webp");   
        @$extention             = strtolower(end(explode(".",$avatar_name)));
        if(in_array($extention,$extention_allowed)){
            $avatar = "Artical-" . rand(0,1000000) . "." . $extention ;
            $destination = "img/articals/" . $avatar ;


            /*check if info already added*/

            global $con;
            $stmt = $con->prepare("SELECT * FROM blog WHERE adress = ?");
            $stmt->execute(array($adress));
            $rows = $stmt->fetch(PDO::FETCH_ASSOC);
            $count = $stmt->rowCount();
            if ($count){
                echo "
                    <script>
                        toastr.error('Sorry Artical is already excit.')
                    </script>";
            }
            else{
                insert_blog($adress,$desc,$avatar);
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
        <p class="secondParagraph text-center pb-5">From this page you can add new Artical to dashboard</p>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
           
            <div class="row  m-2">
                
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="adress">Artical Name</label>
                    <input type="text" class="form-control"  id="adress" 
                        placeholder="Enter Artical Name" required name="adress" autocomplete="off">
                </div>

                <!--img-->
                <div class="col-md-6">
                    <label for="img">img</label>
                    <input type="file" class="form-control" required id="img" name="img" >
                </div>
                <div class="col-md-12 mt-3">
                    <label for="des">Description</label>
                    <textarea id="des" name="desc" class="form-control" placeholder="Enter Arical description:" rows="4" required autocomplete="off"></textarea>
                </div>  

              </div>
              
              <!--btn -> add--->
                <button style="margin-top: 30px !important;padding: 15px 30;" class="btn btn-primary d-block m-auto">Add Artical </button>
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
