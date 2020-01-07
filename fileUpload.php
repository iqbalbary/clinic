<?php

function fileUpload( $fieldName=""){

	$target_dir = "uploads/". $fieldName."/".time();
	$target_file = $target_dir . basename($_FILES[$fieldName]["name"]);
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	if ($_FILES[$fieldName]["size"] > 500000) {
	    echo "Sorry, your file is too large.";
	}

echo $target_file;
	if (move_uploaded_file($_FILES[$fieldName]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

	$returnArr = array(
	"staus"=> false
	);
return $returnArr;
}