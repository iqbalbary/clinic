<?php
//Deposit Lists
require_once('../session.php');
isAuthorize();
require_once '../helper.php';
$userListArr = dataFetchUsingTable("User", array('USER_ID', "Image", "Name"));
$userDataMap = dataMapByUniqeField("USER_ID", $userListArr);

$depositList = dataFetchUsingTable("deposite", array("*"));

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
                        <th>Slip Image </th>
                        <th>staus</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($depositList as $data) : ?>
                        <tr>
                            <td> <?= $userDataMap[$data['submission_id']]['Name']; ?> </td>
                            <td>
                                <?php
                                $userProfileArr = explode(",", $data['Profile_ID']);
                                $userNameArr = array();
                                foreach ($userProfileArr as $item) {
                                    $userNameArr[] = $userDataMap[$item]['Name'];
                                }
                                echo implode(", ", $userNameArr);
                                ?>
                            </td>
                            <td>
                                <?php
                                $selectetMonthArr = $data['Month'] ? explode(",", $data['Month']) : array();
                                $monthArr = array();
                                foreach ($selectetMonthArr as $item) {
                                    $monthArr[] = $monthArray[$item];
                                }
                                echo implode(", ", $monthArr);
                                ?>
                            </td>
                            <td> <?= $data['Amount']; ?> </td>
                            <td> <img src="<?= $base_url . "uploads/Deposite/Deposite_Slip/" . $data['Deposite_Slip']; ?>" alt="slipimage"> </td>
                            <td> <a href="<?= $base_url ?>deposit/verify-deposit.php?deposit-id=<?= $data['Deposite_ID'] ?>">
                                    <?= ($data['Verification']) ? " Verified " : "Not varified" ?> </a>
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
