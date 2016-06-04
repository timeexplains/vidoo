<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<html>

<!--template compile at 2016-06-04 16:33:28-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <link rel="stylesheet" type="text/css" href="<?php echo WSP_ASSETS_PATH;?>css/livestreamlayout.css"/>
<title><?php echo $channelInfo['title'];?></title>
</head>
<body>
<script type="text/javascript"> 
function wxLogin1(jason){
		var host = encodeURIComponent('http://' + window.location.host);
		if(typeof(jason.wxAppid) == 'undefined' || jason.wxAppid == ''){
			var wxLoginUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx4f394838f20e789c&redirect_uri=http%3A%2F%2Fwww.aodianyun.com%2Fopenlogin%2Fwx%2FwspLogin.php?partyId=' + jason.partyId + '&response_type=code&scope=snsapi_userinfo&state='+ host +'&connect_redirect=1#wechat_redirect';
		}
		else{
			if(!jason.redirect){
				var url = 'http%3A%2F%2Fwx.aodianyun.com%2Fopenlogin%2Fwx%2FwspLogin.php?partyId=' + jason.partyId;
			}
			else{
				var url = jason.redirect;
			}
			var wxLoginUrl = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' + jason.wxAppid + '&redirect_uri=' + url + '&response_type=code&scope=snsapi_userinfo&state='+ host +'&connect_redirect=1#wechat_redirect';
		}
		window.location = wxLoginUrl;
		return;
}
var partyId = <?php echo $activePartiesInfo['partyId'];?>;	
var jason={
  dmsAppKey:"<?php echo $serviceInfo['dmsAppKey'];?>",
  dmsPubKey:"<?php echo $serviceInfo['dmsPubKey'];?>",
  dmsSubKey:"<?php echo $serviceInfo['dmsSubKey'];?>",
  wxAppid:"<?php echo $serviceInfo['wxAppid'];?>",
  partyId:"<?php echo $activePartiesInfo['partyId'];?>",
  redirect:"<?php echo $redirect;?>"
};
if(typeof(jason.wxAppid) != 'undefined' && jason.wxAppid != '')
{
	wxLogin1(jason);
}
</script>	
</body>
</html>