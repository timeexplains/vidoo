<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-02 14:22:47-->

<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>/css/index.css">
</head>
<style>
html,body{
	width:100%;
	height:100%;
	background:#ffffff;
	margin:0;
	padding:0;
}
</style>
<body>
<div class="lcps-panes">
      <div class="desc">
        下载手机直播APP后<br>
        使用直播APP扫描下方的二维码即可进行直播发布
      </div>
      <div class="publish-box">
        <div class="publish-lable">
          <p>发布引导</p>
        </div>
        <div class="phone-publish-qrcode">
          <img src=http://wx.aodianyun.com/pic/qrcode.php?level=L&amp;size=10&amp;text=<?php echo $url;?>>
        </div>
        <div class="phone-publish-info">
          <p><b>推荐发布软件：</b></p>
          <p>
            <a href="#" onclick="downApp();return false;">
              <img src="<?php echo WPD_ASSETS_PATH;?>/img/andriodIco.gif" style="float:left;border:none;">
              <span style="float:left; margin-left:5px; margin-top: 2px;">手机直播工具</span>
              <img src="<?php echo WPD_ASSETS_PATH;?>/img/ewmIcon.gif" style="float:left; margin-left:5px; margin-top: 5px;border:none;">
              <div class="clearfix"></div>
            </a>
          </p>
          <!--<p><b>使用帮助链接：</b><a href="#" target="_blank">>如何用手机进行流媒体直播</a></p>-->
        </div>
        <div class="clearfix"></div>
      </div>
</div>
<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
function downApp(){
  var html = '\
        <center>\
          <h3>手机扫一扫下载APP</h3><br>\
          <img src=http://wx.aodianyun.com/pic/qrcode.php?level=L&amp;size=10&amp;text=<?php echo urlencode('http://help.aodianyun.com/resource/adyun_wsp.apk');;?> width="150" height="150">\
          <p style="font-size:12px;color:#666;">请通过手机浏览器扫码，不要在微信中扫码</p>\
        </center>\
  ';
  window.parent.dlg(500,400,'下载APP',html,function(){
      window.parent.dlgClose();
  });
}
</script>
</body>
</html>