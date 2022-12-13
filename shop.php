<?php
session_start();
ob_start(); 
// echo str_replace("-"," ",$_GET["category"]);
$boot = "true";
$script="shop.js";
$style = "shop.css";
include 'init.php';
$products=getAllData("products");
$categories=getAllData("categories");
if(isset($_SESSION['type'])){
    if( $_SESSION["type"] == "2"){
        $cart = get_cart_data($_SESSION["user_id"]);
        $cart_total_price = 0;
    }
}
// $aaa = "asd asd  & sad asd  ";
// echo preg_replace("/\s+/","-",$aaa);
// echo str_replace("-"," ",preg_replace("/\s+/","-",$aaa));
// echo str_replace(" ","-",$aaa);
?>

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
                            <a id="SuperLink" class="nav-link" href="#deals_featured">Super Deals</a>
                        </li>
                        <li class="nav-item position-relative">
                            <a id="FeaturedLink" class="nav-link" href="#New_Arrival">New Arrival</a>
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

    <!-- Start Home-Background -->
    <section id="home_background">
        <div class="overlay"></div>
        <div class="container position-relative">
            <div class="row">
                <h1>Smartphones & Tablets</h1>
            </div>
        </div>
    </section>
    <!-- End Home-Background -->

    <!-- Start Shop -->
    <section id="shop" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop_sidebar">
                        <div class="sidebar_category mb-3">
                            <h3 class="h5 mb-4 fw-bold">Categories</h3>
                            <ul class="list-unstyled">
                            <?php foreach($categories as $categor){?>
                                <li><a href="shop.php?category=<?php echo preg_replace("/\s+/","-",$categor["cat_name"]);?>"><?php echo $categor["cat_name"];?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                        <div class="sidebar_filtter">
                            <h3 class="h5 mb-4 fw-bold">Filtter By</h3>
                            <div class="price mb-3">
                                <strong>Price</strong>
                                <input class="d-block my-2" type="range"class="form-range" min="0" max="5" step="0.5">
                                <small>Range : $0 - $580</small>
                            </div>

                            <div class="brands">
                                <strong>Brands</strong>
                                <ul class="list-unstyled">
                                    <li><a href="#">Apple</a></li>
                                    <li><a href="#">Beoplay</a></li>
                                    <li><a href="#">Google</a></li>
                                    <li><a href="#">Meizu</a></li>
                                    <li><a href="#">OnePlus</a></li>
                                    <li><a href="#">Samsung</a></li>
                                    <li><a href="#">Sony</a></li>
                                    <li><a href="#">Xiaomi</a></li>
                                </ul>
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop_bar d-flex justify-content-between align-items-sm-center flex-sm-row flex-column">
                        <div class="shop_product_count mb-sm-0 mb-2">
                            <span class="text-info me-1">186</span>
                            products found
                        </div>
                        <div class="shop_sorting position-relative d-flex">
                            <span>sort by :</span>
                            <ul class="shop_sorting_list list-unstyled mb-0">
                                <li><span class="mx-2">highest rated</span><i class="fas fa-angle-down"></i></li>
                                <ul class="custom_list list-unstyled shadow mb-0">
                                    <li><a href="#">highest rated</a></li>
                                    <li><a href="#">name</a></li>
                                    <li><a href="#">price</a></li>
                                </ul>
                            </ul>
                        </div>
                    </div>
                    <hr>
                    <div class="items">
                        <div class="row g-4 highrest_rate">
                            
                        <?php foreach($products as $product_data){ ?>

                            <div class="col-md-4 col-sm-4 col-6">
                                <div class="item">
                                    <a href="#">
                                    
                                        <div class="image position-relative my-3">
                                            <img  src="img/products/<?php echo $product_data["img"]; ?>" alt="img">
                                            <?php
                                                $date = explode(" " , $product_data["time"]);
                                                $now = time(); // or your date as well
                                                $your_date = strtotime($date[0]);
                                                $datediff = $now - $your_date;
                                                $final_date = round($datediff / (60 * 60 * 24))-1;
                                                    if($product_data["discount"]!="0"){?>
                                                            <div class="sell-offer bg-danger"><?php echo "-" . $product_data["discount"] . "%"; ?></div>
                                                        <?php }else{

                                                        if($final_date >= 0 && $final_date <= 7){?>
                                                            <div class="sell-offer">New</div>
                                                    <?php }
                                                } ?>
                                        </div>
                                    
                                    <div class="img-info text-center">
                                        <span><?php
                                        if($product_data["discount"]!="0"){?>
                                            <span class="text-danger"><?php 
                                            $dis = intval(@$product_data["price"])-(intval(@$product_data["price"])*(intval(@$product_data["discount"])/100)); ?></span>
                                            <span class="offer text-secondary text-decoration-line-through" >$<?php echo $product_data["price"];?></span>
                                            <span class="text-danger"><?php 
                                                // $final_price = intval($product_data["price"])-$dis;
                                                echo "$" . $dis;
                                            ?></span>
                                        <?php }else{
                                            echo "$" . $product_data["price"];
                                        } ?></span>
                                        <div class="price d-flex justify-content-between flex-column">
                                            <small class="me-2 "><?php
                                                $cat = getData_with_id("categories",$product_data["cat_id"]);
                                             echo $cat["cat_name"] ?></small>
                                            <a class="pro_name mb-2"><?php echo $product_data["product_name"]; ?></a>
                                            <div style="margin: auto;" class="ui large star rating mt-3 mb-4" data-rating="<?php echo $product_data["rate"]; ?>" data-max-rating="5"></div>
                                            <a href="product.php?id=<?php echo $product_data["id"];?>" class="ui vertical animated button" tabindex="0">
                                            <div class="hidden content">Shop Now</div>
                                            <div class="visible content">
                                                <i class="shop icon"></i>
                                            </div>
                                            </a>
                                        </div>
                                    </div>
                                </a>
                                </div>
                                
                            </div>

                        <?php } ?>


                            <nav >
                                <ul class="pagination justify-content-center mb-0 mt-3">
                                    <li class="page-item disabled">
                                        <a class="page-link">Previous</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                                    <li class="page-item active" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                                    <li class="page-item">
                                        <a class="page-link" href="#">Next</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Shop -->

    <!-- Start Recently Viewed -->
    <section id="recently_viewed" class="py-5">
        <div class="container">
            <h2 class="h3 mb-3  fw-bold">Recently Added</h2>
            <hr>
            <div class="row g-4">
                <div class="content recently_viewed_owl position-relative">

                    <div class="col">
                        <div class="item p-3 ">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                </ul>
                            </div>
                            <img  src="img/recently-viewed/xview_4.jpg.pagespeed.ic.gcfPB3V9Wh.webp" alt="">
                            <div class="info mt-4">
                                <div class="price d-flex justify-content-center flex-column align-items-center">
                                    <span>$379</span>
                                    <a href="#">Huawei MediaPad</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item p-3 ">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li class="bg-danger">-25%</li>
                                </ul>
                            </div>
                            <img  src="img/recently-viewed/xview_3.jpg.pagespeed.ic.HLpVYh24-I.webp" alt="">
                            <div class="info mt-4">
                                <div class="price d-flex justify-content-center flex-column align-items-center">
                                    <div>
                                        <span class="text-danger">$250</span>
                                        <span class="offer text-secondary text-decoration-line-through" >$300</span>
                                    </div>
                                    <a href="#">Samsung J730F</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item p-3 ">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                </ul>
                            </div>
                            <img  src="img/recently-viewed/xview_2.jpg.pagespeed.ic.C2lAFOmOFR.webp" alt="">
                            <div class="info mt-4">
                                <div class="price d-flex justify-content-center flex-column align-items-center">
                                    <span>$379</span>
                                    <a href="#">LUNA Smartphone</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item p-3 ">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li class="bg-danger">-25%</li>
                                </ul>
                            </div>
                            <img  src="img/recently-viewed/xview_1.jpg.pagespeed.ic.c7PizLSOMV.webp" alt="">
                            <div class="info mt-4">
                                <div class="price d-flex justify-content-center flex-column align-items-center">
                                    <div>
                                        <span class="text-danger">$225</span>
                                        <span class="offer text-secondary text-decoration-line-through" >$300</span>
                                    </div>
                                    <a href="#">Beoplay H4</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item p-3 ">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                </ul>
                            </div>
                            <img  src="img/recently-viewed/xview_6.jpg.pagespeed.ic.A0_NjsZwto.webp" alt="">
                            <div class="info mt-4">
                                <div class="price d-flex justify-content-center flex-column align-items-center">
                                    <span>$375</span>
                                    <a href="#">Speedlink</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="item p-3 ">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li class="bg-danger">-25%</li>
                                </ul>
                            </div>
                            <img  src="img/recently-viewed/xview_5.jpg.pagespeed.ic.LXZD3f2D0h.webp" alt="">
                            <div class="info mt-4">
                                <div class="price d-flex justify-content-center flex-column align-items-center">
                                    <div>
                                        <span class="text-danger">$225</span>
                                        <span class="offer text-secondary text-decoration-line-through" >$300</span>
                                    </div>
                                    <a href="#">Sony PS4 Slim</a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- End Recently Viewed -->

    <!-- Start Brand -->
    <section id="brand" class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brand-content  brand-owl  ">
                        <img src="img/brand/xbrands_1.jpg.pagespeed.ic.1nM7wgM6yq.webp" alt="">
                        <img src="img/brand/xbrands_2.jpg.pagespeed.ic.aGWd17n_6c.webp" alt="">
                        <img src="img/brand/xbrands_3.jpg.pagespeed.ic.qRuw2zePgn.webp" alt="">
                        <img src="img/brand/xbrands_4.jpg.pagespeed.ic.XORj7-7yxR.webp" alt="">
                        <img src="img/brand/xbrands_5.jpg.pagespeed.ic.ugJTUVZ99O.webp" alt="">
                        <img src="img/brand/xbrands_6.jpg.pagespeed.ic.YeinomSK6w.webp" alt="">
                        <img src="img/brand/xbrands_7.jpg.pagespeed.ic.CRMxw_h7rx.webp" alt="">
                        <img src="img/brand/xbrands_8.jpg.pagespeed.ic.kERsDDzwQK.webp" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Brand -->

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
    $now = time(); // or your date as well
    $your_date = strtotime("2021/12/15");
    $datediff = $now - $your_date;
    echo round($datediff / (60 * 60 * 24))-1;
require './includes/template/footer.php';
?>
