<?php
require_once "init.php";

/*
==========================
  insert new user
==========================
*/

function insert_user ($username,$email,$sup_hased,$gender){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username,email,password,gender,type) Value(:username,:email,:password,:gender,:type)");
    $stmt->execute(
    array(
        ":username"     => $username,
        ":email"    => $email,
        ":password" => $sup_hased,
        ":gender" => $gender,
        ":type" => 2,
    ));
    echo "
    <script>
        toastr.success('Great ,You Signed UP Successfully .')
    </script>";
    header("Refresh:3;url=login.php");
}


/*
==========================  
  check if user exist
==========================
*/

function check_user ( $email , $pass){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute(array($email));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    $count = $stmt->rowCount();
    if ($count){
        if( $rows['password'] == $pass ){
            $_SESSION['user_id']        = $rows['id'];
            $_SESSION['user_name']      = $rows['username'];
            $_SESSION['user_email']     = $rows['email'];
            $_SESSION['user_gender']    = $rows['gender'];
            $_SESSION['type']      = $rows['type'];
            $_SESSION['user_adress']    = $rows['adress'];
            
                echo "
                <script>
                    toastr.success('WELCOME BACK " . $_SESSION['user_name'] . "')
                </script>";
                if($rows['type'] == 2 ){
                header("Refresh:3;url=index.php");
                }elseif($rows['type'] == 1 || $rows['type'] == 3){
                    header("Refresh:3;url=admin_dash.php");
                }

            // }

        }
        else{
                echo "
                <script>
                    toastr.error('Sorry The Email or Password is incorrect......!')
                </script>";
        }   
    }
    else{

                echo "
                <script>
                    toastr.error('Sorry The Email or Password is incorrect......!')
                </script>";
        }
}



/*
==========================  
  insert new user
==========================
*/


function insert_admin ($username,$email,$sup_hased,$gender){
    global $con;
    $stmt = $con->prepare("INSERT INTO users(username,email,password,gender,type) Value(:username,:email,:password,:gender,:type)");
    $stmt->execute(
    array(
        ":username"     => $username,
        ":email"    => $email,
        ":password" => $sup_hased,
        ":gender" => $gender,
        ":type" => 1,
    ));
    echo "
    <script>
        toastr.success('Great ,Admin has added successfully  .')
    </script>";
    header("Refresh:3;url=all_admins.php");
}

/*
==========================  
  insert new product to cart
==========================
*/


function insert_to_cart ($product_id,$quantity,$user_id){
    global $con;
    $stmt = $con->prepare("INSERT INTO cart(product_id,product_quantity,user_id) Value(:product_id,:quantity,:user_id)");
    $stmt->execute(
    array(
        ":product_id"     => $product_id,
        ":quantity"    => $quantity,
        ":user_id" => $user_id,
    ));
    echo "
    <script>
        toastr.success('Great ,Product added to Cart successfully  .')
    </script>";
    $loc = $_SERVER['HTTP_REFERER'];
    header("Refresh:3,url=$loc");
}

/*
==========================
  insert new Category
==========================
*/

function insert_cat ($cat_name){
    global $con;
    $stmt = $con->prepare("INSERT INTO categories(cat_name) Value(:cat_name)");
    $stmt->execute(
    array(
        ":cat_name"     => $cat_name,
    ));
    echo "
    <script>
        toastr.success('Great ,Category Added Successfully .')
    </script>";
    header("Refresh:3;url=all_category.php");
}

/*
==========================
  insert new brand
==========================
*/

function insert_brand ($brand_name){
    global $con;
    $stmt = $con->prepare("INSERT INTO brands(brand) Value(:brand)");
    $stmt->execute(
    array(
        ":brand"     => $brand_name,
    ));
    echo "
    <script>
        toastr.success('Great ,Brand Added Successfully .')
    </script>";
    header("Refresh:3;url=all_brands.php");
}

/*
==========================
  insert new Blog
==========================
*/

function insert_blog($adress,$desc,$avatar){
    global $con;
    $stmt = $con->prepare("INSERT INTO blog(adress,description,img,time) Value(:adress,:descr,:img,:time)");
    date_default_timezone_set('Africa/Cairo');
    $time = date("Y/m/d . H:i:s");
    $stmt->execute(
    array(
        ":adress"     => $adress,
        ":descr"     => $desc,
        ":img"     => $avatar,
        ":time"     => $time,
    ));
    echo "
    <script>
        toastr.success('Great ,Artical Added Successfully .')
    </script>";
    header("Refresh:3;url=all_artical.php");
}

/*
==========================
  insert new Message
==========================
*/

