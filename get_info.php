<?php
/**
 * 
 * @authors Jacky Feng (499042532@qq.com)
 * @date    2017-09-23 11:48:59
 */
include_once "jacky.php";
include_once "configs.php";
$db = new DB($db_array);
$result = $db->get("select * from tasks where id = ".$_REQUEST["id"]);
echo json_encode($result["data"][0]);