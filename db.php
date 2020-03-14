<?php

$db = mysqli_connect("localhost", "poweojrb_clinicux", ")NQq9.]qv(tO", "poweojrb_clinic");

if (mysqli_connect_errno()) {
    echo "failed to connect to MySQL:" . mysqli_connect_error();
}

function updateData($tableName = "", $data = array(), $condition = array())
{
    $sql = updateSql($tableName, $data, $condition);
    return $GLOBALS['db']->query($sql);
}

function insetrtDataFunc($tableName = "", $data = array())
{
    $sql = insetrtDataSql($tableName, $data);
    return $GLOBALS['db']->query($sql);
}

function getUserDepositTableOverview()
{
    $sql = "select month, count(user_id) as number_of_user , sum(amount) as monthly_amount  from  user_deposite group by month order by month;";
    $dataObj = $GLOBALS['db']->query($sql);
    $dataArr = array();

    if ($dataObj->num_rows > 0) {
        while ($row = $dataObj->fetch_assoc()) {
            $dataArr[] = $row;
        }
    }
    return $dataArr;
}

function getTotalOverVewPerMoth($monthYearid)
{
    $sql = "select month, amount, user_id, late_fine, deposit_id  from  user_deposite  where  month=" . $monthYearid . ";";
    $dataObj = $GLOBALS['db']->query($sql);
    $dataArr = array();
    if ($dataObj->num_rows > 0) {
        while ($row = $dataObj->fetch_assoc()) {
            $dataArr[] = $row;
        }
    }
    return $dataArr;
}

function getTotalAmountPerMoth($monthYearid)
{
    $sql = "select  sum(amount) as total from  user_deposite where  month=" . $monthYearid . ";";
    $dataObj = $GLOBALS['db']->query($sql);
    if ($dataObj->num_rows > 0) {
        return $dataObj->fetch_assoc();
    }
    return 0;
}

function getDepositDetails($depositId)
{
    $sql = "select month, amount, user_id, late_fine, deposit_id  from  user_deposite  where  deposit_id=" . $depositId . ";";
    $dataObj = $GLOBALS['db']->query($sql);
    $dataArr = array();
    if ($dataObj->num_rows > 0) {
        while ($row = $dataObj->fetch_assoc()) {
            $dataArr[] = $row;
        }
    }
    return $dataArr;

}

function getTotalAmount()
{
    $sql = "select  sum(amount) as total from  user_deposite ;";
    $dataObj = $GLOBALS['db']->query($sql);
    if ($dataObj->num_rows > 0) {
        return $dataObj->fetch_assoc();
    }
    return 0;
}

function getTotalActiveUser()
{
    $sql = "select  count( USER_ID ) as totalUser from  user where Status=1 ;";
    $dataObj = $GLOBALS['db']->query($sql);
    if ($dataObj->num_rows > 0) {
        return $dataObj->fetch_assoc();
    }
    return 0;
}

function dataFetchUsingTable($tableName = "", $selectedFieldList = array(), $conditionFielArr = array())
{
    $sql = fetchAllDataById($tableName, $selectedFieldList, $conditionFielArr);
    $dataObj = $GLOBALS['db']->query($sql);
    $dataArr = array();

    if ($dataObj->num_rows > 0) {
        while ($row = $dataObj->fetch_assoc()) {
            $dataArr[] = $row;
        }
    }

    return $dataArr;
}

function insetrtDataSql($tableName = "", $data = array())
{
    $sqlStr = "";
    $valueStr = "";
    $fieldStr = "";

    if ($tableName) {
        $sqlStr = 'INSERT INTO ' . $tableName;
    }

    if (sizeof($data)) {
        $valueArr = array();
        $fieldArr = array();

        foreach ($data as $key => $value) {
            $valueArr[] = "'" . $value . "'";
            $fieldArr[] = $key;
        }
        $valueStr = ' VALUES ( ' . implode(" , ", $valueArr) . ' ) ;';
        $fieldStr = ' ( ' . implode(" , ", $fieldArr) . ' ) ';
    }

    if ($sqlStr) {
        $sqlStr .= $fieldStr . " " . $valueStr;
        return $sqlStr;
    }

    return "";

}

function updateSql($tableName = "", $data = array(), $condition = array())
{

    $sqlStr = "";
    $setStr = "";
    $conditionSql = "";

    if ($tableName) {
        $sqlStr = 'UPDATE ' . $tableName;
    }

    if (sizeof($data)) {
        $setArr = array();
        foreach ($data as $key => $value) {
            $setArr[] = " " . $key . " ='" . $value . "' ";
        }
        $setStr = ' SET  ' . implode(" , ", $setArr) . '  ';
    }

    if (sizeof($condition)) {
        $conditionItemStringArr = array();
        foreach ($condition as $item) {
            $conditionItemStringArr[] = " " . $item['fieldName'] . " " . $item['symbol'] . " '" . $item['value'] . "'";
        }

        if (sizeof($conditionItemStringArr)) {
            $conditionSql = " WHERE " . implode(" , ", $conditionItemStringArr);
        }
    }

    if ($sqlStr) {
        $sqlStr .= " " . $setStr . " " . $conditionSql;
        return $sqlStr;
    }
    return "";

}

function fetchAllDataById($tableName = "", $selectedFieldList = array(), $conditionFielArr = array())
{
    $returnSql = "";
    if (sizeof($selectedFieldList)) {
        $returnSql = "SELECT " . implode(" , ", $selectedFieldList) . " FROM ";
    } else {
        $returnSql = "SELECT * FROM ";
    }
    $conditionSql = "";
    if (sizeof($conditionFielArr)) {
        $conditionItemStringArr = array();
        foreach ($conditionFielArr as $item) {
            $conditionItemStringArr[] = " " . $item['fieldName'] . " " . $item['symbol'] . " '" . $item['value'] . "'";
        }

        if (sizeof($conditionItemStringArr)) {
            $conditionSql = " WHERE " . implode(" , ", $conditionItemStringArr);
        }
    }

    if ($tableName) {
        $returnSql .= $tableName . " " . $conditionSql . " ;";
        return $returnSql;
    } else {
        return false;
    }
}