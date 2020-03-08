<?php
require_once('session.php');
session_destroy();
header("Location: " . $base_url . "index.php");
exit;
