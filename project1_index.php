<?php
session_start();
error_reporting(E_ERROR);
require_once("./project1_layout/title.php");
require_once("./project1_layout/header.php");
if(file_exists("./project1_views/$_GET[action].php")) {
	require_once("./project1_views/$_GET[action].php");	
}
else {
require_once("./project1_views/main.php");
}
require_once("./project1_layout/footer.php");
?>