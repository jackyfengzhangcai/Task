fuck
<?php
/**
 * 
 * @authors Jacky Feng (499042532@qq.com)
 * @date    2017-09-23 10:56:43
 */
include_once "jacky.php";
include_once "configs.php";
$db = new DB($db_array);
$result = $db->get("select * from tasks");
$array = [];
foreach ($result["data"] as $key => $value) {
	$array[] = '<li id="'.$value["id"].'" onclick="toInfo(this.id)" style="display: flex;flex-direction: row;width: 100%;padding:5px 20px 5px 15px">
				<img style="width: 60px;height: 60px;border-radius: 15%;" src="'.$value["img"].'">
				<div style="width: calc(100% - 130px);margin-left: 10px;">
					<div style="margin-top: 5px;font-weight:bold;">'.$value["name"].'</div>
					<div style="margin-top: 2px;font-size: 15px;color: #aaa;">'.$value["info"].'</div>
				</div>
				<div style="width: 60px;height: 60px;display:flex;align-items: center;">￥'.$value["price"].'</div>
				</li>';
}
echo json_encode($array);