function addmsg($name,$email,$phone,$msg){
    global $con;
    $stmt=$con->prepare("INSERT INTO messages(name,email,phone,msg,time) Value(:name,:email,:phone,:msg,:time)");
    date_default_timezone_set('Africa/Cairo');
    $time = date("Y/m/d . H:i:s");
    $stmt->execute(array(
        ":name"=>$name,
        ":email"=>$email,
        ":phone"=>$phone,
        ":msg"=>$msg,
        ":time"=>$time
        ));
        echo "
        <script>
        toastr.success('Great , Your Message has been successfully Deliverd .')
        </script>";
}



/*
==========================
  insert new Product
==========================
*/

function insert_product($cat_id,$brand_id,$p_name,$price,$quantity,$discount,$desc,$avatar){
    global $con;
    $stmt = $con->prepare("INSERT INTO products(cat_id,brand_id,product_name,price,quantity,discount,description,img) Value(:cat_id,:brand_id,:product_name,:price,:quantity,:discount,:desc,:avatar)");
    $stmt->execute(
    array(
        ":cat_id"           => $cat_id,
        ":brand_id"         => $brand_id,
        ":product_name"     => $p_name,
        ":price"            => $price,
        ":quantity"         => $quantity,
        ":discount"         => $discount,
        ":desc"             => $desc,
        ":avatar"           => $avatar,
    ));
    echo "
    <script>
        toastr.success('Great ,The Product Added Successfully .')
    </script>";
    header("Refresh:3;url=all_Products.php");
}



/*
==========================
  insert new order
==========================
*/

function add_order ($user_id, $user_adress , $user_phone , $product_id , $price , $quantity ,$payment,$pay_state,$order_state){
    global $con;
    $stmt = $con->prepare("INSERT INTO orders(buyer_id,buyer_adress,buyer_phone,product_id,price,quantity,payment_method,payment_state,order_state) Value(:u_id,:u_adress,:u_phone,:medi_id,:medi_price,:medi_quan,:pay_method,:pay_state,:or_state)");
    $stmt->execute(
    array(
        ":u_id"     => $user_id,
        ":u_adress"     => $user_adress,
        ":u_phone"     => $user_phone,
        ":medi_id"     => $product_id,
        ":medi_price"     => $price,
        ":medi_quan"     => $quantity,
        ":pay_method"     => $payment,
        ":pay_state"     => $pay_state,
        ":or_state"     => $order_state,
    ));
    echo "
    <script>
        toastr.success('Great ,Order added successfully , Check Track order.')
    </script>";
    header("Refresh:3;url=cart.php");
}

/*
==========================
    get all data
==========================
*/

