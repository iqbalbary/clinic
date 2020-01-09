<?php

function fileUpload( $target_dir,  $fieldName=""){

	$uploadFileName = time() . basename($_FILES[$fieldName]["name"]);
	$target_file = $target_dir ."/". $uploadFileName;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	$returnArr = array(
	"status"=> false
	);
	if ($_FILES[$fieldName]["size"] > 1000000) {
	    echo "Sorry, your file is too large.";
	}

	if(!is_dir (  $target_dir ) ){
		mkdir($target_dir, 0777, true);
	}
	if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) {
		$returnArr["fileName"] = $uploadFileName;
		$returnArr["status"] = true;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

	return  $returnArr;
}