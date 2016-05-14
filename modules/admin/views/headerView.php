<?php 
    if( Session::get("status") !== _NIVO_PRISTUPA_ADMIN)
        header ("Location:index");
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Studi 77+ Admin CMS</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="<?=_WEB_PATH?>modules/admin/views/assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="<?=_WEB_PATH?>modules/admin/views/assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="<?=_WEB_PATH?>modules/admin/views/assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
     <link href="<?=_WEB_PATH?>modules/admin/views/assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
     <!-- Alertify js -->
     <link href="<?=_WEB_PATH?>modules/admin/views/assets/js/alertify/css/alertify.css" />
     <link href="<?=_WEB_PATH?>modules/admin/views/assets/js/alertify/css/themes/bootstrap.css" />
     <!--  EOF Alertify JS-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
   <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
   <script>
       tinymce.init({
       selector:'textarea', 
            height : 300,
            max_width: 500,
        });
   </script>
   
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Studio77 admin</a> 
            </div>
  <div style="color: white;
padding: 15px 50px 5px 50px;
float: right;
font-size: 16px;">&nbsp; <a href="logOut" class="btn btn-danger square-btn-adjust">Logout</a> </div>
        </nav>   
           <!-- /. NAV TOP  -->
                <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
				<li class="text-center">
                    <img src="<?=_WEB_PATH?>modules/admin/views/assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a  href="insertArticles"><i class="fa fa-file-text-o fa-2x"></i>Insert Articles</a>
                    </li>
                      <li>
                        <a  href="edit"><i class="fa fa-pencil fa-2x"></i>Edit Articles</a>
                    </li>
                    <li>
                        <a  href="slider"><i class="fa fa-picture-o fa-2x"></i>Slader Administration</a>
                    </li>
                    
                </ul>
               
            </div>
            
        </nav>  
        <!-- /. NAV SIDE  -->