<?php    
ob_start();
session_start();   
$style="updateMember.css";
include "init.php";
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
// if(isset($_SESSION['role'])){
require './layout/topNav.php';
$orders=getAllData("orders");
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
              <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">One Tech</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">All Orders</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
								Orders
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
                                            <th>ID</th>
                                            <th>buyer adress</th>            
                                            <th>buyer phone</th>            
                                            <th>Price</th>            
                                            <th>quantity</th>            
                                            <th>payment method</th>            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>buyer adress</th>   
                                                <th>buyer phone</th>   
                                                <th>Price</th>   
                                                <th>quantity</th>            
                                                <th>payment method</th>        
                                            </tr>            
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($orders as $orders_id){
                                            echo"<tr>";
                                                    echo "<td>". $orders_id['id'] . "</td>";
                                                    echo "<td>". $orders_id['buyer_adress'] . "</td>";
                                                    echo "<td>". $orders_id['buyer_phone'] . "</td>";
                                                    echo "<td>". $orders_id['price'] . "$" . "</td>";
                                                    echo "<td>". $orders_id['quantity'] . "</td>";                                           
                                                    echo "<td>". $orders_id['payment_method'] . "</td>";                                           
                                
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