<?php
// Add Deposit Form
require_once('../session.php');
isAuthorize();
require_once '../fileUpload.php';
require_once '../helper.php';
$userListArr = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));
$userListStr = json_encode($userListArr);
$MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
$MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);

if (isset($_POST['Amount'])) {
    $insertArr = array(
        "submission_id" => @$_SESSION["USER_ID"],
        "Profile_ID" => $_POST['Profile_ID'],
        "Amount" => $_POST['Amount'],
        "late_fine" => @$_POST["late_fine"],
        "Date" => time(),
        "Month" => implode(",", $_POST['Month']),
        "Verification" => 0,
    );

    if (isset($_FILES["Deposite_Slip"])) {
        $target_dir = "../uploads/Deposite/Deposite_Slip";
        $imgUploadStatus = fileUpload($target_dir, "Deposite_Slip");
        if ($imgUploadStatus['status']) {
            $insertArr['Deposite_Slip'] = $imgUploadStatus['fileName'];
        }
    }

    $insertFlag = insetrtDataFunc("deposite", $insertArr);

    if ($insertFlag) {
    }
}

require_once '../header.php';
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
                            <img src="<?php echo $base_url . "uploads/User/Image/" . trim($row["Image"] ? $row["Image"] : 'avater.jpg') ?>">
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
                <?php foreach ($MonthYearListMap as $key => $monthName) { ?>
                    <option value="<?php echo $key; ?>"> <?php echo $monthName['month_name'] . " ". $monthName['year'] ; ?> </option>
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
require_once '../footer.php';
?>