<?php
//Add new user - Form
//Only for Admin
require_once('../session.php');
require_once('../helper.php');
isAdminUser();
$userListArr = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));
$userListStr = json_encode($userListArr);
$userDataMap = dataMapByUniqeField("USER_ID", $userListArr);

if (isset($_POST['Profile_ID'])) {
    $selectedUserId = trim($_POST['Profile_ID']);
    $condintion = array();
    $condintion[] = array(
        'fieldName' => 'USER_ID',
        'symbol' => " = ",
        'value' => $selectedUserId
    );
    $updateData = array(
        "USER_ID" => $selectedUserId,
        "User_Role" => $_POST['User_Role'],
        "Verified" => $_POST['Verified'],
        "Verification_ID" => $loginUserId,
        "Verification_date" => time()
    );
    $updateFlag =  updateData("User", $updateData, $condintion);
}
require_once('../header.php');
?>
<div class="container">
    <form action="" method='post'>
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <input type="text" class="Profile_ID" id="Profile_ID" required="true" name="Profile_ID">
            <div class="profile-data-container" id="profileDataContainerId" multiSelectAtt="0">
                <div class="custom-input"></div>
                <div class="custom-selected-block"></div>
                <div class="list-item-container" data-user-list='<?php echo $userListStr; ?>'>
                    <?php
                    foreach ($userDataMap as $row) { ?>
                        <div class="item p-list-item" data-id="<?php echo $row['USER_ID']; ?>">
                            <img src="<?php echo $base_url . "uploads/User/Image/" . trim($row["Image"] ? $row["Image"] : 'avater.jpg') ?>">
                            <span> <?php echo $row['Name']; ?> </span>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Status"> Status</label>
            <select class="form-control" name="Status" required>
                <option value=""> Please select one </option>
                <option value="0"> In - Active </option>
                <option value="1"> Active </option>
            </select>
        </div>
        <div class="form-group">
            <label for="User_Role">User Role</label>
            <select class="form-control" name="User_Role" required>
                <option value=""> Please select one </option>
                <option value="1"> Subscriber </option>
                <option value="2">Admin</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>
<?php

require_once('../footer.php');
