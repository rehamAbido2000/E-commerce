<?php
session_start();
ob_start(); 
$boot = "true";
$script="main.js";
$style = "style.css";
include 'init.php';
$categories=getAllData("categories");
if(isset($_SESSION['type'])){
    if( $_SESSION["type"] == "2"){
        $cart = get_cart_data($_SESSION["user_id"]);
        $cart_total_price = 0;
    }
}

if(isset($_GET["id"])){
    $product_id = $_GET["id"];
    $product = get_product($product_id);
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(!isset($_SESSION["user_id"])){
            echo "
                <script>
                    toastr.error('Sorry Please Login First To Add This Product to Cart.')
                </script>";
        }else{
            if($_POST["quantity"]<= 0){
                echo "
                <script>
                    toastr.error('Sorry Quantity Must Be More Than or Equal 1.')
                </script>";
            }else{
                $product_id         = FILTER_VAR( $_POST['product_id'], FILTER_SANITIZE_NUMBER_INT);
                $user_id            = FILTER_VAR( $_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
                $quantity           = FILTER_VAR( $_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
                
                if($product[0]["quantity"] - $quantity >= "0"){
                    insert_to_cart ($product_id,$quantity,$user_id);
                }else{
                    echo "
                    <script>
                        toastr.error('Sorry Quantity of product not match.')
                    </script>";
                }
            }
        }
        


    }

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

    <!-- Start Product -->
    <section id="product" class="py-5">
        <div class="container">
            <div class="row g-4">
                <!-- <div class="col-lg-2 order-lg-1 order-2">
                    <ul class="image_list  list-unstyled ">
                        <li class=" px-3 py-2 mb-3 bg-white  d-flex justify-content-center align-items-center"><img class="w-100" src="img/product/xsingle_4.jpg.pagespeed.ic.RYqSzc3W5Q.webp" alt=""></li>
                        <li class=" px-3 py-2 mb-3 bg-white  d-flex justify-content-center align-items-center"><img class="w-100" src="img/product/download.webp" alt=""></li>
                        <li class=" px-3 py-2 bg-white  d-flex justify-content-center align-items-center"><img class="w-100" src="img/product/xsingle_3.jpg.pagespeed.ic.KBROPME1kC.webp" alt=""></li>
                    </ul>
                </div> -->
                <div class="col-md-5 order-md-2 order-1">
                    <div class="image px-3 py-3 mb-3 bg-white  d-flex justify-content-center align-items-center">
                        <img class="main_img" style="width: 75%;" src="img/products/<?php echo $product[0]["img"] ?>" alt="product">
                    </div>
                </div>
                <div class="col-md-7 order-3">
                    <div class="product_info">
                        <small><?php echo $product[0]["category"] ?></small>
                        <h1 class="my-2"><?php echo $product[0]["product_name"] ?></h1>
                        <!-- <div class="stars d-flex justify-content-start align-items-center mb-2">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                        </div> -->
                        <div style="margin: auto;" class="ui large star rating mt-3 mb-4" data-rating="<?php echo $product[0]["rate"]; ?>" data-max-rating="5"></div>
                        <p class="mb-3">
                            <?php echo $product[0]["description"]; ?>
                        </p>
                        <form method="POST" action="<?php $_SERVER['PHP_SELF'] ?>">
                        <input type="number" name="product_id" hidden value="<?php echo $product[0]["id"]; ?>">
                        <input type="number" name="user_id" hidden value="<?php echo $_SESSION["user_id"]; ?>">
                        <div class="d-flex mb-3 flex-wrap">
                            <div class="product_quantity me-3">
                                <span><strong>Quantity: </strong><input style="padding: 5px;border: 1px solid #ccc;border-radius: 10px;outline: none;width: 50px;text-align: center;" value="1" type="number" name="quantity" id="quantity"></span>
                            </div>
                            <div style="line-height: 27px;margin-left: 15px;" class="product_price"><strong>Price: </strong><?php echo "$".$product[0]["price"] ?></div>
                        </div>
                        
                        <div class="button_container">
                            <button id="shop_btn" type="submit" class="btn btn-info px-4 py-2 text-white fw-bold">Add To Cart</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Product -->

    <!-- Start Recently Viewed -->
    <section id="recently_viewed" class="py-5">
        <div class="container">
            <h2 class="h3 mb-3  fw-bold">Recently Viewed</h2>
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
require './includes/template/footer.php';
}else{
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
?>