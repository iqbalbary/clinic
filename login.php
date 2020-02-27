<?php
require_once('session.php');
if ($isSession) {
    header("Location: " . $base_url . "index.php");
    exit;
}

if ($_POST  && isset($_POST["USER_ID"])) {
    $condintion = array();
    $condintion[] = array(
        'fieldName' => 'USER_ID',
        'symbol' => " = ",
        'value' => $_POST["USER_ID"]
    );

    $loginUserDataArr =  dataFetchUsingTable("User", array('*'),  $condintion);

    if (sizeof($loginUserDataArr) > 0) {
        $loginUserData = $loginUserDataArr[0];
        if ($loginUserData['Password'] == sha1($_POST["Password"])) {
            $_SESSION["USER_ID"] = $loginUserData['USER_ID'];
            $_SESSION["User_Role"] = $loginUserData['User_Role'];
            header("Location: " . $base_url . "index.php");
            exit;
        }
    }
}
include('header.php');
?>
<div class="container">
    <form action="" method='post'>
        <div class="form-group">
            <label for="USER_ID">USER ID</label>
            <input type="text" class="form-control" required='true' name="USER_ID" placeholder="1">
        </div>
        <div class="form-group">
            <label for="Password"> Password </label>
            <input type="password" required="required" class="form-control" name="Password" placeholder="****">
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>

<?php
require_once('footer.php');
