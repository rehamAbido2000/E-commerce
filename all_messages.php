<?php
    ob_start(); 
    session_start();
    $page_name = "Get All Message";
    $style = "messages.css";
    require_once "init.php";
    if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
    require './layout/topNav.php';
    ?>
    <div id="layoutSidenav">     
    <?php 
      require './layout/sidNav.php';
    ?> 
    <div id="layoutSidenav_content">
      <div class="container-fluid ">
        <div class="allContent">
    <div class="container mb-3">
        <img style="display: block;margin: auto;margin-top:10px;margin-bottom:20px" class="add_admin" src="img/icons8-unread-messages-48.png" alt="add_admin">
        <h3 class="text-center mt-2 mb-3">Welcome To Website Dashboard .</h3>
        <p class="text-center">From This Page You Can Show All Messages</p>

        <?php $allData = getAllData("messages");?>
<div class="row mt-5">
        <?php foreach ($allData as $all_messages){ ?>
<div class="col-md-6">
            <div class="ui cards mb-3 text-center">
                <div class="card">
                    <div class="content">
                    <img style="margin: 20px 0;width:30%" src="img/check.gif" alt="sender">
                    <div class="header pb-3">
                        <?php echo $all_messages["name"];?>
                    </div>
                    <div class="meta">
                    <?php echo $all_messages["time"];?>
                    </div>
                    <div class="meta">
                    <?php echo $all_messages["email"];?>
                    </div>
                    <div class="description pb-3">
                    <?php echo $all_messages["msg"];?>
                    </div>
                    </div>
                    <div class="extra content">
                    <div class="ui two buttons">
                       <a class="ui basic red button" style="text-decoration: none !important;color:#db2828!important" href="delete.php?from=messages&id=<?php echo $all_messages["id"]?>&table=messages"> Delete </a>
                    </div>
                    </div>
                    </div>
                </div>
        </div>
        <?php } ?>
        </div>

            <?php if (count_users("id","contact_us") == 0){?>
                <p style="margin-top: 100px;font-weight: 700;font-size: 30px;" class="text-danger text-center">* There is No Message To Show *</p>
            <?php } ?>

    </div>
    </div>
      </div>
    </div>
</div>
    <?php 
// }else{
//         header("location:signin.php");
//     }
require_once "./includes/template/footer.php";
}else{
    header("Location:LogIn.php");
}
ob_end_flush();