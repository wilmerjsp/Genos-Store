<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Etiquetas Meta-->
    <meta charset="utf-8">
    <meta name="description" content="Tienda online Wilmer Sierra Genos.inc">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Wilmer Sierra - Genos.inc">
    <meta name="theme-color" content="#009688">
    <link rel="shortcut icon" href="<?php echo media();?>/images/favicon.ico" type="image/x-icon">

    <!-- Title-->
    <title><?php echo $data['page_tag'];?></title>

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="<?php echo media();?>/css/main.css">
    <link rel="stylesheet" type="text/css" href="<?php echo media();?>/css/style.css">

  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="<?php echo baseUrl();?>/dashboard">Tienda Online</a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user-circle fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="<?php echo baseUrl();?>/opciones"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="<?php echo baseUrl();?>/perfil"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="<?php echo baseUrl();?>/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <?php require_once('nav_admin.php'); ?>