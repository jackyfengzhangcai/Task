<?php
include_once "jacky.php";
$db = new DB;
$result = $db->get("select * from tasks where id = ".$_REQUEST["id"]);
echo json_encode($result["data"][0]);
?>
