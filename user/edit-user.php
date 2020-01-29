<?php
//Edit user
//Normal User can edit select field, admin can edit all
require_once('../header.php');
require_once('../fileUpload.php');

if(!$isSession){
    header("Location: ".$base_url."index.php");
}
$condintion = array();
$id = $_SESSION["USER_ID"];

if(isset($_GET) && isset($_GET['id'])){
    $id = (int) $_GET['id'];
}

$condintion[] = array(
    'fieldName'=> 'USER_ID',
    'symbol' => " = ",
    'value' => $id
);

$getNewUserDataArr =  dataFetchUsingTable("User", array('*'),  $condintion);

if( sizeof($getNewUserDataArr) > 0){
    $newUserData = $getNewUserDataArr[0];
}
 


if(isset($_POST) && sizeof($_POST)){
    $updateDataArray = array();
    foreach ($newUserData as $key =>  $value) {
       if(isset($_POST[$key]) && $_POST[$key] != $value ){
        $updateDataArray[$key] = $_POST[$key];
       }
    }
    if(isset($updateDataArray['USER_ID'])){
        unset($updateDataArray['USER_ID']);
    }

    if(isset($_FILES["Image"])){
        $target_dir = "../uploads/User/Image";
        $imgUploadStatus =  fileUpload( $target_dir, "Image");
        if($imgUploadStatus['status']){
            $updateDataArray['Image'] = $imgUploadStatus['fileName'];
        }
    }

    if(isset($_FILES["NID_Screenshot"])){
        $target_dir = "../uploads/User/NID_Screenshot";
        $NidUploadStatus =  fileUpload( $target_dir, "NID_Screenshot");
        if($NidUploadStatus['status']){
            $updateDataArray['NID_Screenshot'] = $NidUploadStatus['fileName'];
        }
    }

    $updateFlag = updateData("User", $updateDataArray, $condintion );
    if($updateFlag){
        header("Location: ".$base_url."user/edit-user.php");
    }
}
?>
<div class="container">
<form action="" method='post' enctype="multipart/form-data">
    <div class="form-group">
        <label for="USER_ID"> USER ID </label>
        <input type="text" class="form-control" value="<?php echo $newUserData["USER_ID"] ?>"  readonly  name="USER_ID" placeholder="Mr. X">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Name</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Name"] ?>"  required="true"  name="Name" placeholder="Mr. X">
    </div>
    <div class="form-group">
        <label for="User_Role">User Role</label>
        <select  class="form-control"  name="User_Role">
            <option  <?php if( $newUserData["User_Role"] == 1) echo "selected"; ?>  value="1"> Subscriber </option>
            <option <?php if( $newUserData["User_Role"] == 2) echo "selected"; ?>  value="2">Admin</option>
      </select>
    </div>
    <div class="form-group">
        <label for="Verified">Verify status</label>
        <select  class="form-control"  name="Verified">
            <option <?php if( $newUserData["Verified"] == 0) echo "selected"; ?> value="0"> Pendidng </option>
            <option <?php if( $newUserData["Verified"] == 1) echo "selected"; ?> value="1"> Verified </option>
      </select>
    </div>
    <div class="form-group">
        <label for="Verification_ID">Verification ID</label>
        <p> <?php echo $newUserData["Verification_ID"] ?> </p>
    </div>
    <div class="form-group">
        <label for="Image">Image</label>
        <input type="file" class="form-control-file" name="Image" id="Image">
        <img class="profile_img" src="<?php echo $base_url ."uploads/User/Image/".trim($newUserData["Image"])  ?>" alt="Image" />
    </div>
    <div class="form-group">
        <label for="NID">NID</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["NID"] ?>" required='true'  name="NID" placeholder="3492834590734">
    </div>
    <div class="form-group">
        <label for="NID_Screenshot">NID Screenshot</label>
        <input type="file" class="form-control-file" name="NID_Screenshot">
        <img src="<?php echo $base_url ."uploads/User/NID_Screenshot/".trim($newUserData["NID_Screenshot"])  ?>" alt="NID_Screenshot" />
    </div>
    <div class="form-group">
        <label for="Father_Name">Father Name</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Father_Name"] ?>"  required='true'  name="Father_Name" placeholder="Mr. X">
    </div>
    <div class="form-group">
        <label for="Mother_Name">Mother Name</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Mother_Name"] ?>"   required="true"  name="Mother_Name" placeholder="Mis. Y">
    </div>
    <div class="form-group">
        <label for="Nominee_Name">Nominee Name</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Nominee_Name"] ?>"  required="true"  name="Nominee_Name" placeholder="Mr. X">
    </div>
    <div class="form-group">
        <label for="Nominee_Relation">Nominee Relation</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Nominee_Relation"] ?>" required="true"  name="Nominee_Relation" placeholder="Dady">
    </div>
    <div class="form-group">
        <label for="email">Email address</label>
        <input type="email" required="required" value="<?php echo $newUserData["Email"] ?>" class="form-control" name="Email"  placeholder="abc@bb.co">
    </div>
    <div class="form-group">
        <label for="FB_Link">FB Link</label>
        <input type="text" required="required" value="<?php echo $newUserData["FB_Link"] ?>" class="form-control" name="FB_Link"  placeholder="https://www.facebook.com/nawaz.shorif.7">
    </div>
    <div class="form-group">
        <label for="Phone">Phone</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Phone"] ?>" required="true"  name="Phone" placeholder="Ex +01763015332" >
    </div>
    <div class="form-group">
        <label for="Secondary_Phone">Secondary Phone</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Secondary_Phone"] ?>"  name="Secondary_Phone" placeholder="Ex +01763015332" >
    </div>
    <div class="form-group">
        <label for="Address">Address</label>
        <textarea  type="textarea" class="md-textarea form-control"   required="true"  name="Address" placeholder="Address" rows="5"  cols="6" >
            <?php echo $newUserData["Address"] ?>
         </textarea>
    </div>
    <div class="form-group">
        <label for="Short_Description">Short Description</label>
        <textarea  type="textarea"  v  class="md-textarea form-control"  required="true"  name="Short_Description" placeholder="Short Description" rows="10">
        <?php echo $newUserData["Short_Description"] ?>
         </textarea>
    </div>
    <div class="form-group">
        <label for="Profession">Profession</label>
        <input type="text" class="form-control" value="<?php echo $newUserData["Profession"] ?>"   required="true"  name="Profession" placeholder="Doctor" >
    </div>
    <div class="form-group">
        <label for="Status">Status</label>
        <select  class="form-control"  name="Status">
            <option <?php if( $newUserData["Status"] == 1) echo "selected"; ?> value="1"> Active</option>
            <option <?php if( $newUserData["Status"] == 0) echo "selected"; ?> value="0">In Active</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary"  name="submit">Submit</button>
    </form>
</div>
<?php
require_once('../footer.php');