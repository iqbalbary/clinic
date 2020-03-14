<?php
require_once 'session.php';
isAuthorize();
if ($_POST && isset($_POST["New_Password"])) {
    $condintion = array();
    $condintion[] = array(
        'fieldName' => 'USER_ID',
        'symbol' => " = ",
        'value' => $_SESSION["USER_ID"],
    );

    $getNewUserDataSql = fetchAllDataById("user", array('*'), $condintion);
    $loginUserDataObj = $db->query($getNewUserDataSql);

    if ($loginUserDataObj->num_rows > 0) {
        $loginUserData = $loginUserDataObj->fetch_assoc();
        $loginUserData['USER_ID'];
        if ($loginUserData['Password'] == sha1($_POST["Old_Password"])) {
            $updateDataArray = array(
                "Password" => sha1($_POST["New_Password"]),
            );

            $updateSqlStr = updateSql("user", $updateDataArray, $condintion);
            $updateFlag = $db->query($updateSqlStr);

            if ($updateFlag) {
                header("Location: " . $base_url . "login.php");
                exit;
            }
        }
    }
}
require_once 'header.php';

?>


<div class="container">
    <form action="" method='post'>
        <div class="form-group">
            <label for="Old_Password"> Old Password </label>
            <input type="password" required="required" class="form-control" name="Old_Password" placeholder="****">
        </div>
        <div class="form-group">
            <label for="New_Password"> New Password </label>
            <input type="password" required="required" class="form-control" name="New_Password" placeholder="****">
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>

<?php
require_once 'footer.php';