<?php
//Dashboard
require_once '../session.php';
isAuthorize();
require_once '../helper.php';
$monthYearid = "";
if (isset($_GET['monthYear'])) {
    $monthYearid = $_GET['monthYear'];
}
if ($monthYearid) {
    $datas = getTotalOverVewPerMoth($monthYearid);
    $datasMap = dataMapByUniqeField("user_id", $datas);

    $userListArr = dataFetchUsingTable("user", array('USER_ID', "Image", "Name"));
    $userDataMap = dataMapByUniqeField("USER_ID", $userListArr);

    $MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
    $MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);
    $total = getTotalAmountPerMoth($monthYearid);
    $totalUser = getTotalActiveUser();
} else {
    header("Location: " . $base_url . "index.php");
    exit;
}
require_once '../header.php';
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h3>Total Active User: <?=$totalUser['totalUser']?> </h3>
            <h3>Total Amount : <?=$total['total']?> TK for
                <?=$MonthYearListMap[$monthYearid]["month_name"] . ", " . $MonthYearListMap[$monthYearid]["year"]?>
            </h3>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>List of payment Per month(last 10 month)</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>User </th>
                        <th> Amount </th>
                        <th>Late fine</th>
                        <th>Reference </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($userDataMap as $userData) {?>
                    <tr>
                        <td>
                            <a href="<?=$base_url;?>user/view-user.php?id=<?=$userData['USER_ID']?>">
                                <?=$userData["Name"]?>
                            </a>
                        </td>
                        <td>
                            <?=@$datasMap[$userData['USER_ID']]['amount']?>
                        </td>
                        <td><?=@$datasMap[$userData['USER_ID']]['late_fine']?></td>
                        <td>
                            <?php if (isset($datasMap[$userData['USER_ID']])) {?>
                            <a
                                href="<?=$base_url;?>deposit/view-deposit.php?deposit-id=<?=@$datasMap[$userData['USER_ID']]['deposit_id']?>">
                                Deposit Link <?=@$datasMap[$userData['USER_ID']]['deposit_id']?>
                            </a>
                            <?php } else {?>
                            Not deposit till now
                            <?php }?>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php
require_once '../footer.php';