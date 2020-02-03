<?php

function dataMapByUniqeField($fieldName, $datas)
{
    $returnArr = array();
    foreach ($datas as $data) {
        $returnArr[$data[$fieldName]] = $data;
    }

    return $returnArr;
}