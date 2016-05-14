<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Studio 77+ CMS</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=_WEB_PATH?>views/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?=_WEB_PATH?>views/css/modern-business.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=_WEB_PATH?>views/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?=_WEB_PATH?>">Stdio 77+ CMS</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Header Carousel -->
    <header >
        <div  id="myCarousel" class="carousel slide " style="margin: auto;">
        <!-- Indicators -->
        <ol class="carousel-indicators">
             <?php $i = 0; $x = true;
            foreach($slider_images as $image){ ?>
                <li data-target="#myCarousel" data-slide-to="<?=$i?>" class="<?php if($x) echo 'active';?>"></li>
             <?php $i++; $x = false; } ?>
        </ol>

        <!-- Wrapper for slides -->
       <div class="carousel-inner" role="listbox">
            <?php $y = true;
            foreach($slider_images as $image){ $i++?>
            <div class="item <?php if($y) echo 'active';?>">
                <img style=" width: 1900px;" src="<?=_WEB_PATH?>views/img/<?=$image->image_name?>" />
                <div class="carousel-caption">
                    <h2><?=$image->image_title?></h2>
                </div>
            </div>
            <?php $y = false; } ?>
      </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="icon-prev"></span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="icon-next"></span>
        </a>
    </div>
    </header>