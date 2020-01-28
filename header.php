<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
$base_url = "http://localhost/clinic/";
$isSession = false;
$userRole = 1;
if( isset($_SESSION["USER_ID"])){
	$isSession = true;
	$userRole = $_SESSION["User_Role"];
}
require_once('db.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Clinic</title>

		<link rel="stylesheet" type="text/css" href="<?php  echo $base_url; ?>assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="<?php  echo $base_url; ?>assets/css/font-awesome.css">	
		<link rel="stylesheet" type="text/css" href="<?php  echo $base_url; ?>assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="<?php  echo $base_url; ?>assets/css/select2.min.css">

    	
		<script type="text/javascript" src="<?php  echo $base_url; ?>assets/js/jquery-1.11.3.min.js"></script>	
		<script type="text/javascript" src="<?php  echo $base_url; ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php  echo $base_url; ?>assets/js/select2.min.js"></script>
		<script type="text/javascript">
			var baseUrl  = '<?php echo $base_url; ?>';
		</script>
	</head>
	<body>

		<nav class="navbar navbar-default">
  			<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="<?php  echo $base_url; ?>bs-example-navbar-collapse-1" aria-expanded="false">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			      	</button>
			      	<a class="navbar-brand" href="<?php  echo $base_url; ?>">Clinic</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      	<ul class="nav navbar-nav navbar-right">
			        	<li><a href="<?php  echo $base_url; ?>index.php">Home</a></li>
			        	<?php if($isSession){ ?>
			        	<li class="dropdown">
			          		<a href="<?php  echo $base_url; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deposit <span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				            	<li><a href="<?php  echo $base_url; ?>deposit/deposits.php">All Deposits</a></li>
				            	<li><a href="<?php  echo $base_url; ?>deposit/add-deposit.php">Add Deposit</a></li>
				            	<li role="separator" class="divider"></li>
				            	<li><a href="<?php  echo $base_url; ?>deposit/edit-deposit.php">Edit Deposit</a></li>
				          	</ul>
			        	</li>
			        	<li class="dropdown">
			          		<a href="<?php  echo $base_url; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				            	<li><a href="<?php  echo $base_url; ?>user/users.php">Users</a></li>
				            	<li><a href="<?php  echo $base_url; ?>user/edit-user.php">Edit Profile</a></li>
				            	<li><a href="<?php  echo $base_url; ?>changePassword.php">Change Password</a></li>
				            	<li><a href="<?php  echo $base_url; ?>logOut.php"> Log Out </a></li>
				            	<?php  if($userRole == 2){ ?>
				            	<li role="separator" class="divider"></li>
				            	<li><a href="<?php  echo $base_url; ?>user/add-user.php">Add User</a></li>
				            	<li><a href="<?php  echo $base_url; ?>/user/remove-user.php">Remove User</a></li>
				            	<?php  } ?>
				          	</ul>
			        	</li>
			        	<?php }else{ ?>
			        	<li><a href="<?php  echo $base_url; ?>login.php">Log in</a></li>
			        <?php } ?>
			      	</ul>
			    </div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>