function getAllData($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================
  get all data with id
==========================
*/

function getData_with_id($table,$id){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table WHERE id = ?");
    $stmt->execute(array($id));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================
  get all admins with id
==========================
*/

function get_admins(){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE type = '1'");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}


/*
==========================
  get all Users with id
==========================
*/

function get_Users(){
    global $con;
    $stmt = $con->prepare("SELECT * FROM users WHERE type = '2'");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}




/*
==========================
  Update A User with id
==========================
*/


function update_user( $name,$email,$password,$gender,$adress,$id){
    global $con;
    $stmt = $con->prepare("UPDATE users SET username = ?, email = ?,password = ?, gender = ?,adress =? WHERE id =?");
    $stmt->execute(
    array(
        $name,
        $email,
        $password,
        $gender,
        $adress,
        $id
    ));
    echo "
    <script>
        toastr.success('Great , About US INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:1;url=all_admins.php");
}

/*
==========================
  Update A Category with id
==========================
*/

function update_category ($name,$id){
    global $con;
    $stmt = $con->prepare("UPDATE categories SET cat_name = ? WHERE id =?");
    $stmt->execute(
    array(
        $name,
        $id
    ));
    echo "
    <script>
        toastr.success('Great , Category INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:1;url=all_category.php");   
}

/*
==========================
  Update An Artical with id
==========================
*/

function update_blog($adress,$desc,$avatar,$time,$id){
    global $con;
    $stmt = $con->prepare("UPDATE blog SET adress = ?, description = ?,img = ?, time = ? WHERE id =?");
    $stmt->execute(
    array(
        $adress,
        $desc,
        $avatar,
        $time,
        $id
    ));
    echo "
    <script>
        toastr.success('Great , Artical INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:1;url=all_artical.php");

}


/*
==========================
  Update A Product with id
==========================
*/


function update_product($cat_id,$p_name,$price,$quantity,$discount,$avatar,$id){
    global $con;
    $stmt = $con->prepare("UPDATE products SET cat_id = ?, product_name = ?,price = ?, quantity = ?,img = ?, discount = ? WHERE id =?");
    $stmt->execute(
    array(
        $cat_id,
        $p_name,
        $price,
        $quantity,
        $avatar,
        $discount,
        $id
    ));
    echo "
    <script>
        toastr.success('Great , Product INFO has Been Successfully Update  .')
    </script>";
    header("Refresh:1;url=all_products.php");

}

/*
==========================
  Update order
==========================
*/


function update_order($id){
    global $con;
    $stmt = $con->prepare("UPDATE orders SET payment_state = 1 WHERE buyer_id =?");
    $stmt->execute(array($id));
    echo "
    <script>
        toastr.success('Great , order state has been updated , containu shopping  .')
    </script>";
    header("Refresh:1;url=shop.php");

}


/*
==========================
  get all admins with id
==========================
*/

// function get_admins_api(){
//     global $con;
//     $response = array();
//     $stmt = $con->prepare("SELECT * FROM users WHERE type = '1'");
//     $stmt->execute();
//     $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     if($rows){
//         header("Content-Type: JSON");
//         $i=0;
//         while($row = $stmt->fetchAll(PDO::FETCH_ASSOC)){
//             $response[$i]['id']=$row['id'];
//             $response[$i]['username']=$row['username'];
//             $response[$i]['email']=$row['email'];
//             $response[$i]['gender']=$row['gender'];
//             $i++;
//         }
//         echo json_encode($response,JSON_PRETTY_PRINT);
//     }
//     // return $rows;
// }






/*
==========================
  get_product
==========================
*/

function get_product($id){
    global $con;
    $stmt = $con->prepare("SELECT products.* , categories.cat_name AS category , brands.brand  AS brand
    FROM products 
    INNER JOIN categories
    ON categories.id = products.cat_id
    INNER JOIN brands
    ON brands.id= products.brand_id
    WHERE products.id = ?");
    $stmt->execute(array($id));
    $rows = $stmt->fetchAll();
    return $rows;
}
//<<<<<<< HEAD
/*
==========================
    get rand data with limit
==========================
*/

function getRandData($table,$limit){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table order by rand() limit $limit");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
/*
==========================
    get data with discount
==========================
*/

function getSaleItems($table){
    global $con;
    $stmt = $con->prepare("SELECT * FROM $table where discount != '0'");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
/*
==========================
    get the discount
==========================
*/
function priceAfterDesc($price,$disc){
    $rel_price=(int)$price;
    $rel_disc= (int)$disc;
    $disc_amount=$rel_price * $rel_disc;
    $disc_amount/=100;
    $after_disc=$rel_price - $disc_amount;
    return $after_disc; 
}
/*
==========================
    get product with high rate
==========================
*/
function getHighRate(){
    global $con;
    $stmt = $con->prepare("SELECT * FROM products WHERE rate = 3");
    $stmt->execute();
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}

/*
==========================
  get all Products with cat_id
==========================
*/

function getProduct_with_cat_id($cat_id){
    global $con;
    $stmt = $con->prepare("SELECT * FROM products WHERE cat_id = ?");
    $stmt->execute(array($cat_id));
    $rows = $stmt->fetch(PDO::FETCH_ASSOC);
    return $rows;
}
//=======


/*
==========================
  cart function
==========================
*/

function get_cart_data($id){
    global $con;
    $stmt = $con->prepare("SELECT cart.* , products.* , cart.id AS cart_id , users.* , users.id AS buyer_id
    FROM cart 
    INNER JOIN products
    ON products.id = cart.product_id
    INNER JOIN users
    ON users.id = cart.user_id
    WHERE cart.user_id = ?");
    $stmt->execute(array($id));
    $rows = $stmt->fetchAll();
    return $rows;
}


/*
==========================  
  count admins
==========================
*/

function count_items($colume,$databname,$id){
    global $con;
    $stmt = $con->prepare("SELECT COUNT($colume) From $databname WHERE user_id=?");
    $stmt->execute(array($id));
    $rows = $stmt->fetchColumn();
    return $rows;
}




  /*
==========================  
count Rows from Database By/ Amr Mohamed
==========================
*/

function count_users($colume,$databname){
    global $con;
    $stmt = $con->prepare("SELECT COUNT($colume) From $databname");
    $stmt->execute();
    $rows = $stmt->fetchColumn();
    return $rows;
}



/*
==========================  
  return data from order
==========================
*/

function order(){
    global $con;
    $stmt = $con->prepare("SELECT orders.*, products.product_name, products.price, users.username,users.email  
                           FROM orders 
                           JOIN products  on products.id = orders.product_id
                           JOIN users  on users.id = orders.buyer_id
                           WHERE order_state = '0'
                            ");
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $rows;
}
//>>>>>>> d46dab88e185a9666cde14f448b579a36d8f84d0
