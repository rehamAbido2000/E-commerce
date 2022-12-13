<?php 
ob_start();
session_start();
include 'init.php';
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){

if ($_GET['from'] == "admins" && isset($_GET['id']) && is_numeric($_GET['id'])){
    $admin_id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM users WHERE id = :admin_id");
    $stmt->bindParam(":admin_id" , $admin_id);
    $stmt->execute();
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}else if($_GET['from'] == "cat" && isset($_GET['id']) && is_numeric($_GET['id'])){
    $cat_id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM categories WHERE id = :cat_id");
    $stmt->bindParam(":cat_id" , $cat_id);
    $stmt->execute();
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
else if($_GET['from'] == "produucts" && isset($_GET['id']) && is_numeric($_GET['id'])){
    $peoduct_id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM products WHERE id = :peoduct_id");
    $stmt->bindParam(":peoduct_id" , $peoduct_id);
    $stmt->execute();
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
else if($_GET['from'] == "blog" && isset($_GET['id']) && is_numeric($_GET['id'])){
    $blog_id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM blog WHERE id = :blog_id");
    $stmt->bindParam(":blog_id" , $blog_id);
    $stmt->execute();
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
else if($_GET['from'] == "brand" && isset($_GET['id']) && is_numeric($_GET['id'])){
    $brand_id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM brands WHERE id = :brand_id");
    $stmt->bindParam(":brand_id" , $brand_id);
    $stmt->execute();
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
else if($_GET['from'] == "cart" && isset($_GET['id']) && is_numeric($_GET['id'])){
    $cart_id = $_GET['id'];
    $stmt = $con->prepare("DELETE FROM cart WHERE id = :cart_id");
    $stmt->bindParam(":cart_id" , $cart_id);
    $stmt->execute();
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
else{
    $loc = $_SERVER['HTTP_REFERER'];
    header("Location:$loc");
}
require_once "./includes/template/footer.php";

}else{
    header("Location:LogIn.php");
}

ob_end_flush();