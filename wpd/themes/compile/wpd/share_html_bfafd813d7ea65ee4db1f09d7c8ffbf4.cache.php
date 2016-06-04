<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-04 16:32:36-->

<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
	<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
    <link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/style.css">
</head>
<style>
html,body{
	width:100%;
	height:100%;
	background:#ffffff;
	margin:0;
	padding:0;
}
.share-box .share-label{
  font-size: 16px;
  color: #333;
}
.share-box .btn2{
  margin-left: 10px;
  margin-top:-3px;
}
</style>
<body>
<p class="share-box">
  <span class="share-label"><?php if($type == 'channel') { ?>频道地址：<?php } elseif ($type == 'party') { ?>活动地址：<?php } ?></span><input type="text" value="<?php echo $url;?>" id="url" onclick="this.select();"><span id="copy" class="btn-big btn-red ml10">复制</span>
</p>
<div class="bdsharebuttonbox share-box" data-tag="share_1" style="margin-top: 30px;">
  <span class="share-label" style="float: left; margin-top: 10px; margin-right: 17px;">分享到：</span>
  <a class="bds_weixin" data-cmd="weixin" href="#"></a>
  <a class="bds_qzone" data-cmd="qzone" href="#"></a>
  <a class="bds_tsina" data-cmd="tsina"></a>
  <a class="bds_tqq" data-cmd="tqq"></a>
  <a class="bds_renren" data-cmd="renren"></a>
  <a class="bds_kaixin001" data-cmd="kaixin001"></a>
  <a class="bds_douban" data-cmd="douban"></a>
</div>
<script type="text/javascript" src="<?php echo SYSTEM_HOST;?>/static/Clipboard/ZeroClipboard.js"></script>
<script type="text/javascript">
ZeroClipboard.setMoviePath('<?php echo SYSTEM_HOST;?>/static/Clipboard/ZeroClipboard.swf');
var text = document.getElementById('url').value;
clipboard(text,'copy','分享链接复制成功');
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
window._bd_share_config = {
  common : {
    bdText : '<?php echo $title;?>', 
    bdDesc : '<?php echo $desc;?>', 
    bdUrl : '<?php echo $url;?>',   
    bdPic : 'http://wx.aodianyun.com/pic/qrcode.php?level=L&size=10&text=<?php echo urlencode($url);;?>'
  },
  share : [{
    "bdSize" : 32
  }],
  image : [{
    viewType : 'list',
    viewPos : 'top',
    viewColor : 'black',
    viewSize : '16',
    viewList : ['weixin','qzone','tsina','kaixin001','tqq','renren','douban']
  }]
}
with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?cdnversion='+~(-new Date()/36e5)];
</script>
</body>
</html>