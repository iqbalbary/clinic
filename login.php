<?php
require_once('header.php');
if($isSession){
	header("Location: ".$base_url."index.php");
}

if($_POST  && isset($_POST["USER_ID"])){
	$condintion = array();
    $condintion[] = array(
        'fieldName'=> 'USER_ID',
        'symbol' => " = ",
        'value' => $_POST["USER_ID"]
    );
    
    $getNewUserDataSql =  fetchAllDataById("User", array('*'),  $condintion);
    $loginUserDataObj = $db->query($getNewUserDataSql);

    if($loginUserDataObj->num_rows >0){
        $loginUserData = $loginUserDataObj->fetch_assoc();
        $loginUserData['USER_ID'];
        if($loginUserData['Password'] == sha1( $_POST["Password"] )){
        	$_SESSION["USER_ID"] = $loginUserData['USER_ID'];
        	$_SESSION["User_Role"] = $loginUserData['User_Role'];
        	header("Location: ".$base_url."index.php");
        }
    }
}

//Dashboard

?>


<div class="container">
	<form action="" method='post'>
        <div class="form-group">
            <label for="USER_ID">USER ID</label>
            <input type="text" class="form-control" required='true' name="USER_ID" placeholder="1">
        </div>
        <div class="form-group">
            <label for="Password"> Password </label>
            <input type="password" required="required" class="form-control" name="Password"  placeholder="****">
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>

<?php
require_once('footer.php');