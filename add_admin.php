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
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty( $_POST['name'])&& !empty($_POST['email']) ){
        $name      = FILTER_VAR( $_POST['name'], FILTER_SANITIZE_STRING);
        $email          = FILTER_VAR( $_POST['email'], FILTER_SANITIZE_EMAIL);
        $password       = sha1      ( $_POST['password']);
        $gender       = FILTER_VAR( $_POST['gender'], FILTER_SANITIZE_STRING);


        /*check if info already added*/

        global $con;
        $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute(array($email));
        $rows = $stmt->fetch(PDO::FETCH_ASSOC);
        $count = $stmt->rowCount();
        if ($count){
            echo "
                <script>
                    toastr.error('Sorry Admin Email is already excit.')
                </script>";
        }
        else{
            insert_admin($name,$email,$password,$gender);
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
        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>" >
           
            <div class="row  m-2">
              <!--User Name-->
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="Name">Admin Name</label>
                    <input type="text" class="form-control"  id="Name " 
                        placeholder="Enter User name" name="name" autocomplete="off">
                </div>

                <!--Email-->           
                <div class="col-md-6 mb-3 col-xs-12">
                    <label for="Email">Email</label>
                    <input type="email" class="form-control" id="Email"
                            placeholder="Enter Email" name="email" >
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
                      <option selected disabled value="">Choose...</option>
                      <option value="male">Male</option>
                      <option value="female">Female</option>
                  </select>
                </div>


              </div>
              
              <!--btn -> add--->
                <button class="btn btn-primary mt-3 ml-4">Add to Admins </button>
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
