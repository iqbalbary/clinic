<?php
// Add Deposit Form
require_once '../session.php';
isAuthorize();
require_once '../fileUpload.php';
require_once '../helper.php';
$userListArr = dataFetchUsingTable("user", array('USER_ID', "Image", "Name"));
$userListStr = json_encode($userListArr);
$userListArrMap = dataMapByUniqeField("USER_ID", $userListArr);
$MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
$MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);

$depositId = "";

if (isset($_GET['deposit-id'])) {
    $depositId = $_GET['deposit-id'];
} else {
    header("Location: " . $base_url . "index.php");
    exit;
}

$userDepositCondintion[] = array(
    'fieldName' => 'Deposite_ID',
    'symbol' => " = ",
    'value' => $depositId,
);

$depositDetailsDataArr = dataFetchUsingTable("deposite", array(), $userDepositCondintion);
$depositDetailsData = $depositDetailsDataArr[0];
$selectedUserIds = explode(",", $depositDetailsData["Profile_ID"]);

if ($depositDetailsData['Verification']) {
    header("Location: " . $base_url . "deposit/view-deposit.php?deposit-id=" . $depositDetailsData["Deposite_ID"]);
    exit;
}

if ($loginUserId != $depositDetailsData['submission_id']) {
    header("Location: " . $base_url . "deposit/deposits.php");
    exit;
}

if (isset($_POST['Amount'])) {
    $updateArr = array(
        "submission_id" => $loginUserId,
        "Profile_ID" => $_POST['Profile_ID'],
        "Amount" => $_POST['Amount'],
        "late_fine" => @$_POST["late_fine"],
        "Short_Description" => trim(@$_POST['Short_Description']),
        "Date" => time(),
        "Month" => implode(",", $_POST['Month']),
        "Verification" => 0,
    );

    if (isset($_FILES["Deposite_Slip"])) {
        $target_dir = "../uploads/Deposite/Deposite_Slip";
        $imgUploadStatus = fileUpload($target_dir, "Deposite_Slip");
        if ($imgUploadStatus['status']) {
            $updateArr['Deposite_Slip'] = $imgUploadStatus['fileName'];
        }
    }

    $updateFlag = updateData("deposite", $updateArr, $userDepositCondintion);

    if ($updateFlag) {
        header("Location: " . $base_url . "deposit/edit-deposit.php?deposit-id=" . $depositId);
        exit;
    }
}

$preSelectedMonthArr = explode(",", $depositDetailsData['Month']);
require_once '../header.php';
?>
<div class="container">
    <form action="" method='post' enctype="multipart/form-data">
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <input type="text" class="Profile_ID" id="Profile_ID" value="<?=$depositDetailsData['Profile_ID']?>"
                required="true" name="Profile_ID">
            <div class="profile-data-container" id="profileDataContainerId" multiSelectAtt="1">
                <div class="custom-input"></div>
                <div class="custom-selected-block">
                    <?php
foreach ($selectedUserIds as $selectedUserId) {?>
                    <div class="input-item-block">
                        <img
                            src="<?php echo $base_url . 'uploads/User/Image/' . trim($userListArrMap[$selectedUserId]['Image'] ? $userListArrMap[$selectedUserId]['Image'] : 'avater.jpg') ?>">
                        <span> <?php echo $userListArrMap[$selectedUserId]['Name']; ?> </span>
                    </div>
                    <?php }?>

                </div>
                <div class="list-item-container" data-user-list='<?php echo $userListStr; ?>'>
                    <?php
foreach ($userListArr as $row) {?>
                    <div class="item p-list-item" data-id="<?php echo $row['USER_ID']; ?>">
                        <img
                            src="<?php echo $base_url . "uploads/User/Image/" . trim($row["Image"] ? $row["Image"] : 'avater.jpg') ?>">
                        <span> <?php echo $row['Name']; ?> </span>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Amount">Amount</label>
            <input type="Number" required="required" class="form-control" value="<?=$depositDetailsData['Amount']?>"
                required="true" name="Amount" placeholder="5000">
        </div>
        <div class="form-group">
            <label for="late_fine">Late Fine</label>
            <input type="Number" class="form-control" value="<?=$depositDetailsData['late_fine']?>" name="late_fine"
                placeholder="500">
        </div>
        <div class="form-group">
            <label for="Month">Month</label>
            <select class="js-Month-multiple" name="Month[]" multiple="multiple">
                <?php foreach ($MonthYearListMap as $key => $monthName) {?>
                <option value="<?php echo $key; ?>" <?=in_array($key, $preSelectedMonthArr) ? "selected" : ""?>>
                    <?php echo $monthName['month_name'] . " " . $monthName['year']; ?> </option>
                <?php }?>
            </select>
        </div>
        <div class="form-group">
            <label for="Deposite_Slip"> Deposite Slip </label>
            <input type="file" class="form-control-file" name="Deposite_Slip" id="Deposite_Slip">
            <?php if ($depositDetailsData['Deposite_Slip']) {?>
            <img src="<?php echo $base_url . 'uploads/Deposite/Deposite_Slip/' . trim($depositDetailsData['Deposite_Slip'] ? $depositDetailsData['Deposite_Slip'] : 'avater.jpg') ?>"
                alt="slip img">
            <?php }?>
        </div>
        <div class="form-group">
            <label for="Short_Description">Short Description</label>
            <textarea type="textarea" class="md-textarea form-control" required="true" name="Short_Description"
                placeholder="Short Description" rows="10">
        <?=$depositDetailsData['Short_Description']?>
        </textarea>
        </div>
        <button type="submit" class="btn btn-primary" name='submit'>Submit</button>
    </form>
</div>

<?php
require_once '../footer.php';
?>