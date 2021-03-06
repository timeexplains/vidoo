<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html lang="en">

<!--template compile at 2016-06-04 11:21:11-->

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
</head>
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/login.css">
<style type="text/css">
	html,body{width: 100%;height: 100%; }
	.top{height: 5%;}
	.picScroll-left{width: 100%;height: 95%;}
	.loginBox4 {
	    background: rgba(0, 0, 0, 0) url("<?php echo WPD_ASSETS_PATH;?>img/ewmbg.png") repeat scroll 430px 430px;
	    right:20%;
	    bottom: 20%;
	    color: #fff;
	    height: 430px;
	    overflow: hidden;
	    position: absolute;
	    text-align: center;
	    width: 430px;
	    z-index: 1;
	}
</style>
<body style="overflow:hidden;">

<div class="top">
	<div class="topcont">
		<div class="logo">
		<?php if(empty($serviceInfo['logoUrl'])) { ?>
			<img src="<?php echo WPD_ASSETS_PATH;?>img/logo.png" width="177" height="54">
		<?php } else { ?>
			<img src="<?php echo $serviceInfo['logoUrl'];?>" width="177" height="54">
		<?php } ?>
		</div> 
	</div>
</div> 

<div class="picScroll-left">
	<div class="bd">
		<div style="clear: both;background:#3f3f3f;height: 1px"></div>
		<ul class="picList" style="width: 100%;height:100%; position: relative; overflow: hidden; padding: 0px; margin: 0px;">
		<?php if(empty($serviceInfo['bgUrl'])) { ?>
			<li style="width: 100%;height:100%;">
				<div class="loginBox1" id="loginBox1" >
					<div class="title" style="font-size:20px;color:#373737; margin-top:10px;">微信登录</div>
					<img src=http://wx.aodianyun.com/pic/qrcode.php?level=L&amp;size=10&amp;text=<?php echo $url;?> style="width:280px;height:280px; margin-top: 20px;" />
					<div style="color:#373737; margin-top:10px;">请使用微信扫描二维码登录</div>
				</div>
				<img  src="<?php echo WPD_ASSETS_PATH;?>img/banner1.jpg">					
			</li>
			<li style="width: 100%;height:100%;">
				<div class="loginBox2" id="loginBox2" >
					<div class="title" style="font-size:20px;color:#373737; margin-top:10px;">微信登录</div>
					<img src=http://wx.aodianyun.com/pic/qrcode.php?level=L&amp;size=10&amp;text=<?php echo $url;?> style="width:280px;height:280px; margin-top: 20px;" />
					<div style="color:#373737; margin-top:10px;">请使用微信扫描二维码登录</div>
				</div>
				<img src="<?php echo WPD_ASSETS_PATH;?>img/banner2.jpg">				
			</li>
			<li style="width: 100%;height:100%;">
				<div class="loginBox3" id="loginBox3" >
					<div class="title" style="font-size:20px;color:#373737; margin-top:10px;">微信登录</div>
					<img src=http://wx.aodianyun.com/pic/qrcode.php?level=L&amp;size=10&amp;text=<?php echo $url;?> style="width:280px;height:280px; margin-top: 20px;" />
					<div style="color:#373737; margin-top:10px;">请使用微信扫描二维码登录</div>
				</div>
				<img src="<?php echo WPD_ASSETS_PATH;?>img/banner3.jpg">
			</li>
		<?php } else { ?>
			<li style="width: 100%;height:100%;">
				<div class="loginBox4">
					<div class="title" style="font-size:20px;color:#373737; margin-top:10px;">微信登录</div>
					<img src=http://wx.aodianyun.com/pic/qrcode.php?level=L&amp;size=10&amp;text=<?php echo $url;?> style="width:280px;height:280px; margin-top: 20px;" />
					<div style="color:#373737; margin-top:10px;">请使用微信扫描二维码登录</div>
				</div>
				<img  src="<?php echo $serviceInfo['bgUrl'];?>">					
			</li>
		<?php } ?>
		</ul>
	</div>
</div>
 
<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WPD_ASSETS_PATH;?>js/jquery.SuperSlide.2.1.1.js"></script>
<script src="http://res.wx.qq.com/connect/zh_CN/htmledition/js/wxLogin.js"></script>
<script type="text/javascript" src="http://cdn.aodianyun.com/dms/rop_client.js"></script>
<script type="text/javascript">
jQuery(".picScroll-left").slide({mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,delayTime:1000,mouseOverStop:false});
var topic = '<?php echo $topic;?>';
var secKey = '<?php echo $serviceInfo["secKey"];?>';
var funInterval = setInterval(funLoad,100);
function funLoad(){
	if(typeof(ROP) != 'undefined'){
		clearInterval(funInterval);
		ROP.Enter('pub_b096fd62-0133-7821-d97f-43be9c20ab9b','sub_7fe85a0e-d133-7821-d97f-43a53506baee');
	}
}
ROP.On("enter_suc",function(){
	ROP.Subscribe(topic);
})
ROP.On("enter_fail",function(err){
	alert('服务器繁忙，请刷新页面再试！');
})
ROP.On("publish_data",function(data,topic){
	data = $.parseJSON(data);console.log(data);
	if(typeof(data.openid) == 'undefined' || data.openid == ''){
		alert('服务器繁忙，请刷新页面再试！');
		return;
	}
	window.location = '<?php echo SYSTEM_HOST;?>/openlogin/wpdBridge.php?secKey=' + secKey + '&openid=' + data.openid + '&unionid=' + data.unionid + '&nick=' + data.nick + '&picurl=' + data.picurl;
})
ROP.On("losed",function(){
})
</script>
</body>
</html>
