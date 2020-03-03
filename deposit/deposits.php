<?php
//Deposit Lists
require_once('../session.php');
isAuthorize();
require_once '../helper.php';
$userListArr = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));
$userDataMap = dataMapByUniqeField("USER_ID", $userListArr);
$depositList = dataFetchUsingTable("deposite", array("*"));

$MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
$MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);

require_once '../header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>List of payment</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Submit user </th>
                        <th>Deposit profile</th>
                        <th>Month</th>
                        <th>Amount</th>
                        <th>Late fine</th>
                        <th>Slip Image </th>
                        <th>staus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($depositList as $data) : ?>
                        <tr>
                            <td> <a href="<?= $base_url; ?>user/view-user.php?id=<?= $data['submission_id'] ?>"> <?= @$userDataMap[$data['submission_id']]['Name']; ?> <span> at <?= date("Y- m -d ", $data['Date']) ?></span> </a> </td>
                            <td>
                                <?php
                                $userProfileArr = explode(",", $data['Profile_ID']);
                                $userNameArr = array();
                                foreach ($userProfileArr as $item) {
                                    $userNameArr[] =  "<a href=" . $base_url . "user/view-user.php?id=" . $item . ">" . $userDataMap[$item]['Name'] . "</a>";
                                }
                                echo implode(", ", $userNameArr);
                                ?>
                            </td>
                            <td>
                                <?php
                                $selectetMonthArr = $data['Month'] ? explode(",", $data['Month']) : array();
                                $monthArr = array();
                                foreach ($selectetMonthArr as $item) {
                                    $monthArr[] = $MonthYearListMap[$item]['month_name'] . " , " . $MonthYearListMap[$item]['year'];
                                }
                                echo implode("<br> ", $monthArr);
                                ?>
                            </td>
                            <td> <?= $data['Amount']; ?> </td>
                            <td> <?= $data['late_fine']; ?> </td>
                            <td> <?php if($data['Deposite_Slip']){  ?>  <img src="<?= $base_url . "uploads/Deposite/Deposite_Slip/" . $data['Deposite_Slip']; ?>" alt="slipimage"> <?php } ?> </td>
                            <td>
                                <?php if ($data['Verification']) { ?>
                                    Verified <br> by <br> <span> <?= $userDataMap[$data['Verification_ID']]['Name'] ?> </span>
                                    <br>
                                    <a href="<?= $base_url ?>deposit/view-deposit.php?deposit-id=<?= $data['Deposite_ID'] ?>">
                                        Details
                                    </a>
                                    <?php } else {
                                    if ($userRole == 2) {
                                    ?>
                                        <a href="<?= $base_url ?>deposit/verify-deposit.php?deposit-id=<?= $data['Deposite_ID'] ?>">
                                            Not varified
                                        </a>
                                    <?php
                                    } else {
                                        echo "Not varified";
                                    }
                                    ?>
                                    <?php if ($data['submission_id'] == $loginUserId) { ?>
                                        <span> <a href="<?= $base_url ?>deposit/edit-deposit.php?deposit-id=<?= $data['Deposite_ID'] ?>">
                                                Edit
                                            </a> </span>
                                <?php }
                                } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php
require_once '../footer.php';
