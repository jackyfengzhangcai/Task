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
var id = "<?php echo $_REQUEST['id']; ?>";
$(function(){
$.ajax({
url:'get_info.php?id='+id,
type:'post',
dataType:'json',
data:"",
success:function(res){
$("#top_info").append('<div id="'+res["id"]+'" onclick="toInfo(this.id)" style="display:'+
'flex;flex-direction: row;width: calc(100% - 80px); margin-left:20px;margin-right:20px;padding:5px 20px 5px 15px;background-color:#fff;box-shadow:0px 0px 10px 1px #abcdef;">'+
'<img style="width: 60px;height: 60px;border-radius: 15%;" src="'+res["img"]+'">'+
'<div style="width: calc(100% - 125px);margin-left: 10px;">'+
'<div style="margin-top: 5px;font-weight:bold;">'+res["name"]+'</div>'+
'<div style="margin-top: 2px;font-size: 15px;color: #aaa;">'+res["info"]+'</div>'+
'</div>'+
'<div style="width: 60px;height: 60px;display:flex;align-items: center;">￥'+res["price"]+'</div>'+
'</div>');
$("#step_box").append('<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">须知</span>'+
'<span style="color:red;width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["note"]+'</span>'+
'</div>');
if(res["step1"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第一步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step1"]+'</span>'+
'</div>');
}
if(res["step2"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第二步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step2"]+'</span>'+
'</div>');
}
if(res["step3"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第三步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step3"]+'</span>'+
'</div>');
}
if(res["step4"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第四步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step4"]+'</span>'+
'</div>');
}
if(res["step5"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第五步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step5"]+'</span>'+
'</div>');
}
if(res["step6"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第六步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step6"]+'</span>'+
'</div>');
}
if(res["step7"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第七步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step7"]+'</span>'+
'</div>');
}
if(res["step8"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第八步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step8"]+'</span>'+
'</div>');
}
if(res["step9"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第九步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step9"]+'</span>'+
'</div>');
}
if(res["step10"]!=""){
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:ju'+
'stify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">第十步</span>'+
'<span style="width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+res["step10"]+'</span>'+
'</div>');
}
var step_photo_num = 0;
var photo = "";
if(res["img10"]!=""){
	step_photo_num=10;
}else if(res["img9"]!=""){
	step_photo_num=9;
}else if(res["img8"]!=""){
	step_photo_num=8;
}else if(res["img7"]!=""){
	step_photo_num=7;
}else if(res["img6"]!=""){
	step_photo_num=6;
}else if(res["img5"]!=""){
	step_photo_num=5;
}else if(res["img4"]!=""){
	step_photo_num=4;
}else if(res["img3"]!=""){
	step_photo_num=3;
}else if(res["img2"]!=""){
	step_photo_num=2;
}else if(res["img1"]!=""){
	step_photo_num=1;
}
for(var i = 1 ; i <= step_photo_num ; i++){
	photo += '<img style="width: 70px;height: 70px;margin-right:10px;" src="'+res["img"+i]+'">';
}
console.log(step_photo_num);
var width=(step_photo_num * 80) + "px";
$("#step_box").append(
'<div style="display: flex;margin:20px 20px 20px 20px;">'+
		'<span style="color:#aaa;width:60px;text-align:justify;text-justify:distribute-all-lines;text-align-last:justify;-moz-text-align-last:justify;-webkit-text-align-last:justify;">截图</span>'+
	'<span id="box" style="overflow: hidden;position: relative;width:calc(100% - 60px);margin:0px 0px 0px 20px;">'+
		'<div id="slide" style="position:relative;display:inline-block;width:'+width+';height: 70px;">'+

		'</div>'+
	'</span>'+
	'</div>'+
'</div>'
	);
$("#slide").append(photo);
var $div = $("#slide");
$div.bind("touchstart",function(event){
//控件当前位置
var now_x=$(this)[0].offsetLeft;
//鼠标点击的位置
var start_x = event.originalEvent.touches[0].pageX;
$(document).bind("touchmove",function(event){
//鼠标移动的位置
var move_x = event.originalEvent.touches[0].pageX;
//移动的位置差
var x = move_x-start_x;
//停止的位置
var stop_x = ( now_x + x );
//图片容器的宽度
var sw = $("#slide").width();
//大容器的宽度
var bw = $("#box").width();
if(stop_x>0){
$div.css({
left:"0px"
});
return;
}else if(stop_x<-(sw-bw)+5){
$div.css({
left:-(sw-bw)+5+"px"
});
return;
}else{
$div.css({
left:stop_x+"px"
});
return;
}
});
});
$(document).bind("touchend",function(){
$(this).unbind("touchmove");
});

}
});
$("#back").click(function(){
window.history.back();
})
});
</script>
<body>
<div id="top" style="background-color: green;height: 50px;width:100%;position: fixed;top: 0px;">
<a><img id="back" style="margin-top: 9px;margin-left:20px;width: 32px;height: 32px;" src="3.png"></a>
</div>
<div id="top_hidden" style="height: 50px;">

</div>
<div id="top_info" style="height:25px;background-color:green;">

</div>
<button style="margin-top: 50px;width: 100%;height: 50px;">
风险保障转款 ￥12795.13
</button>
<div id="step_box">

</div>
</body>
</html>
