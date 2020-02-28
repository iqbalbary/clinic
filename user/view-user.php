<?php
//Edit user
//Normal User can edit select field, admin can edit all
require_once('../session.php');
require_once("../helper.php");
isAuthorize();
$condintion = array();
$id = $_SESSION["USER_ID"];

if (isset($_GET) && isset($_GET['id'])) {
    $id = (int) $_GET['id'];
}

$condintion[] = array(
    'fieldName' => 'USER_ID',
    'symbol' => " = ",
    'value' => $id
);
$userListArr = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));
$userDataMap = dataMapByUniqeField("USER_ID", $userListArr);

$getNewUserDataArr =  dataFetchUsingTable("User", array('*'),  $condintion);

if (sizeof($getNewUserDataArr) > 0) {
    $newUserData = $getNewUserDataArr[0];
}
require_once('../header.php');

?>
<div class="container">
    <form action="" method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="USER_ID"> USER ID </label>
            <p> <?= $newUserData["USER_ID"] ?></p>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <p> <?= $newUserData["Name"] ?> </p>
        </div>
        <div class="form-group">
            <label for="User_Role">User Role</label>
            <p> <?= ($newUserData["User_Role"] == 1) ?  "Subscriber" : "Admin" ?> </p>
        </div>
        <div class="form-group">
            <label for="Image">Image</label>
            <img class="profile_img" src="<?php echo $base_url . "uploads/User/Image/" . trim($newUserData["Image"])  ?>" alt="Image" />
        </div>
        <div class="form-group">
            <label for="NID">NID</label>
            <p> <?= $newUserData["NID"] ?> </p>
        </div>
        <div class="form-group">
            <label for="NID_Screenshot">NID Screenshot</label>
            <img src="<?php echo $base_url . "uploads/User/NID_Screenshot/" . trim($newUserData["NID_Screenshot"])  ?>" alt="NID_Screenshot" />
        </div>
        <div class="form-group">
            <label for="Father_Name">Father Name</label>
            <p> <?= $newUserData["Father_Name"] ?> </p>
        </div>
        <div class="form-group">
            <label for="Mother_Name">Mother Name</label>
            <p> <?= $newUserData["Mother_Name"] ?> </p>
        </div>
        <div class="form-group">
            <label for="Nominee_Name">Nominee Name</label>
            <p> <?= $newUserData["Nominee_Name"] ?> </p>
        </div>
        <div class="form-group">
            <label for="Nominee_Relation">Nominee Relation</label>
            <p> <?= $newUserData["Nominee_Relation"] ?> </p>
        </div>
        <div class="form-group">
            <label for="email">Email address</label>
            <p> <?= $newUserData["Email"]  ?></p>
        </div>
        <div class="form-group">
            <label for="FB_Link">FB Link</label>
            <p> <?= $newUserData["FB_Link"] ?> </p>
        </div>
        <div class="form-group">
            <label for="Phone">Phone</label>
            <p> <?= $newUserData["Phone"]  ?></p>
        </div>
        <div class="form-group">
            <label for="Secondary_Phone">Secondary Phone</label>
            <p> <?= $newUserData["Secondary_Phone"] ?> </p>
        </div>
        <div class="form-group">
            <label for="Address">Address</label>
            <p> <?php echo $newUserData["Address"] ?></p>
        </div>
        <div class="form-group">
            <label for="Short_Description">Short Description</label>
            <p>

                <?php echo $newUserData["Short_Description"] ?>
            </p>
        </div>
        <div class="form-group">
            <label for="Profession">Profession</label>
            <p> <?php echo $newUserData["Profession"] ?> </p>
        </div>
        <div class="form-group">
            <label for="Status">Status</label>
            <p> <?= $newUserData["Status"] == 1 ?   "Active" : " In Active" ?> </p>
        </div>

        <div class="form-group">
            <label for="Verified">Verify status</label>
            <p> <?= ($newUserData["Verified"]) ?  "Verified by " . $userDataMap[$newUserData['Verification_ID']]['Name']  . " at " . date( " Y-m-d",$newUserData['Verification_date']) : " not verified" ?> </p>
            <?php

            if ($userRole == 2 && !$newUserData["Verified"]) {

            ?>

                <a href="<?= $base_url . "user/verified.php?id=". $newUserData['USER_ID'] ?>"> verify </a>
            <?php
            }

            ?>
        </div>

    </form>
</div>
<?php
require_once('../footer.php');
