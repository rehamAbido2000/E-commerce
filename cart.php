<?php
session_start();
ob_start(); 
$boot = "true";
$script="main.js";
$style = "style.css";
include 'init.php';
if(isset($_SESSION['type'])){
    if($_SESSION["type"] == "2") {
$cart = get_cart_data($_SESSION["user_id"]);
$total = 0;
$cart_total_price = 0;
$all_orders = order();
        $z=0 ; $y=0;
         $z=0;$y=0; foreach ($all_orders as $data){
            $y =  $data["price"] * $data["quantity"] ;
                $z=$z+$y;
         }
         echo $z;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user_id                = FILTER_VAR( $_POST['user_id'], FILTER_SANITIZE_STRING);
    $user_adress            = FILTER_VAR( $_POST['user_adress'], FILTER_SANITIZE_STRING);
    $user_phone             = FILTER_VAR( $_POST['user_phone'], FILTER_SANITIZE_NUMBER_INT);
    $payment                = FILTER_VAR( $_POST['payment'], FILTER_SANITIZE_STRING);

    foreach($cart as $data){
        add_order ($user_id, $user_adress , $user_phone , $data["product_id"] , $data["price"] , $data["product_quantity"] ,$payment,"0","0");

        /*update cart table (ordered) to hide order button from cart*/
        global $con;
        $stmt = $con->prepare("DELETE FROM cart WHERE id = :cart_id");
        $stmt->bindParam(":cart_id" , $data["cart_id"]);
        $stmt->execute();
        
    }

    
    if($payment=="paypal"){
        $all_orders = order();
        $z=0 ; $y=0;
         $z=0;$y=0; foreach ($all_orders as $data){
            $y =  $data["price"] * $data["quantity"] ;
                $z=$z+$y;
         }
         echo $z;
        header("location: request.php?amount=".$z);
      }


}
?>
<style>
    .cart_list{
        text-align: center;
    }
    .modals.dimmer .ui.scrolling.modal{
        width: 100%;
        text-align: center;
        padding-top: 140px;
    }
    .modals.dimmer .ui.scrolling.modal .actions{
        text-align: center;
    }


</style>
    <!-- For Loading Screen -->
    <div class="loading d-flex justify-content-center align-items-center">
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
    </div>
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
                        <form style="z-index: 5;" id="Main_head_form" class=" m-auto position-relative d-none d-md-block">
                            <input class="form-control" type="text" placeholder="Search For Products..." required>
                           
                            <button class="btnSubmit" type="submit"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="col-md-3 cart_place">
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
                    </div>
    
                </div>
            </div>
        </section>
        <!-- End Main-header -->
    
        <!-- Start Main-Nav -->
        <nav id="main_nav" style="z-index: 5;" class="navbar navbar-expand-lg navbar-light ">
            <div class="container ">
                <div id="category-bar" class="d-flex justify-content-center align-items-center position-relative">
                    <span class="me-2"><i class="fas fa-bars bar-ico fs-5"></i></span>
                    <span class="fs-5 fw-bold text-uppercase" href="#">Categories</span>
                    <ul class="custom_list list-unstyled shadow ">
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

    <!-- Start Cart -->
    <section id="cart" class="py-5">
        <div class="container">
            
            <div class="row justify-content-center">
                <div class="col-lg-10 col-12">
                    <h2 class="mb-5">Shopping Cart</h2>
                    <div class="cart_items">
                        <?php foreach($cart as $cart_data){ ?>
                        <ul class="cart_list list-unstyled mb-3">
                                <li class="cart_item">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-lg-3">
                                            <div class="image text-lg-start text-center">
                                                <img style="width: 40%;" src="img/products/<?php echo $cart_data["img"]; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-lg-9">
                                            <div class="cart_info">
                                                <div class="row g-4 flex-sm-row flex-column ">
                                                    <div class="col">
                                                        <p>Name</p>
                                                        <p><?php echo $cart_data["product_name"]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>Order Date</p>
                                                        <p><?php $date = explode(" " , $cart_data["order_date"]);echo $date[0]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>Quantity</p>
                                                        <p><?php echo $cart_data["product_quantity"] ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>Price</p>
                                                        <p>$<?php echo $cart_data["price"]; ?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>Total</p>
                                                        <p>$<?php echo $cart_data["price"] * $cart_data["product_quantity"];?></p>
                                                    </div>
                                                    <div class="col">
                                                        <p>Delete</p>
                                                        <?php echo "<td>
                                                    <a href='delete.php?id=".$cart_data['cart_id']."&from=cart'
                                                    class='btn deletebtn btn-danger'>delete</i></a> " . "</td>";?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                                 
                            <?php $total = ($cart_data["price"] * $cart_data["product_quantity"])+$total;
                         } ?>
                    </div>
                    <div class="order_total my-3 ">
                        <p class="mb-0 text-end"><small>Order Total :</small> <Strong>$<?php echo $total; ?></Strong></p>
                    </div>
                    <button id="complete" class="BtnAddCart btn btn-info text-white fw-bold px-4 py-2">Complete Order</button>


                         <!-- sart model -->
                         <!-- Modal -->
                         <div class="ui basic modal">
                            <div style="display: block;width: 100%;text-align: center;"  class="ui icon header">
                                <i class="archive icon"></i>
                                Archive Old Messages
                            </div>
                            <div class="content">
                                <!-- <p>Your inbox is getting full, would you like us to enable automatic archiving of old messages?</p> -->
                                <div style="background-color: rgba(255,255,255,.1);border-radius: 10px;width: 40%;margin: auto;padding: 20px 20px;">
                                    <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                                        <input name="user_id" type="number" value="<?php echo $cart_data["buyer_id"]; ?>" hidden>
                                        <!--position--->
                                        <div class="row">
                                            <div class="col-md-6 mb-3 col-xs-12">
                                                <label for="">User Name</label>
                                                <input disabled style="direction: ltr;" value="<?php echo $cart_data["username"]; ?>" name="username" type="text" class="form-control w_ac1">
                                            </div>
                                            <div class="col-md-6 mb-3 col-xs-12">
                                                <label for="">Email</label>
                                                <input disabled style="direction: ltr;" value="<?php echo $cart_data["email"]; ?>" name="user_email" type="text" class="form-control w_ac1">
                                            </div>
                                            <div class="col-md-6 mb-3 col-xs-12">
                                                <label for="">Adress</label>
                                                <input style="direction: ltr;" require placeholder="Enter Your Adress" name="user_adress" type="text" class="form-control w_ac1">
                                            </div>
                                            <div class="col-md-6 mb-3 col-xs-12">
                                                <label for="">Phone</label>
                                                <input style="direction: ltr;" require placeholder="Enter Your Phone" name="user_phone" type="tel" class="form-control w_ac1">
                                            </div>
                                            <div class="p-3 col-md-12 mb-3 col-xs-12">
                                                <label for="payment">Payment Method</label>
                                                <select class="custom-select ui search dropdown"  name="payment" id="payment" required>
                                                <option selected disabled value="">Choose...</option>
                                                <option value="cash">Pay With Cash</option>
                                                <option value="paypal">Pay With Paypal</option>
                                            </select>
                                            </div>
                                            <div class="actions">
                                                <div class="ui red basic cancel inverted button">
                                                <i class="remove icon"></i>
                                                No
                                                </div>
                                                <button type="submit" class="ui green inverted button">
                                                <i class="checkmark icon"></i>
                                                Yes
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            </div>



                </div>
            </div>
        </div>
    </section>
    <!-- End Cart -->

    <!-- Start Subscribe -->
    <section id="subscribe" class="py-5">
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
                        }
                    }else{
                        header("Location:index.php");
                    }

?>