<?php    
ob_start();
session_start();   
$style="updateMember.css";
include "init.php";
if(isset($_SESSION['type']) && $_SESSION["type"] == "1"){
// if(isset($_SESSION['role'])){
require './layout/topNav.php';
$blogs=getAllData("blog");
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
              <a href="add_artical.php">  <button style="padding: 7px 25px;" type="button" name="add" class="btn btn-success ml-4 mt-5">Add  <i class='bx bxs-user-plus'></i></button></a>
              <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">One Tech</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item">Dashboard</li>
                            <li class="breadcrumb-item active">All Blogs</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Blogs
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
                                            <th>Artical Adress</th>
                                            <th>Description</th>            
                                            <th>Image</th>            
                                            <th>Time</th>            
                                            <th>Edit</th>            
                                            <th>Delete</th>            
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                            <th>Artical Adress</th>
                                            <th>Description</th>            
                                            <th>Image</th>            
                                            <th>Time</th>            
                                            <th>Edit</th>            
                                            <th>Delete</th>
                                            </tr>            
                                        </tfoot>
                                        <tbody>
                                           <?php foreach($blogs as $artical_data){
                                            echo"<tr>";
                                                    echo "<td>". $artical_data['adress'] . "</td>";
                                                    echo "<td>". $artical_data['description'] . "</td>";
                                                    ?>

                                                    <td>
                                                        <a href="img/products/<?php echo $artical_data["img"]; ?>" download="<?php echo $artical_data["img"]; ?>">
                                                            <img src="img/articals/<?php echo $artical_data["img"]; ?>" alt="product" width="104" height="142">
                                                        </a>
                                                    </td>

                                                    <?php 
                                                    echo "<td>". $artical_data['time'] . "</td>";
                                                    echo "<td>
                                                    <a href='update_artical.php?id=".$artical_data['id']."'
                                                    class='btn editbtn btn-primary m-2'><i class='bx bxs-edit m-1 '></i> Update</a> " . "</td>";
                                                    echo "<td>
                                                    <a href='delete.php?from=admin&id=".$artical_data['id']."&from=blog'
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