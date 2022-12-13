<?php
session_start();
ob_start(); 
$boot = "true";
$style = "style.css";
// $script="main.js";
include 'init.php';
$categories=getAllData("categories");
if(isset($_SESSION['type'])){
    if( $_SESSION["type"] == "2"){
        $cart = get_cart_data($_SESSION["user_id"]);
        $cart_total_price = 0;
    }
}

if ($_SERVER["REQUEST_METHOD"]=="POST") {
    date_default_timezone_set('Africa/Cairo');

    $name=FILTER_VAR($_POST['userName'],FILTER_SANITIZE_STRING);
    $email=FILTER_VAR($_POST['userEmail'],FILTER_SANITIZE_EMAIL);
    $msg=FILTER_VAR($_POST['userMessage'],FILTER_SANITIZE_STRING);
    $phone=FILTER_VAR($_POST['userPhone'],FILTER_SANITIZE_NUMBER_INT);
    $header="from:".$email;
    $time= date("Y/m/d . h:i:s");
    $formErrors = array ();
    if(empty($name)||strlen($name)<3){
      $formErrors[] = "
      <script>
          toastr.error('Please fill the name field and it should be more than 3 letters.')
      </script>";
      $name_error="border border-danger";
    }
    if (empty($email)) {
        $formErrors[] = "
        <script>
            toastr.error('Please fill the email field.')
        </script>";
        $email_error="border border-danger";
    }
    if (empty($phone) || strlen((string)$phone)<11) {
        $formErrors[] = "
        <script>
            toastr.error('Please fill the phone field With 11 Digit.')
        </script>";
        $phone_error="border border-danger";
    }
    if (empty($msg)) {
        $formErrors[] = "
        <script>
            toastr.error('Please fill the message field.')
        </script>";
        $message_error="border border-danger";

    }       
    
    if (empty($formErrors)){

        //=================================== NEED UPDATE IN FUTURE =============================
        mail("amressa201611@gmail.com","Message From Website",$email,$header . "\r\n" ."CC: amressa201611@gmail.com". "\r\n" .$msg);
        addmsg($name,$email,$phone,$msg);
                
    }
}


if (isset($formErrors)){ 
    foreach($formErrors as $error){
        echo $error;
    }
}


?>
<style>
    body{
        overflow-y: unset ;
    }
