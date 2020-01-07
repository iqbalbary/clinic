<?php
//Add new user - Form
//Only for Admin

if(!$isSession ){
    header("Location: ".$base_url."index.php");
}
require_once('../header.php');
$tableDataArr = array();
?>
<div class="container">
<?php 
if(isset($_POST['Name'])){
    $name= trim($_POST['Name']);

    $insertArr = array(
        "Name"=> $name,
        "Email"=> $_POST['Email'],
        "Phone"=> $_POST['Phone'],
        "Password"=>sha1("1234")
    );
   $sql=  insetrtData("User", $insertArr);
   $insertFlag = $db->query($sql);

   if($insertFlag){
    $condintion = array();
    $condintion[] = array(
        'fieldName'=> 'USER_ID',
        'symbol' => " = ",
        'value' => $db->insert_id
    );
    $getNewUserDataSql =  fetchAllDataById("User", array('*'),  $condintion);
    $getNewUserData = $db->query($getNewUserDataSql);

    if($getNewUserData->num_rows >0){
        $newUserData = $getNewUserData->fetch_assoc();
    }
   }
    
    ?>
    <p> Successfully new user created. user Id <?php echo $newUserData['USER_ID']; ?> <a href=""> add new user </a>  </p>
    <?php 
}else{

?>
    <form action="" method='post'>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" class="form-control" value="<?php echo $tableDataArr->Name; ?>"  required='true' name="Name" placeholder="Mr. X">
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" required="required" class="form-control" name="Email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="abc@bb.co">
        </div>
        <div class="form-group">
            <label for="Phone">Phone Number</label>
            <input type="text" required="required" class="form-control" name="Phone" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="+8801763015332">
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
   <?php   }  ?>
</div>
<?php

require_once('../footer.php');