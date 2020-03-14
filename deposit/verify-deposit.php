<?php
// Add verify  Deposit
require_once '../session.php';
isAdminUser();
require_once '../helper.php';
$MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
$MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);

$userListData = dataFetchUsingTable("user", array('USER_ID', "Image", "Name"));
$userListArr = dataMapByUniqeField("USER_ID", $userListData);
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

if ($depositDetailsData['Verification']) {
    header("Location: " . $base_url . "deposit/view-deposit.php?deposit-id=" . $depositDetailsData["Deposite_ID"]);
    exit;
}

$selectedUserIds = explode(",", $depositDetailsData["Profile_ID"]);
$selectedMonths = explode(",", $depositDetailsData["Month"]);

if (isset($_POST['Deposite_ID'])) {
    $userDepositArr = array(
        "user_id" => "",
        "month" => "",
        "deposit_id" => $depositId,
        "amount" => 0,
        "late_fine" => 0,
    );

    foreach ($selectedUserIds as $selectedUserId) {
        $userDepositArr['user_id'] = $selectedUserId;
        foreach ($selectedMonths as $selectedMonth) {
            $userDepositArr['month'] = $selectedMonth;
            $userDepositArr['amount'] = $_POST["user-" . $selectedUserId . "-month-" . $selectedMonth . "-amount"];
            $userDepositArr['late_fine'] = $_POST["user-" . $selectedUserId . "-month-" . $selectedMonth . "-late-fine"];

            if ($userDepositArr['amount'] || $userDepositArr['late_fine']) {
                $insertFlag = insetrtDataFunc("user_deposite", $userDepositArr);
            }
        }
    }
    $UserDepositUpdateArray = array(
        "Verification_ID" => $_SESSION["USER_ID"],
        "Verification" => 1,
        "Verification_date" => time(),
    );
    $updateFlag = updateData("deposite", $UserDepositUpdateArray, $userDepositCondintion);
    if ($updateFlag) {
        $depositDetailsData["Verification_ID"] = $_SESSION["USER_ID"];
        $depositDetailsData["Verification"] = 1;
        header("Location: " . $base_url . "deposit/view-deposit.php?deposit-id=" . $depositDetailsData["Deposite_ID"]);
        exit;
    }
}
require '../header.php';

?>
<div class="container">
    <form action="" method='post'>
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <div class="profile-data-container" id="profileDataContainerId" multiSelectAtt="1">
                <div class="custom-input">
                    <?php
foreach ($selectedUserIds as $selectedUserId) {?>
                    <div class="input-item-block">
                        <img
                            src="<?php echo $base_url . 'uploads/User/Image/' . trim($userListArr[$selectedUserId]['Image'] ? $userListArr[$selectedUserId]['Image'] : 'avater.jpg') ?>">
                        <span> <?php echo $userListArr[$selectedUserId]['Name']; ?> </span>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="Amount">Amount</label>
            <p> <?php echo $depositDetailsData['Amount']; ?> </p>
        </div>
        <div class="form-group">
            <label for="late_fine">Late Fine</label>
            <p> <?php echo $depositDetailsData['late_fine']; ?> </p>
        </div>
        <div class="form-group">
            <label for="Month">Month</label>
            <div class="custom-input">
                <?php
foreach ($selectedMonths as $selectedMonth) {?>
                <div class="input-item-block">
                    <?php echo $MonthYearListMap[$selectedMonth]['month_name'] . " " . $MonthYearListMap[$selectedMonth]['year']; ?>
                </div>
                <?php }?>
            </div>
        </div>
        <div class="form-group">
            <div class="image-label-block">
                <label for="Deposite_Slip"> Deposite Slip </label>
                <img
                    src="<?php echo $base_url . 'uploads/Deposite/Deposite_Slip/' . trim($depositDetailsData['Deposite_Slip'] ? $depositDetailsData['Deposite_Slip'] : 'avater.jpg') ?>">
            </div>

        </div>
        <div class="form-group">
            <label for="Short_Description">Short Description</label>
            <p> <?php echo $depositDetailsData['Short_Description']; ?> </p>
        </div>
        <?php
if ($depositDetailsData['Verification'] == 0) {
    foreach ($selectedUserIds as $selectedUserId) {
        foreach ($selectedMonths as $selectedMonth) {
            ?>
        <div class="user-month-name-image-container">
            <img src="<?=$base_url?>uploads/User/Image/<?=$userListArr[$selectedUserId]['Image'] ? trim($userListArr[$selectedUserId]['Image']) : 'avater.jpg';?>"
                alt="image">
            <div class="user-name"><?=$userListArr[$selectedUserId]['Name']?></div>
            <div class="monthName">
                <?=$MonthYearListMap[$selectedMonth]['month_name'] . " " . $MonthYearListMap[$selectedMonth]['year']?>
            </div>
        </div>
        <div class="form-group">
            <label for="user-amount ">Amount </label>
            <input type="Number" required="required" class="form-control" required="true" value="5000"
                name="user-<?=$selectedUserId?>-month-<?=$selectedMonth?>-amount" placeholder="5000">
        </div>
        <div class="form-group">
            <label for="late fine ">Late fine </label>
            <input type="Number" class="form-control"
                name="user-<?=$selectedUserId?>-month-<?=$selectedMonth?>-late-fine" placeholder="500">
        </div>
        <?php }
    }?>
        <button type="submit" class="btn btn-primary" value="<?php echo $depositDetailsData['Deposite_ID']; ?>"
            name='Deposite_ID'>Verify</button>
        <?php
}?>
    </form>
</div>

<?php
require_once '../footer.php';
?>