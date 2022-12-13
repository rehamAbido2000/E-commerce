<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>OneTech</title>
    <meta name="author" content="Team" />
    <meta name="description" content="E-Commerce" />
    <meta name="keywords" content="html,css,js,jquery" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <!-- Page icon Link -->
    <link rel="icon" href="img/characteristics/call.webp">
    <!-- For Responsive mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap -->
    <?php if (@$boot == "true"){?>
    <link rel="stylesheet" href="<?php echo $cssPath?>bootstrap.min.css">
    <?php }?>
    <!-- Font Awesome  -->
    <link rel="stylesheet" href="<?php echo $cssPath?>all.min.css">
    <!-- Owl.carousel Plugin -->
    <link rel="stylesheet" href="<?php echo $cssPath?>owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $cssPath?>owl.theme.default.min.css">
    <!-- Slick Plugin -->
    <link rel="stylesheet" type="text/css" href="<?php echo $cssPath?>slick.css">
    <link rel="stylesheet" type="text/css" href="<?php echo $cssPath?>slick-theme.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <!-- Main style sheet -->
    <link rel="stylesheet" href="asset/css/styles.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="<?php echo $cssPath?>toastr.min.css">
    <link rel="stylesheet" href="<?php echo $cssPath?>semantic.min.css">
    <script src="<?php echo $jsPath?>jquery-3.5.1.min.js"></script>
    <script src="<?php echo $jsPath?>toastr.min.js"></script>
    <link rel="stylesheet" href="<?php echo $cssPath;?><?php echo $style ?>">
</head>

<body >