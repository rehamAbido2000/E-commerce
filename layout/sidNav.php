<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link" href="<?php echo "admin_dash.php";?>">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">Content</div>
                            
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts9" aria-expanded="false" aria-controls="collapseLayouts9">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Admins
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts9" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo "add_admin.php";?>">Add Admin</a>
                                    <a class="nav-link" href="<?php echo "all_admins.php";?>">Edit / Delete Admin</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts4" aria-expanded="false" aria-controls="collapseLayouts4">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Category
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="background-color: unset!important;" class="collapse" id="collapseLayouts4" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo "add_category.php";?>">Add category</a>
                                    <a class="nav-link" href="<?php echo "all_category.php";?>">Edit / Delete category</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts_brand" aria-expanded="false" aria-controls="collapseLayouts_brand">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Brand
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="background-color: unset!important;" class="collapse" id="collapseLayouts_brand" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo "add_brands.php";?>">Add Brand</a>
                                    <a class="nav-link" href="<?php echo "all_brands.php";?>">Edit / Delete Brand</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts5" aria-expanded="false" aria-controls="collapseLayouts5">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Products
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="background-color: unset!important;" class="collapse" id="collapseLayouts5" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo "add_products.php";?>">Add Product</a>
                                    <a class="nav-link" href="<?php echo "all_products.php";?>">Edit / Delete Products</a>
                                </nav>
                            </div>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts6" aria-expanded="false" aria-controls="collapseLayouts6">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Blog
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div style="background-color: unset!important;" class="collapse" id="collapseLayouts6" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="<?php echo "add_artical.php";?>">Add Artical</a>
                                    <a class="nav-link" href="<?php echo "all_artical.php";?>">Edit / Delete Artical</a>
                                </nav>
                            </div>


                            <a class="nav-link" href="payments.php">
                                <div class="sb-nav-link-icon"><i class="fal fa-envelope-open-text"></i></div>
                                All Payments
                            </a>

                            <a class="nav-link" href="orders.php">
                                <div class="sb-nav-link-icon"><i class="fal fa-envelope-open-text"></i></div>
                                All Orders
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as: </div>
                        Admin
                    </div>
                </nav>
            </div>

