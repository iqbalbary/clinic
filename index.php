<?php
//Dashboard
require_once('session.php');
require_once('header.php');
require_once 'helper.php';
if ($isSession) {
    $datas  = getUserDepositTableOverview();
    $MonthYearListArr = dataFetchUsingTable("month_year", array('id', "month_name", "year"));
    $MonthYearListMap = dataMapByUniqeField("id", $MonthYearListArr);
    $total = getTotalAmount();
    $totalUser = getTotalActiveUser();
?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h3>Total Active User: <?= $totalUser['totalUser'] ?> </h3>
                <h3>Total Amount: <?= $total['total'] ?> TK</h3>
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
                            <th>Month</th>
                            <th>Number of participant</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($datas as $data) { ?>
                            <tr>
                                <td>
                                    <a href="<?= $base_url; ?>deposit/month-wise-deposit.php?monthYear=<?= $data['month'] ?>">
                                        <?= $MonthYearListMap[$data['month']]["month_name"] . ", " . $MonthYearListMap[$data['month']]["year"] ?>
                                    </a>
                                </td>
                                <td>
                                    <a href="<?= $base_url; ?>deposit/month-wise-deposit.php?monthYear=<?= $data['month'] ?>">
                                        <?= $data['number_of_user'] ?>
                                    </a>
                                </td>
                                <td><?= $data['monthly_amount'] ?></td>
                            </tr>
                        <?php  } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php

} else {
?>
    <div class="container">
        <a href="login.php"> Log In </a>
    </div>
<?php
}
require_once('footer.php');
