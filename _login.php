<?php
include_once 'includes/custom_functions.php';
checkalreadylogedin();
$error = actionlogin();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title> Log In </title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>

    <style type="text/css">
    	body {
    		padding-top: 0;
    	}
    </style>

        <section class="login_module">
            <div class="display_table">
                <div class="display_cell">
                    <div class="login_block">
                        <form method="post">
                            <?php if($error!=""){ ?>
                            <div class="form-group">
                                <span><?php echo $error; ?></span>
                            </div>
                            <?php } ?>
                            <div class="form-group">
                                <label>User Name:</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter your user name">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter your password">
                            </div>
                            <div class="">
                                <button class="btn btn-default" name="login">submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    </body>
</html>