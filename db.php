<?php 

 $db = mysqli_connect("localhost","root","12345678","clinic");

 if (mysqli_connect_errno()) 
 {
 	echo "failed to connect to MySQL:".mysqli_connect_error();
 }
 $monthArray = array(
     1 => 'January.',
     2 => 'February.',
     3 => 'March',
     4 => 'April',
     5 => 'May',
     6 => 'June',
     7 => 'July',
     8 => 'Augest',
     9 => 'September',
     10 => 'Octbpr',
     11 => 'November',
     12 => 'December'
    );


 function insetrtData ( $tableName="", $data=array()){
    $sqlStr = "";
    $valueStr = "";
    $fieldStr = "";

    if($tableName){
        $sqlStr = 'INSERT INTO ' . $tableName;
    }

    if(sizeof($data)){
        $valueArr = array();
        $fieldArr = array();

        foreach( $data as $key => $value){
            $valueArr[] = "'".$value."'";
            $fieldArr[] = $key;
        }
        $valueStr = ' VALUES ( ' . implode(" , ",$valueArr) . ' ) ;';
        $fieldStr = ' ( ' . implode(" , ",$fieldArr) . ' ) ';
    }

    if($sqlStr){
        $sqlStr .= $fieldStr . " " . $valueStr;
       return $sqlStr;
    }

    return "";
    
 }


 function updateSql ( $tableName= "", $data=array(), $condition=array()){

    $sqlStr = "";
    $setStr = "";
    $conditionSql = "";

    if($tableName){
        $sqlStr = 'UPDATE ' . $tableName;
    }

    if(sizeof($data)){
        $setArr = array();
        foreach( $data as $key => $value){
            $setArr[] = " ".$key." ='".$value."' ";
        }
        $setStr = ' SET  ' . implode(" , ",$setArr) . '  ';
    }

    if(sizeof($condition)){
        $conditionItemStringArr = array();
        foreach ($condition as  $item) {
            $conditionItemStringArr[] = " ". $item['fieldName'] . " " . $item['symbol'] . " '" . $item['value'] ."'";
        }

        if(sizeof($conditionItemStringArr)){
            $conditionSql = " WHERE " . implode(" , ", $conditionItemStringArr);
        }
    }

    if($sqlStr){
        $sqlStr .= " ". $setStr . " " . $conditionSql;
       return $sqlStr;
    }
    return "";


 }

 function fetchAllDataById($tableName="", $selectedFieldList=array(),  $conditionFielArr=array()  ){
// SELECT * FROM Customers WHERE Country='Mexico';
    $returnSql = "";
    if(sizeof($selectedFieldList)){
        $returnSql = "SELECT ". implode(" , ",$selectedFieldList) ." FROM ";
    }else{
        $returnSql = "SELECT * FROM ";
    }
 $conditionSql = "";
if(sizeof($conditionFielArr)){
    $conditionItemStringArr = array();
    foreach ($conditionFielArr as  $item) {
        $conditionItemStringArr[] = " ". $item['fieldName'] . " " . $item['symbol'] . " '" . $item['value'] ."'";
    }

    if(sizeof($conditionItemStringArr)){
        $conditionSql = " WHERE " . implode(" , ", $conditionItemStringArr);
    }
}

    if($tableName){
        $returnSql .=  $tableName." ". $conditionSql . " ;";
        return $returnSql;
    }else{
        return false;
    }
 }
?>