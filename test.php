<section id="best_seller" class="py-5">
        <div class="container">
            <div class="seller-head d-flex justify-content-between align-items-center">
                <h2 class="mb-0">We Are The Best</h2>
                <ul class="featurd_list2 list-unstyled d-flex align-items-center justify-content-start  mb-0">
                    <li class="active" data-content =".featured" >Cameras & Photos</li>
                    <li  data-content =".Onsale">Hardware</li>
                    <li  data-content =".Best_Rated">Smartphones & Tablets</li>
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
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-3x"></i></a>
                                    </div>
                                        <img class="px-5" src="img/products/<?php echo $product_data["img"]; ?>" alt="img">
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
                <div class="row g-4 Onsale">
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
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-3x"></i></a>
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
                <div class="row g-4 Best_Rated">
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
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-3x"></i></a>
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
    
                <!-- <div class="row g-4 Onsale ">
                <div class="col-lg-12 ">
                        <div class="items">
                            <div class="row g-4 justify-content-center">
                                <?php foreach($products as $product_data){ 
                                if( !empty($products)){
                                $cat = getData_with_id("categories",$product_data["cat_id"]);    
                                if($cat['cat_name'] == 'Hardware'){ ?>

                        <div  class=" shadow-none col-md-3 col-sm-3 col-6 border-0">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-3x"></i></a>
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
                                if($cat['cat_name'] == 'Smartphones & Tablets'){ ?>

                        <div class="shadow-none col-md-3 col-sm-3 col-6 border-0">
                            <div class="item pt-2 rounded"style="box-shadow:1px 1px 12px #999;">
                                <a href="#">
                                    <div class="image position-relative my-3">
                                    <div class="position-absolute heart">
                                        <a href="add_wish_list.php?id=<?php $product_data['id'] ?>"><i class="fal fa-heart fa-3x"></i></a>
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
                    
                    
                </div> -->
            </div>
        </div>
    </section>