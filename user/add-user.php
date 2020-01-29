<?php
//Add new user - Form
//Only for Admin
require_once('../header.php');
if(!$isSession ){
    header("Location: ".$base_url."index.php");
}

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
   $insertFlag=  insetrtDataFunc("User", $insertArr);

   if($insertFlag){
    $condintion = array();
    $condintion[] = array(
        'fieldName'=> 'USER_ID',
        'symbol' => " = ",
        'value' => $db->insert_id
    );
    $getNewUserDataArr =  dataFetchUsingTable("User", array('*'),  $condintion);

    if( sizeof($getNewUserDataArr)>0){
        $newUserData = $getNewUserDataArr[0];
    }
   }
    
    ?>
    <p> Successfully new user created. user Id <?php echo $newUserData['USER_ID']; ?> <a href=""> add new user </a>  </p>
    <?php 
}else{

?>
    <form action="" method='post'>
        <div class="form-group">
            <label for="Name">Name</label>
            <input type="text" class="form-control" required='true' name="Name" placeholder="Mr. X">
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