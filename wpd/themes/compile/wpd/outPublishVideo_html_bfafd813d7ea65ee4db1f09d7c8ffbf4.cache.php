<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-02 14:22:48-->

<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>/css/style.css">
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
      <div class="link-box">
        <span class="link-label">直播发布地址：</span>
        <input type="text" value="<?php echo $rtmpPublishUrl;?>" id="rtmpUrl" style="color:#666;" class="fl">
        <span class="btn-big btn-red" id="rtmpUrlCopyBtn">复制</span>
        <div class="clearfix"></div>
      </div>
      <div class="desc">将发布地址复制到发布软件或发布设备中进行发布！</div>
      <div class="publish-box">
        <div class="publish-lable">
          <p>发布引导</p>
        </div>
        <div class="publish-desc">
          <ul>
            <li> <span>选择发布场景：</span>
              <select id="publishType" onChange="selectPublishType(this.value);">
                <option value="KTV上麦伴唱">KTV上麦伴唱</option>
                <option value="OBS直播软件">OBS直播软件</option>
                <option value="手机移动直播">手机移动直播</option>
                <option value="专业摄像机直播">专业摄像机直播</option>
                <option value="监控摄像头直播">监控摄像头直播</option>
              </select>
            </li>
            <li> <span>推荐发布软件：</span> <span id="publishTypeName"></span></li>
            <li> <span>使用帮助链接：</span> <span id="publishTypeHelp"></span></li>
          </ul>
        </div>
      </div>
      <div class="clearfix"></div>
</div>
<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo SYSTEM_HOST;?>/static/Clipboard/ZeroClipboard.js"></script>
<script type="text/javascript">
$(function(){
  ZeroClipboard.setMoviePath('<?php echo SYSTEM_HOST;?>/static/Clipboard/ZeroClipboard.swf');
	selectPublishType($('#publishType').val());
	clipboard($('#rtmpUrl').val(),'rtmpUrlCopyBtn','复制成功');
})
function selectPublishType(type){
	if(type == 'KTV上麦伴唱'){
    	$('#publishTypeName').html('<img src="<?php echo WPD_ASSETS_PATH;?>/img/u71.png" /> <a href="http://help.aodianyun.com/resource/livePubTool.zip" target="_blank">奥点云直播客户端</a>');
    	$('#publishTypeHelp').html('<a href="http://help.aodianyun.com/ylmt_soft22.html" target="_blank">如何使用奥点云直播客户端进行直播</a>');
    }
	else if(type == 'OBS直播软件'){
    	$('#publishTypeName').html('<img src="<?php echo WPD_ASSETS_PATH;?>/img/u71.png" /> <a href="https://obsproject.com/download" target="_blank">OBS直播软件</a>');
    	$('#publishTypeHelp').html('<a href="http://help.aodianyun.com/ylmt_soft01.html" target="_blank">如何使用OBS直播软件进行直播</a>');
    }
    else if(type == '手机移动直播'){
    	$('#publishTypeName').html('<img src="<?php echo WPD_ASSETS_PATH;?>/img/u71.png" /> 安卓：<a href="http://help.aodianyun.com/resource/com.xrapps.vplus-1.apk" target="_blank">video broadcaster</a>&nbsp;&nbsp;IOS：Broadcast me(App Store下载)');
    	$('#publishTypeHelp').html('<a href="http://help.aodianyun.com/ylmt_soft12.html" target="_blank">如何使用Broadcast me/video broadcaster进行直播</a>');
    }
    else if(type == '专业摄像机直播'){
    	$('#publishTypeName').html('');
    	$('#publishTypeHelp').html('<a href="http://help.aodianyun.com/ylmt_soft13.html" target="_blank">如何使用专业摄像机进行直播</a>');
    }
    else if(type == '监控摄像头直播'){
    	$('#publishTypeName').html('<img src="<?php echo WPD_ASSETS_PATH;?>/img/u71.png" /> <a href="http://help.aodianyun.com/resource/anaCamera.zip" target="_blank">模拟监控直播客户端</a>&nbsp;&nbsp;<a href="http://help.aodianyun.com/resource/ipCamera.zip" target="_blank">数字IP监控直播客户端</a>');
    	$('#publishTypeHelp').html('<a href="http://www.aodianyun.com/solution5.html" target="_blank">如何使用模拟监控直播客户端/数字IP监控直播客户端进行直播</a>');
    }
}
function clipboard(text,button,msg) {
	if(window.clipboardData){        //for ie
		var copyBtn = document.getElementById(button);
		copyBtn.onclick = function(){
		window.clipboardData.setData('text',text);
		alert(msg);
		}
	}else{
		var clip = new ZeroClipboard.Client(); // 新建一个对象
		clip.setHandCursor( true );
		clip.setText(text); // 设置要复制的文本。
		clip.addEventListener( "mouseUp", function(client) {
			alert(msg);
		});
		// 注册一个 button，参数为 id。点击这个 button 就会复制。
		//这个 button 不一定要求是一个 input 按钮，也可以是其他 DOM 元素。
		clip.glue(button); // 和上一句位置不可调换
	}
	return false;
}
</script>
</body>
</html>