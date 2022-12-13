<?php
session_start();
ob_start(); 
$style = "shop.css";
$script="main.js";
$boot = "true";
$d_none = "d-none";
include 'init.php';
$rand_1data=getRandData('products',1);
$products=getAllData("products");
$categories=getAllData("categories");
$item_brand=getData_with_id('brands',$rand_1data[0]['brand_id']);
$best_rate= getHighRate();
$rand_3data=getRandData('products',3);
//=======
//d46dab88e185a9666cde14f448b579a36d8f84d0
//=======
$categories=getAllData("categories");
if(isset($_SESSION['type'])){
    if( $_SESSION["type"] == "2"){
        $cart = get_cart_data($_SESSION["user_id"]);
        $cart_total_price = 0;
    }
}
//0a846163a83742d4f3d4443f9958e46f29df59c4
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
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light">
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

    <!-- Start Banner -->
    <section id = "banner" class="py-5">
        <div class="container">
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-md-6">
                    <div class="info ">
                        <h1>NEW ERA OF SMARTPHONES</h1>
                        <div class="mt-5">
                            <span class="text-decoration-line-through me-3 fs-3 fw-bold">$530</span>
                            <span class="text-danger fs-3 fw-bold">$460</span>
                        </div>
                        <strong class="d-block mb-4">Apple Iphone 6s</strong>
                        <a href="#" type="button" role="button" class="btn px-4 py-2 text-white fw-bold">Shop Now</a>
                    </div>
                </div>

                <div class="col-md-6">
                    <img class="w-100" src="img/xbanner_product.png.pagespeed.ic.8YoeI51pih.webp" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner -->

    <!-- UpButton -->
    <a id="btnUp" role="button" class="btn bg-primary  p-2 text-white" ><i class="fas fa-angle-up fs-5"></i> </a>

    </header>
    <!-- End Header -->

    <!-- Start characteristics -->
    <section id = "characteristics" class="py-5">
        <div class="container ">
            <div class="row justify-content-center">
                <div class="col-md-12 ">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center p-3 ">
                                <div class="image">
                                    <img  src="img/characteristics/download.webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block"> Delivery</strong>
                                    <small>from $50</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center  p-3">
                                <div class="image">
                                    <img  src="img/characteristics/download (1).webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block">Return</strong>
                                    <small>in 24 hours</small>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center  p-3 ">
                                <div class="image">
                                    <img  src="img/characteristics/download (2).webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block">Cash back</strong>
                                    <small>in 24 hours</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="item d-flex justify-content-lg-center justify-content-start align-items-center  p-3 ">
                                <div class="image">
                                    <img  src="img/characteristics/download (3).webp" alt="">
                                </div>
                                <div class="text ps-3">
                                    <strong class="d-block">offers</strong>
                                    <small> 50%</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End characteristics -->

    <!-- Start Deals Featured -->
    <section id="deals_featured" >
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="Deals_of_the_Week">
                        <h5>Deals of the Week</h5>
                        <div class="content  position-relative Deals_of_the_Week_Owl">
                            <?php 
                            $onSale=getSaleItems('products');
                            foreach($onSale as $data){
                            ?>
                            <div class="one px-2 position-relative">
                                <div class="position-absolute heart">
                                <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                                </div>
                                <div class="sell-offer bg-danger">-<?php echo $data['discount'] ?>%</div>    
                                <div class="image my-4">
                                    <img class="w-100" src="img/products/<?php echo $data['img']; ?>" alt="product_iamge">
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <small><?php $item_brand= getData_with_id('brands',$data['brand_id']);echo $item_brand['brand']; ?></small>
                                    <small class="text-decoration-line-through">$<?php echo $data['price']; ?></small>
                                </div>
                                <div class="d-flex justify-content-between align-items-center fw-bold fs-4 mb-3">
                                    <span><?php echo $data['product_name']?></span>
                                    <span class="text-danger">$<?php echo priceAfterDesc($data['price'],$data['discount']); ?></span>
                                </div>
                                <div>
                                    <div class="d-flex justify-content-between align-items-center mb-1">
                                        <small>Available: <strong><?php echo $data['quantity'] ?></strong></small>
                                        <!-- <small>Already Sold: <strong>28</strong></small> -->
                                    </div>
                                    <!-- <div class="progress mb-3">
                                        <div class="progress-bar w-25" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div> -->
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong class="d-block">Hurry Up</strong>
                                        <small>Offer ends in:</small>
                                    </div>
                                    <div id="countDown" class="d-flex justify-content-between align-items-center border border-dark border-2  rounded-2">
                                        <div class="hours m-1 text-center position-relative">
                                            <div id="hour" class="fw-bold fs-5 py-2">50</div>
                                            <small>Hours</small>
                                        </div>
                                        <div class="mins m-1 px-2 text-center position-relative border-start border-end border-dark">
                                            <div id="min" class="fw-bold fs-5 py-2">30</div>
                                            <small>Mins</small>
                                        </div>
                                        <div class="secs m-1 text-center position-relative">
                                            <div id="sec" class="fw-bold fs-5 py-2">01</div>
                                            <small>Secs</small>
                                        </div>
                                    
                                    </div>
                                    <div id="countDownEnd" class=" d-none">This Product not Available now.</div>
                                </div>
                            </div>
                            <?php } ?>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 ">
                    <ul class="featurd_list list-unstyled d-flex align-items-center justify-content-start  mb-0">
                        <li class="active" data-content =".featured" >Featured</li>
                        <li  data-content =".Onsale">On Sale</li>
                        <li  data-content =".Best_Rated">Best Rated</li>
                    </ul>
                    <hr>
            <div class="items-sections">
                <div class="row g-4 featured">
                <?php foreach($products as $product_data){ ?>

                <div  class="col-md-4 col-sm-4 col-6 ">
                    <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                        <a href="#">
        
                    <div class="image position-relative my-3">
                        <div class="position-absolute heart">
                             <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                        </div>
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
                        <a href="product.php?id=<?php echo $product_data["id"];?>" class="w-100 ui vertical animated button" tabindex="0">
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

                            
                        </div>

                        <div class="row g-4 Onsale">
                        <?php foreach($onSale as $product_data){ ?>

                        <div  class="col-md-4 col-sm-4 col-6 ">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                                    </div>
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
                                        <a href="product.php?id=<?php echo $product_data["id"];?>" class="w-100 ui vertical animated button" tabindex="0">
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
                        </div>

                        <div class="row g-4 Best_Rated">
                            <?php foreach($products as $product_data){ 
                            if($product_data['rate'] > 0){?>

                            

                            <div  class="col-md-4 col-sm-4 col-6 ">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                    <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                                    </div>
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
                                        <a href="product.php?id=<?php echo $product_data["id"];?>" class="w-100 ui vertical animated button" tabindex="0">
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
                        <?php }
                        continue;
                        } ?>
                        </div>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Deals Featured -->

    <!-- Start Category -->
    <section id="category" class="py-5">
        <div class="container">
            <div class="row g-4 align-items-center">
                <div class="col-lg-3">
                    <h2 class="mb-3">Popular Categories</h2>
                    <a href="#" class="btn btn-info text-white fw-bold py-2 px-3" role="button" type="button">Full Categories</a>
                </div>
                <div class="col-lg-8 offset-lg-1">
                    <div class="row g-4 align-items-center justify-content-center">
                        <div class="col p-3">
                            <div class="item text-center">
                                <img src="img/category/xpopular_1.png.pagespeed.ic.iakLDOhA7r.webp" alt="">
                                <p class="mb-0 mt-2">Smartphones & Tablets</p>
                            </div>
                        </div>

                        <div class="col p-3">
                            <div class="item text-center">
                                <img src="img/category/xpopular_2.png.pagespeed.ic.2dscQlBLuy.webp" alt="">
                                <p class="mb-0 mt-2">Computers & Laptops</p>
                            </div>
                        </div>

                        <div class="col p-3">
                            <div class="item text-center">
                                <img src="img/category/xpopular_3.png.pagespeed.ic.0uu5Dfk2Gh.webp" alt="">
                                <p class="mb-0 mt-2">Gadgets</p>
                            </div>
                        </div>

                        <div class="col p-3">
                            <div class="item text-center">
                                <img src="img/category/xpopular_4.png.pagespeed.ic.2oShzKU_RW.webp" alt="">
                                <p class="mb-0 mt-2">Video Games & Consoles</p>
                            </div>
                        </div>

                        <div class="col p-3">
                            <div class="item text-center">
                                <img src="img/category/xpopular_5.png.pagespeed.ic.N9JFcEegtU.webp" alt="">
                                <p class="mb-0 mt-2">Accessories</p>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Category -->

    <!-- Start Mac -->
    <section id="mac" class="py-5 bg-white">
        <div class="container owl-carousel ">
            <?php foreach($rand_3data as $data){ ?>
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-md-3">
                    <div class="item">
                        <div class="mb-5">
                            <span><?php $item_categ=getData_with_id('categories',$data['cat_id']);echo $item_categ['cat_name']; ?></span>
                            <h2 class="fw-bold"><?php echo $data['product_name'] ?></h2>
                            <p class=" overflow-heddin"><?php echo substr($data['description'],0,150)  ?><a href="product.php?id=<?php echo $data['id'] ?>"class="text-primary ms-2  ">More...</a></p>
                            <div style="margin: auto;" class="ui large star rating mt-3 mb-4" data-rating="<?php echo $data["rate"]; ?>" data-max-rating="5"></div>
                        </div>
                        <a role="button" type="button" class="btn  text-white fw-bold">Explore</a>
                    </div>
                </div>
                <div class="col-md-7 position-relative">
                                <div class="position-absolute heart">
                                    <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-4x py-3"></i></a>
                                </div>
                    <img class="w-50 m-auto" src="img/products/<?php echo $data['img'] ?>" alt=""> 
                </div>
            </div>
            <?php } ?>

        </div>
    </section>
    <!-- End Mac -->

    <!-- Start Hot New Arrival -->
    <section id="New_Arrival" class="py-5">
        <div class="container">
            <div class="seller-head d-flex justify-content-between align-items-center">
                <h2 class="mb-0">Always Be Happy</h2>
                <ul class="featurd_list1 list-unstyled d-flex align-items-center justify-content-start  mb-0">
                    <li class="active" data-content =".featured" >Mobiles</li>
                    <li  data-content =".Onsale">Audio & Video</li>
                    <li  data-content =".Best_Rated">Laptops & Computers</li>
                </ul>
            </div>
            <hr>
            <div class="items-sections">
                <div class="row g-4 featured">
                    <div class="col-lg-12 ">
                        <div class="items">
                            <div class="row g-4 justify-content-center">
                                <?php foreach($products as $product_data){if( !empty($products)){
                                $cat = getData_with_id("categories",$product_data["cat_id"]);
                                if($cat['cat_name'] == 'mobiles'){    
                                ?>
                                    
                        <div  class="col-md-3 col-sm-3 shadow-none border-0 col-6 ">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                                    </div>
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
                                        <a href="product.php?id=<?php echo $product_data["id"];?>" class="w-100 ui vertical animated button" tabindex="0">
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
                        <?php }}else{
                             echo "
                             <div class='bg-info text-dark fs-3 px-3 py-5  rounded-2 text-center'>There is No Products in This Category To Show.</div>
                             ";
                            break;
                        }} ?>
                                
                            </div>
                        </div>
                    </div>
                    
                          
                </div>
    
                <div class="row g-4 Onsale ">
                <div class="col-lg-12 ">
                        <div class="items">
                            <div class="row g-4 justify-content-center">
                                <?php foreach($products as $product_data){ 
                                if( !empty($products)){
                                $cat = getData_with_id("categories",$product_data["cat_id"]);    
                                if($cat['cat_name'] == 'TV & Audio'){ ?>

                        <div  class=" shadow-none col-md-3 col-sm-3 col-6 border-0">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                                    </div>
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
                                        <a href="product.php?id=<?php echo $product_data["id"];?>" class="w-100 ui vertical animated button" tabindex="0">
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
                        <?php }}else{
                             echo "
                             <div class='bg-info text-dark fs-3 px-3 py-5  rounded-2 text-center'>There is No Products in This Category To Show.</div>
                             ";
                            break;
                        }} ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
    
                <div class="row g-4 Best_Rated ">
                <div class="col-lg-12 ">
                        <div class="items">
                            <div class="row g-4 justify-content-center">
                                <?php foreach($products as $product_data){ 
                                if( !empty($products)){
                                $cat = getData_with_id("categories",$product_data["cat_id"]);    
                                if($cat['cat_name'] == 'Computers & Laptops'){ ?>

                        <div class="shadow-none col-md-3 col-sm-3 col-6 border-0">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-2x"></i></a>
                                    </div>
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
                                        <a href="product.php?id=<?php echo $product_data["id"];?>" class="w-100 ui vertical animated button" tabindex="0">
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
                        <?php }}else{
                             echo "
                             <div class='bg-info text-dark fs-3 px-3 py-5  rounded-2 text-center'>There is No Products in This Category To Show.</div>
                             ";
                            break;
                        }} ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                </div>
            </div>
        </div>
    </section>
    <!-- End Hot New Arrival -->
    
    <!-- Start Best-Seller -->
   
    <!-- End Best-Seller -->

    <!-- Start Trending -->
    <section id="trending" class="py-5">
        <div class="container">
            <div class="row g-4">

                <div class="col-lg-4">
                    <div class="item shadow">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-8">
                                <h3 class="h5">Trends 2018</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                            </div>
                            <div class="col-4">
                                <img class="w-100" src="img/trending/xadv_1.png.pagespeed.ic.ecBWb3SJqG.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="item shadow">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-8">
                                <h3 class="h5">Trends 2018</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                            </div>
                            <div class="col-4">
                                <img class="w-100" src="img/trending/xadv_2.png.pagespeed.ic.JgJKs9KYy_.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="item shadow">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-8">
                                <h3 class="h5">Trends 2018</h3>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing Donec et.</p>
                            </div>
                            <div class="col-4">
                                <img class="w-100" src="img/trending/xadv_3.png.pagespeed.ic.8YIssqGZh0.webp" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Trending -->

    <!-- Start Trends -->
    <!-- <section id="trends" class="py-5 ">
        <div class="overlay"></div>
        <div class="container position-relative">
            <h2 class=" mb-3  fw-bold">Trends in 2021</h2>
            <hr>
            <div class="row g-4 ">
                <div class="content trends">
                    <div class="col-md-3">
                        <div class="item p-3">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                    <li><i class="fas fa-heart"></i></li>
                                </ul>
                            </div>
                            <img  src="img/trending/xview_2.jpg.pagespeed.ic.C2lAFOmOFR.webp" alt="">
                            <div class="info mt-4">
                                <span>Smartphone</span>
                                <div class="price d-flex justify-content-between align-items-center">
                                    <span>Jump White</span>
                                    <span>$379</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item p-3">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                    <li><i class="fas fa-heart"></i></li>
                                </ul>
                            </div>
                            <img  src="img/trending/xtrends_2.jpg.pagespeed.ic.qX9onP8wVn.webp" alt="">
                            <div class="info mt-4">
                                <span>Smartphone</span>
                                <div class="price d-flex justify-content-between align-items-center">
                                    <span>Jump White</span>
                                    <span>$379</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item p-3">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                    <li><i class="fas fa-heart"></i></li>
                                </ul>
                            </div>
                            <img  src="img/trending/xview_4.jpg.pagespeed.ic.gcfPB3V9Wh.webp" alt="">
                            <div class="info mt-4">
                                <span>Smartphone</span>
                                <div class="price d-flex justify-content-between align-items-center">
                                    <span>Jump White</span>
                                    <span>$379</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item p-3">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                    <li><i class="fas fa-heart"></i></li>
                                </ul>
                            </div>
                            <img   src="img/trending/xview_3.jpg.pagespeed.ic.HLpVYh24-I.webp" alt="">
                            <div class="info mt-4">
                                <span>Smartphone</span>
                                <div class="price d-flex justify-content-between align-items-center">
                                    <span>Jump White</span>
                                    <span>$379</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="item p-3">
                            <div class="new-fav ">
                                <ul class="list-unstyled d-flex justify-content-between align-items-center">
                                    <li>new</li>
                                    <li><i class="fas fa-heart"></i></li>
                                </ul>
                            </div>
                            <img   src="img/trending/xview_1.jpg.pagespeed.ic.c7PizLSOMV.webp" alt="">
                            <div class="info mt-4">
                                <span>Smartphone</span>
                                <div class="price d-flex justify-content-between align-items-center">
                                    <span>Jump White</span>
                                    <span>$379</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>       
            </div>
        </div>
    </section> -->
    <!-- End Trends -->

    <!-- Start Latest_Reviews -->
    <section id="Latest_Reviews" class="py-5">
        <div class="container">
            <h2 class="h3 mb-3  fw-bold text-end">Latest Reviews</h2>
            <hr>
            <div class="row g-4 position-relative Latest_Reviews_owl">
                
                <div class="col">
                    <div class="item p-3 text-center">
                        <img  src="img/recently-viewed/xview_4.jpg.pagespeed.ic.gcfPB3V9Wh.webp" alt="">
                        <div class="info mt-3 ">
                            <h3 class="h6 fw-bold">Huawei MediaPad</h3>
                            <div class="stars d-flex justify-content-center align-items-center mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">2 days ago</span>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque excepturi consectetur ducimus.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="item p-3 text-center ">
                        <img  src="img/recently-viewed/xview_3.jpg.pagespeed.ic.HLpVYh24-I.webp" alt="">
                        <div class="info mt-3">
                            <h3 class="h6 fw-bold">Samsung J730F</h3>
                            <div class="stars d-flex justify-content-center align-items-center mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">2 days ago</span>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque excepturi consectetur ducimus.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="item p-3  text-center">
                        <img  src="img/recently-viewed/xview_2.jpg.pagespeed.ic.C2lAFOmOFR.webp" alt="">
                        <div class="info mt-3">
                            <h3 class="h6 fw-bold">LUNA Smartphone</h3>
                            <div class="stars d-flex justify-content-center align-items-center mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">2 days ago</span>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque excepturi consectetur ducimus.</p>
                        </div>
                    </div>
                </div>
                
                <div class="col">
                    <div class="item p-3  text-center">
                        <img  src="img/recently-viewed/xview_5.jpg.pagespeed.ic.LXZD3f2D0h.webp" alt="">
                        <div class="info mt-3">
                            <h3 class="h6 fw-bold">Sony PS4 Slim</h3>
                            <div class="stars d-flex justify-content-center align-items-center mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">2 days ago</span>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque excepturi consectetur ducimus.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="item p-3  text-center">
                        <img  src="img/recently-viewed/xview_6.jpg.pagespeed.ic.A0_NjsZwto.webp" alt="">
                        <div class="info mt-3">
                            <h3 class="h6 fw-bold">Speedlink</h3>
                            <div class="stars d-flex justify-content-center align-items-center mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">2 days ago</span>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque excepturi consectetur ducimus.</p>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="item p-3  text-center">
                        <img  src="img/recently-viewed/xview_1.jpg.pagespeed.ic.c7PizLSOMV.webp" alt="">
                        <div class="info mt-3">
                            <h3 class="h6 fw-bold">Beoplay H4</h3>
                            <div class="stars d-flex justify-content-center align-items-center mb-2">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <span class="ms-2">2 days ago</span>
                            </div>
                            <p class="mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque excepturi consectetur ducimus.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Recently Viewed -->
    
    <!-- Start Recently Viewed -->
    <section id="recently_viewed" class="py-5">
        <div class="container">
            <h2 class="h3 mb-3  fw-bold">Smartphones & Tablets & Accessories</h2>
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
?>