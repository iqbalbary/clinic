<?php
// Add Deposit Form
require_once('../header.php');
if (!$isSession) {
    header("Location: " . $base_url . "index.php");
}
require_once('../fileUpload.php');
$userListQuery = fetchAllDataById("User", array('USER_ID', "Image", "Name"));
$userListObj = $db->query($userListQuery);

$userListArr = array();

if ($userListObj->num_rows > 0) {
    while ($row = $userListObj->fetch_assoc()) {
        $userListArr[] = $row;
    }
}

$userListStr = json_encode($userListArr);

if (isset($_POST['Amount'])) {
    $insertArr = array(
        "Verification_ID" => @$_SESSION["USER_ID"],
        "Profile_ID" => $_POST['Profile_ID'],
        "Amount" => $_POST['Amount'],
        "late_fine" => @$_POST["late_fine"],
        "Date" => time(),
        "Month" => implode(",", $_POST['Month']),
        "Verification" => 0
    );

    if (isset($_FILES["Deposite_Slip"])) {
        $target_dir = "../uploads/Deposite/Deposite_Slip";
        $imgUploadStatus =  fileUpload($target_dir, "Deposite_Slip");
        if ($imgUploadStatus['status']) {
            $insertArr['Deposite_Slip'] = $imgUploadStatus['fileName'];
        }
    }

    $sql =  insetrtData("deposite", $insertArr);
    $insertFlag = $db->query($sql);

    if ($insertFlag) {
    }
}

?>
<div class="container">
    <form action="" method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <input type="text" class="Profile_ID" id="Profile_ID" required="true" name="Profile_ID">
            <div class="profile-data-container">
                <div class="custom-input"></div>
                <div class="custom-selected-block"></div>
                <div class="list-item-container" data-user-list='<?php echo $userListStr; ?>'>
                    <?php
                    foreach ($userListArr as $row) { ?>
                        <div class="item p-list-item" data-id="<?php echo $row['USER_ID']; ?>">
                            <img src="<?php echo $base_url . "uploads/User/Image/" . trim($row["Image"] ? $row["Image"] :  'avater.jpg')  ?>">
                            <span> <?php echo $row['Name']; ?> </span>

                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Amount">Amount</label>
            <input type="Number" required="required" class="form-control" required="true" name="Amount" placeholder="5000">
        </div>
        <div class="form-group">
            <label for="late_fine">Late Fine</label>
            <input type="Number" required="required" class="form-control" required="true" name="late_fine" placeholder="500">
        </div>
        <div class="form-group">
            <label for="Month">Month</label>
            <select class="js-Month-multiple" name="Month[]" multiple="multiple">
                <?php foreach ($monthArray as $key => $monthName) { ?>
                    <option value="<?php echo $key; ?>"> <?php echo $monthName; ?> </option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="Deposite_Slip"> Deposite Slip </label>
            <input type="file" class="form-control-file" name="Deposite_Slip" id="Deposite_Slip">
        </div>
        <div class="form-group">
            <label for="Short_Description">Short Description</label>
            <textarea type="textarea" v class="md-textarea form-control" required="true" name="Short_Description" placeholder="Short Description" rows="10"> </textarea>
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>

<?php
require_once('../footer.php');
?>