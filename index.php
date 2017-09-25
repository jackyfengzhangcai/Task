<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport"
	content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no">
<title></title>
<style type="text/css">
*{
	margin: 0px;
	padding: 0px;
}
html{
	height: 100%;
	width: 100%;
	background-color:#eee; 
}
body{
	height: 100%;
	width: 100%;
	background-color:#eee; 
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" >
	$(function(){
		$.ajax({
			url:'get_all_tasks.php',
			type:'post',
			dataType:'json',
			data:"",
			success:function(res){
				for(var i = 0 ; i<res.length ; i++){
					$("#content").append(res[i]);
				}
			}});
	});
	function toInfo(id){
		window.location.href="info.php?id="+id;
	}
</script>
</head>
<body>
	<div id="top" style="background-color: #fff;height: 50px;width:100%;position: fixed;top: 0px;">
		<span style="position: absolute;top: calc(50% - 8px);left: calc(50% - 24px);">趣任务</span>
		<img style="width: 32px;height: 32px;position:absolute;right: 20px;top: calc(50% - 16px);" src="3.png">
	</div>
	<div id="top_hidden" style="height: 50px;"></div>
    <div id="content" style="height: auto;width: calc(100% - 35px);"></div>
    <div id="bottom_hidden" style="height: 50px;"></div>
    <div id="bottom" style="background-color: #fff;height: 50px;width:100%;position: fixed;bottom: 0px;display: flex;flex-direction: row;">
    		<a style="width: 50%;display: flex;flex-direction:column;align-items: center;justify-content: center;"><img style="width: 32px;height: 32px;" src="1.png">任务</a>
    		<a style="width: 50%;display: flex;flex-direction:column;align-items: center;justify-content: center;"><img style="width: 32px;height: 32px;" src="2.png">我的</a>
    </div>
</body>
</html>