<?php
$error_reporting = false; //value must be true or false
if($error_reporting){
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
}
include_once 'includes/custom_functions.php';
include_once 'includes/check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title> Shivom </title>

<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/font-awesome-4.7.0/css/font-awesome.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600|Lato:300,400,700" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="css/bootstrap-tagsinput.css">
<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/datepicker.css">
<script src="js/jquery-3.2.0.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>

    <nav class="navbar">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle inventory_toogle" data-offcanvas-open="my-navigation">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SHIVOM</a>
            </div>
            
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse offcanvas" id="my-navigation">
                <div class="menu_header visible-xs">
                    <div class="menu_close">
                        <button class="btn menu_back_btn" data-offcanvas-close="my-navigation">
                            <i class="fa fa-angle-left" aria-hidden="true"></i> Menu
                        </button>
                    </div>
                    <div class="menu_logo">                            
                        <a class="navbar-brand" href="#">SHIVOM</a>  
                    </div>                        
                </div>
                <ul class="nav navbar-nav navbar-right">
               	<?php if($_SESSION['role']=='1'){ ?>
                    <li class="active"><a href="">projects <span class="sr-only">(current)</span></a></li>
                <?php }elseif($_SESSION['role']=='2'){ ?>
                	<li class="active"><a href="work_order.php">WO <span class="sr-only"></span></a></li>
                    <li class="active"><a href="machine.php">Machine <span class="sr-only"></span></a></li>
                <?php } ?>
                    <li><a href="reports.php">reports</a></li>
                    <li class="log_btn"><a href="logout.php">sign out</a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>