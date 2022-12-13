<?php    
ob_start();
session_start();   
$style="updateMember.css";
include "init.php";
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
// if(isset($_SESSION['role'])){
require './layout/topNav.php';
$products=getAllData("products");
/*if(!isset($_SESSION['username'])){
echo "<div class='alert alert-danger'>you can not see this page id not exist</div>";
    header("refresh:5;url=index.html");
    exit();}*/?>
    <style>
        .columns {
            float: unset !important;
            display: block;
            margin:20px auto !important;

        }
    </style>
<div id="layoutSidenav">     
    <?php 
      require './layout/sidNav.php';
    ?> 
    <div id="layoutSidenav_content">
      <div class="container-fluid ">
        <div class="allContent">

          <div class="tableOfHosters table-responsive">
              <a href="add_products.php">  <button style="padding: 7px 25px;" type="button" name="add" class="btn btn-success ml-4 mt-5">Add  <i class='bx bxs-user-plus'></i></button></a>
              <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">One Tech</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">All Products</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                    Products
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div id="toolbar" class="select">
                                        <select style="display: none;" class="form-control">
                                        </select>
                                    </div>
                                    <table class="table table-bordered text-center" data-show-export="true"
                                    data-toolbar="#toolbar" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Category Name</th>            
                                            <th>Product Name</th>            
                                            <th>Product Price</th>            
                                            <th>Quantity</th>                      
                                            <th>Discount</th>            
                                            <th>Image</th>            
                                            <th>Edit</th>            
                                            <th>Delete</th>            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Category Name</th>            
                                            <th>Product Name</th>            
                                            <th>Product Price</th>            
                                            <th>Quantity</th>                      
                                            <th>Discount</th>            
                                            <th>Image</th>            
                                            <th>Edit</th>            
                                            <th>Delete</th>       
                                            </tr>            
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($products as $product_data){
                                               $category_name = getData_with_id("categories",$product_data["cat_id"]);
                                               
                                            echo"<tr>";
                                                    echo "<td>". $category_name['cat_name'] . "</td>";
                                                    echo "<td>". $product_data['product_name'] . "</td>";
                                                    echo "<td>". $product_data['price'] . " $" . "</td>";
                                                    echo "<td>". $product_data['quantity'] . " Item" . "</td>";
                                                    echo "<td>". $product_data['discount'] . " %" . "</td>";?>
                                                    <td>
                                                    <a href="img/products/<?php echo $product_data["img"]; ?>" download="<?php echo $product_data["img"]; ?>">
                                                            <img src="img/products/<?php echo $product_data["img"]; ?>" alt="product" width="104" height="142">
                                                            </a>
                                                    </td>

                                                    <?php


                                                    echo "<td>
                                                    <a href='update_product.php?id=".$product_data['id']."'
                                                    class='btn editbtn btn-primary m-2'><i class='bx bxs-edit m-1 '></i> Update</a> " . "</td>";
                                                    echo "<td>
                                                    <a href='delete.php?from=admin&id=".$product_data['id']."&from=produucts'
                                                    class='btn deletebtn btn-danger m-2'><i class='bx bxs-user-minus m-1'></i> Delete</a> " . "</td>";


                                            
                                
                                            echo "</tr>";?>
                                            </tr>
                                            <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>

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
ob_end_flush();