<?php
// Add verify  Deposit
require_once('../session.php');
isAuthorize();
require_once '../helper.php';
$MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
$MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);

$userListData = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));
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
$selectedUserIds = explode(",", $depositDetailsData["Profile_ID"]);
$selectedMonths = explode(",", $depositDetailsData["Month"]);

$userDepositInfo =  getDepositDetails($depositId);
require '../header.php';

?>
<div class="container">
    <form action="" method='post'>
        <div class="form-group">
            <label for="Profile ID">Profile ID</label>
            <div class="profile-data-container">
                <div class="custom-input">
                    <?php
                    foreach ($selectedUserIds as $selectedUserId) { ?>
                        <div class="input-item-block">
                            <img src="<?php echo $base_url . 'uploads/User/Image/' . trim($userListArr[$selectedUserId]['Image'] ? $userListArr[$selectedUserId]['Image'] : 'avater.jpg') ?>">
                            <span> <?php echo $userListArr[$selectedUserId]['Name']; ?> </span>

                        </div>
                    <?php } ?>
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
                foreach ($selectedMonths as $selectedMonth) { ?>
                    <div class="input-item-block"> <?php echo $MonthYearListMap[$selectedMonth]['month_name'] . " " . $MonthYearListMap[$selectedMonth]['year']; ?> </div>
                <?php } ?>
            </div>
        </div>
        <div class="form-group">
            <div class="image-label-block">
                <label for="Deposite_Slip"> Deposite Slip </label>
                <img src="<?php echo $base_url . 'uploads/Deposite/Deposite_Slip/' . trim($depositDetailsData['Deposite_Slip'] ? $depositDetailsData['Deposite_Slip'] : 'avater.jpg') ?>">
            </div>

        </div>
        <div class="form-group">
            <label for="Short_Description">Short Description</label>
            <p> <?php echo $depositDetailsData['Short_Description']; ?> </p>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Deposit profile</th>
                    <th>Month</th>
                    <th>Amount</th>
                    <th>Late fine</th>
                    <th>Deposit image</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($userDepositInfo as $info) : ?>
                    <tr>
                        <td> <?= $userListArr[$info['user_id']]['Name'] ?> </td>
                        <td><?= $MonthYearListMap[$info["month"]]['month_name'] . " " . $MonthYearListMap[$info['month']]['year'] ?></td>
                        <td><?= $info["amount"] ?></td>
                        <td> <?= $info["late_fine"] ?> </td>
                        <td> <img src="<?= $base_url ?>uploads/User/Image/<?= $userListArr[$info['user_id']]['Image'] ? trim($userListArr[$info['user_id']]['Image']) : 'avater.jpg'; ?>"> </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="form-group">
            <label for="Verification_ID">Verified BY </label>
            <p> <?= $userListArr[$depositDetailsData['Verification_ID']]['Name']; ?>  on <?= date("Y-m-d", $depositDetailsData['Date']) ?>  </p>
        </div>
    </form>
</div>

<?php
require_once '../footer.php';
?>