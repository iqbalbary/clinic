<?php
session_start();
session_destroy();
require_once('header.php');
header("Location: " . $base_url . "index.php");
