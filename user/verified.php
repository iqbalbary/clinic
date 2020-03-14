<?php
require_once '../session.php';
isAdminUser();
$toVeryId = "";
if (isset($_GET['id'])) {
    $toVeryId = $_GET['id'];
} else {
    header("Location: " . $base_url . "index.php");
    exit;
}
$condition[] = array(
    'fieldName' => 'USER_ID',
    'symbol' => " = ",
    'value' => $toVeryId,
);
$depositDetailsDataArr = dataFetchUsingTable("user", array(), $condition);
if ($depositDetailsDataArr && $depositDetailsDataArr[0] && !$depositDetailsDataArr[0]['Verified']) {
    $condintion[] = array(
        'fieldName' => 'USER_ID',
        'symbol' => " = ",
        'value' => $toVeryId,
    );
    $updateData = array(
        "Verified" => 1,
        "Verification_ID" => $loginUserId,
        "Verification_date" => time(),
    );
    $updateFlag = updateData("user", $updateData, $condintion);
    if ($updateFlag) {
        header("Location: " . $base_url . "user/view-user.php?id=" . $toVeryId);
    } else {
        header("Location: " . $base_url . "user/view-user.php?id=" . $toVeryId);
    }
} else {
    header("Location: " . $base_url . "user/view-user.php?id=" . $toVeryId);
    exit;
}