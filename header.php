<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Clinic</title>

    <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>assets/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= $base_url; ?>assets/css/select2.min.css">


    <script type="text/javascript" src="<?= $base_url; ?>assets/js/jquery-1.11.3.min.js"></script>
    <script type="text/javascript" src="<?= $base_url; ?>assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= $base_url; ?>assets/js/select2.min.js"></script>
    <script type="text/javascript">
        var baseUrl = '<?= $base_url; ?>';
    </script>
</head>

<body>

    <nav class="navbar navbar-default">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="<?= $base_url; ?>bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= $base_url; ?>">Clinic</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="<?= $base_url; ?>index.php">Home</a></li>
                    <?php if ($isSession) { ?>
                        <li class="dropdown">
                            <a href="<?= $base_url; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Deposit <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $base_url; ?>deposit/deposits.php">All Deposits</a></li>
                                <li><a href="<?= $base_url; ?>deposit/add-deposit.php">Add Deposit</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="<?= $base_url; ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <img src="<?= $userImage ?>"  style="height:25px;width:auto;    border-radius:100%;" alt="profile pic"> <?= $userName ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= $base_url; ?>user/users.php">Users</a></li>
                                <li><a href="<?= $base_url; ?>user/edit-user.php">Edit Profile</a></li>
                                <li><a href="<?= $base_url; ?>changePassword.php">Change Password</a></li>
                                <li><a href="<?= $base_url; ?>logOut.php"> Log Out </a></li>
                                <?php if ($userRole == 2) { ?>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="<?= $base_url; ?>user/add-user.php">Add User</a></li>
                                    <li><a href="<?= $base_url; ?>user/set-user-permission.php">Set User role & permission</a></li>
                                <?php } ?>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="<?= $base_url; ?>login.php">Log in</a></li>
                    <?php } ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>