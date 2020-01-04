<?php require_once('db.php');?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Clinic</title>

		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">	
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    	
		<script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script>	
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="assets/js/custom.js"></script>
	</head>
	<body>

		<nav class="navbar navbar-default">
  			<div class="container">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        	<span class="sr-only">Toggle navigation</span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			        	<span class="icon-bar"></span>
			      	</button>
			      	<a class="navbar-brand" href="#">Clinic</a>
			    </div>
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      	<ul class="nav navbar-nav navbar-right">
			        	<li><a href="index.php">Home</a></li>
			        	<li class="dropdown">
			          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deposit <span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				            	<li><a href="#">All Deposits</a></li>
				            	<li><a href="#">Add Deposit</a></li>
				            	<li role="separator" class="divider"></li>
				            	<li><a href="#">Edit Deposit</a></li>
				          	</ul>
			        	</li>
			        	<li class="dropdown">
			          		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">User <span class="caret"></span></a>
				          	<ul class="dropdown-menu">
				            	<li><a href="#">Users</a></li>
				            	<li><a href="#">Edit Profile</a></li>
				            	<li role="separator" class="divider"></li>
				            	<li><a href="#">Add User</a></li>
				            	<li><a href="#">Remove User</a></li>
				          	</ul>
			        	</li>
			      	</ul>
			    </div><!-- /.navbar-collapse -->
  			</div><!-- /.container-fluid -->
		</nav>