</style>
    <!-- For Loading Screen -->
    <!-- <div class="loading d-flex justify-content-center align-items-center">
        <div id="spinner" class="sk-cube-grid">
            <div class="sk-cube sk-cube1"></div>
            <div class="sk-cube sk-cube2"></div>
            <div class="sk-cube sk-cube3"></div>
            <div class="sk-cube sk-cube4"></div>
            <div class="sk-cube sk-cube5"></div>
            <div class="sk-cube sk-cube6"></div>
            <div class="sk-cube sk-cube7"></div>
            <div class="sk-cube sk-cube8"></div>
            <div class="sk-cube sk-cube9"></div>
          </div>
    </div> -->
    <!-- End Loading -->
    <!-- Start Header -->
    <header >
        <!-- Start Main-header -->
        <section style="padding: 30px 0 !important;" id="Main_header" class="py-2">
            <div class="container">
                <div class="row  align-items-center ">
    
                    <div class="col-md-2 brand_name">
                        <div class="logo">
                            <a href="#">OneTech</a>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <form id="Main_head_form" class=" m-auto position-relative d-none d-md-block">
                            <input class="form-control" type="text" placeholder="Search For Products..." required>
                           
                            <button class="btnSubmit" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-3 cart_place">
                    <?php if(!isset($_SESSION['type']) || $_SESSION["type"] != "2"){ ?>
                            <div class="d-block ml-auto">
                                <div class="ui buttons p-4">
                                    <a href="login.php" class="ui button">Sign IN</a>
                                    <div class="or"></div>
                                    <a href="login.php" style="background-color: #09c;" class="ui positive button">Sign UP</a>
                                </div>
                            </div>
                            <?php }else{?>

                                <div style="justify-content: center;" class="wishlist_cart d-flex">
                            <div class="d-flex justify-content-center mr-5 align-items-center me-3 me-sm-5">
                                <div class="image">
                                    <img class="w-100" src="img/wishlist_cart/download.webp" alt="">
                                </div>
                                <div class="wishlist-info ms-3 text-end ">
                                    <a href="#" class="fs-5 d-block"><strong>wishlist</strong></a>
                                    <small>115</small>
                                </div>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="image position-relative">
                                    <img class="w-100" src="img/wishlist_cart/download (4).webp" alt="">
                                    <div class="cart-count"><?php echo count_items("product_id","cart",$_SESSION["user_id"]); ?></div>
                                </div>
                                <div class="cart-info ms-3 text-end ">
                                    <a href="cart.php" class="fs-5 d-block"><strong>Cart</strong></a>
                                    <small>$<?php 
                                        foreach($cart as $cart_total){
                                            $cart_total_price = ($cart_total["price"] * $cart_total["product_quantity"])+$cart_total_price;
                                        }
                                        echo $cart_total_price;
                                    ?></small>
                                </div>
                            </div>
                        </div>

                            <?php } ?>
                    </div>
    
                </div>
            </div>
        </section>
        <!-- End Main-header -->
    
        <!-- Start Main-Nav -->
        <nav id="main_nav" class="navbar navbar-expand-lg navbar-light ">
            <div class="container ">
                <div id="category-bar" class="d-flex justify-content-center align-items-center position-relative">
                    <span class="me-2"><i class="fas fa-bars bar-ico fs-5"></i></span>
                    <span class="fs-5 fw-bold text-uppercase" href="#">Categories</span>
                    <ul class="custom_list list-unstyled shadow ">
                        <?php foreach($categories as $categor){?>
                            <li><a href="shop.php?category=<?php echo str_replace("&","@",preg_replace("/\s+/","-",$categor["cat_name"]));?>"><?php echo $categor["cat_name"];?></a></li>
                        <?php } ?>
                    </ul>
                </div>
                <button class="navbar-toggler border-0 " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="none" aria-label="Toggle navigation">
                    <span class="me-2 text-white fw-bold text-uppercase d-lg-none">Menu</span>
                    <span><i class="fas fa-bars bar-ico text-white"></i></span>
                </button>
                <div class="collapse navbar-collapse w-100  justify-content-end" >
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a id="homeLink" class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="SuperLink" class="nav-link" href="index.php#deals_featured">Super Deals</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="FeaturedLink" class="nav-link" href="index.php#New_Arrival">New Arrival</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="PagesLink" class="nav-link" href="#">Pages <i class="fas fa-angle-down"></i></a>
                            <ul class="custom_list list-unstyled shadow ">
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="product.php">Product</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a id="blogLink" class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a id="contactLink" class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a id="LogoutLink" class="nav-link d-none" aria-current="page" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>    
        </nav>
        <div class="page-nav">
            <div class="container">
                <div class="collapse navbar-collapse w-100 mt-2  justify-content-end d-lg-none" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <form class="collapse-form position-relative ">
                            <input class="form-control" type="text" placeholder="Search For Products..." required>
                        </form>
                        <li class="nav-item">
                            <a id="homeLink" class="nav-link " aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="SuperLink" class="nav-link" href="#">Super Deals <i class="fas fa-angle-down"></i></a>
                            <ul class="custom_list list-unstyled shadow ">
                                <li><a href="#">All Categories</a></li>
                                <li><a href="#">Computers</a></li>
                                <li><a href="#">Laptops</a></li>
                                <li><a href="#">Cameras</a></li>
                                <li><a href="#">Hardware</a></li>
                                <li><a href="#">Smartphones</a></li>
                            </ul>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="SuperLink" class="nav-link" href="index.php#deals_featured">Super Deals</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="FeaturedLink" class="nav-link" href="index.php#New_Arrival">New Arrival</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="PagesLink" class="nav-link" href="#">Pages <i class="fas fa-angle-down"></i></a>
                            <ul class="custom_list list-unstyled shadow ">
                                <li><a href="shop.php">Shop</a></li>
                                <li><a href="product.php">Product</a></li>
                                <li><a href="blog.php">Blog</a></li>
                                <li><a href="cart.php">Cart</a></li>
                                <li><a href="contact.php">Contact</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a id="blogLink" class="nav-link" href="blog.php">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a id="contactLink" class="nav-link" href="contact.php">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a id="LogoutLink" class="nav-link d-none " aria-current="page" href="#">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Main-Nav -->
    </header>
    <!-- End header -->

    <!-- Start contact_info -->
    <section id = "contact_info" class="py-5">
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-md-10 ">
                    <div class="row g-4">
                        <div class="col-lg-4">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center p-3 ">
                                <div class="image">
                                    <img  src="img/characteristics/call.webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block">Phone</strong>
                                    <small>01029096569</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center  p-3">
                                <div class="image">
                                    <img  src="img/characteristics/message.webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block">Email</strong>
                                    <small>omarmokhtar363@gmail.com</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center  p-3 ">
                                <div class="image">
                                    <img  src="img/characteristics/location.webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block">Address</strong>
                                    <small>10 Suffolk at Soho, London, UK</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- End contact_info -->

    <!-- Start Form -->
    <section id="Form" class="py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-12">
                    <div id="ContactUs">
                        <h2 class="mb-5">Get in Touch</h2>
                        <form id="form" method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                            <div class="row g-4 mb-3">
                                <div class="col-md-4">
                                    <input id="userName" type="text" value = "<?php if(isset($name)){ echo $name;} ?>" name="userName" class="<?php echo $name_error;?> form-control" placeholder="Name">
                                    <p class=" mt-2 d-none text-danger" id="userNameReq">name is required.</p>
                                </div>
                                <div class="col-md-4">
                                    <input id="userEmail" type="email" value = "<?php if(isset($email)){ echo $email;} ?>" name="userEmail" class="<?php echo $email_error;?> form-control" placeholder="Email">
                                    <p class=" mt-2 d-none text-danger" id="userEmailReq">Email is required.</p>
                                </div>
                                <div class="col-md-4">
                                    <input id="userPhone" type="number" value = "<?php if(isset($phone)){ echo $phone;} ?>" name="userPhone" class="<?php echo $phone_error;?> form-control" placeholder="Phone">
                                    <p class=" mt-2 d-none text-danger" id="userPhoneReq">Phone is required.</p>
                                </div>
                            </div>
                            <textarea id="message" class="<?php echo $message_error;?> form-control mb-3" name="userMessage" placeholder="Message"   cols="5" rows="5"><?php if(isset($msg)){ echo $msg;} ?></textarea>
                            <p class=" my-2 d-none text-danger" id="messageReq">Message is required.</p>

                            <button id="btnSubmit" type="submit" class="btn btn-info px-4 py-2 text-white fw-bold">Send Message</button>
                            <span id="success"  class="ms-3 mt-2 d-none text-success">Data Sent Successfuly</span>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Form -->

    <!-- Start Subscribe -->
    <section id="subscribe" class="py-5">
        <!-- Start Map -->
        <section id="map" class="pb-5">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
        </section>
        <!-- End Map -->
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="item d-flex justify-content-center">
                            <div class="img-sub me-4">
                                <img src="img/telegram.webp" alt="">
                            </div>
                            <div class="text-sub">
                                <h3 class="h5 fw-bold">Sign up for Newsletter</h3>
                                <p class="mb-0">...and receive %20 coupon for first shopping.</p>
                            </div>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-1">
                    <form id="subscrib_form">
                        <input id="userSubEmail" class="form-control" type="email" name="userSubEmail"  placeholder="Enter Your Email Adress">
                        <p class=" mt-2 d-none text-danger" id="userSubEmailReq">Email is invalid.</p>
                        <button id="btnSubEmail" class="btn text-white btn-info" type="submit" disabled>Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End Subscribe -->

    <!-- Start Footer -->
    <footer class="pt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-5">
                    <div class="item">
                        <div class="logo mb-4">
                            <a href="#">OneTech</a>
                        </div>
                        <div class="footer_title mb-2">Got Question? Call Us 24/7</div>
                        <div class="footer_phone mb-2">+38 068 005 3570</div>
                        <div class="footer_email mb-2">omarmokhtar363@gmail.com</div>
                        <div class="footer_contact_text mb-3">17 Princess Road, London Grester London NW18JR, UK</div>
                        <div class="footer_social d-flex">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 offset-md-1">
                    <div class="item">
                        <h3 class="h6 mb-3">Find it Fast</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Car Electronics</a></li>
                            <li><a href="#">Video Games & Consoles</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="item">
                        <h3 class="h6 mb-3">Customer Care</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Order Tracking</a></li>
                            <li><a href="#">Wish List</a></li>
                            <li><a href="#">Customer Services</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <!-- Start Copyright  -->
    <div class="copyright py-3">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-8">
                    <p class="mb-0">Copyright &copy;2021 All rights reserved | This template is made by <a class="triple" href="#">Triple-O</a> </p>
                </div>
                <div class="col-md-4">
                    <div class="pay ">
                        <ul class="list-unstyled d-flex justify-content-md-end mb-0 ">
                            <li><a href="#" class="me-3"><img src="img/footer/footer1.webp" alt=""></a></li>
                            <li><a href="#" class="me-3"><img src="img/footer/footer2.webp" alt=""></a></li>
                            <li><a href="#" class="me-3"><img src="img/footer/footer3.webp" alt=""></a></li>
                            <li><a href="#" ><img src="img/footer/footer4.webp" alt=""></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright  -->


    <?php 
require './includes/template/footer.php';
?>