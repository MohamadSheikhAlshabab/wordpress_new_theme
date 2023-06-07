<!DOCTYPE html>
<html <?php language_attributes();?>>
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <title><?php bloginfo('name');?></title>
    <link rel="pingback" href="<?php bloginfo('pingback_url')?>">
    <!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" type="text/css" rel="stylesheet"> -->
    <?php wp_head(); ?>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand mx-5" href="#"><?php bloginfo('name');?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse d-flex flex-row-reverse mx-5" id="navbarSupportedContent">
      <?php sheikh_alshabab_display_menu();?>
  </div>
</nav>
