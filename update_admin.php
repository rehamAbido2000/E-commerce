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
    $data = getData_with_id("users",$id);
    
    }
// incase of send from post and some filed is not empty 
if ($_SERVER['REQUEST_METHOD'] == 'POST' ){
       



        /*check if input not empty*/

        if(empty($_POST["name"]) || empty($_POST["password"])){
            echo "
            <script>
                toastr.error('Sorry pass or name Can not be empty......!')
            </script>";
          }else if(!is_string($_POST["password"]) || !is_string($_POST["name"])){
            echo "
            <script>
                toastr.error('Sorry pass or name Should be string only......!')
            </script>";
          }else if(strlen($_POST["name"])<5){
            echo "
            <script>
                toastr.error('Sorry Title Should be more than 5 characters......!')
            </script>";
          }else if( strlen($_POST["password"])<5){
            echo "
            <script>
                toastr.error('Sorry Content Should be more than 15 characters......!')
            </script>";
          }else{
            $name           = FILTER_VAR( $_POST['name'], FILTER_SANITIZE_STRING);
            $email          = FILTER_VAR( $_POST['email'], FILTER_SANITIZE_EMAIL);
            $pass           = filter_var($_POST["password"],FILTER_SANITIZE_STRING);
            $sup_hased      = sha1($pass);
            $gender         = FILTER_VAR( $_POST['gender'], FILTER_SANITIZE_STRING);
            $adress         = FILTER_VAR( $_POST['adress'], FILTER_SANITIZE_STRING);
            update_user ($name,$email,$sup_hased,$gender,$adress,$id);

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
        <p class="secondParagraph text-center pb-5">From this page you can update an Admin to dashboard</p>
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" >
           
            <div class="row  m-2">
              
              <!--User Name-->
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="Name">Admin Name</label>
                    <input type="text" class="form-control"  id="Name " 
                        placeholder="Enter User name" name="name" autocomplete="off" value="<?php echo $data['username']?>">
                </div>

                

                <!--Email-->           
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email"
                            placeholder="Enter Email" name="email" value="<?php echo $data['email']?>">
                </div><!--autocomplete="new-off"-->


                <!--password--->
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="Password">Password</label>
                    <input type="password" class="form-control" id="Password"
                    placeholder="Enter email password" name="password" autocomplete="new-password">
                </div>

                <!--position--->
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="gender">Gender</label>
                    <select class="custom-select ui search dropdown"  name="gender" id="gender" required>
                        <?php 
                            if($data['gender'] === 'Male'){$gender = 'Male';$other = 'Female';}
                            else{$gender = 'Female';$other = 'Male';}
                        ?>
                      <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
                      <option value="<?php echo $other; ?>"><?php echo $other; ?></option>
                  </select>
                </div>

                 <!--User adress-->
                 <div class="col-md-12 mb-3 col-xs-12">
                    <label for="adress">Admin Adress</label>
                    <input type="text" class="form-control"  id="adress " 
                        placeholder="Enter User Adress" name="adress" autocomplete="off"value="<?php echo $data['adress']?>">
                </div>

                <!--User adress [city]-->
                <!-- <div class="col-md-6 mb-3 col-xs-12">
                    <label for="adress">Admin Adress[City]</label>
                    <select class="custom-select ui search dropdown"  name="adress" id="adress" required>
                      <option selected disabled value="">Choose...</option>
                      <option value="Banha">Banha</option>
                      <option value="Arish">Arish</option>
                  </select>
                </div> -->
                <!--User adress [Governorate]-->
                <!-- <div class="col-md-6 mb-3 col-xs-12">
                    <label for="adress">Admin Adress [Governorate]</label>
                    <select class="custom-select ui search dropdown"  name="adress" id="adress" required>
                      <option selected disabled value="">Choose...</option>
                      <option value="Asyut">Asyut</option>
                      <option value="Alex">Alex</option>
                  </select>
                </div> -->
                
                
            </div>
            
              
              <!--btn -> add--->
                <button class="btn btn-primary mt-3 ml-4">Update Admins </button>
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