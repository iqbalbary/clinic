<?php
// Edit Deposit - Only for Admin

require_once('../header.php');

if(!$isSession ){
    header("Location: ".$base_url."index.php");
}

require_once('../footer.php');