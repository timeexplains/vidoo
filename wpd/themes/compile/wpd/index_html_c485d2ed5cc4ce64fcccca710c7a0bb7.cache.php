<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-02 14:22:59-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/channel.css">
</head>

<body>
<?php include(CTemplate::getInstance()->getfile('header.html')); ?> 

<!--内容部分-->
<div class="channel_con">
  <div class="channel_con_tt">
    <h1>频道设置</h1>
  </div>
  <div class="fgx"></div>
  <div class="channel_con_form">
   <form action="index.php?r=channel/edit&channelId=<?php echo $channelId;?>" method="post" enctype="multipart/form-data" onsubmit="return checkForm();">
    <div class="inputdiv"> <span>频道主题：</span>
      <input type="text" value="<?php echo $channelInfo['title'];?>" name="title" id="title" maxlength="20" placeholder="不超过20个字" style="color:#666;" class="inputbox">
    </div>
    <div class="inputdiv">
      <span>封面图片：</span>
          <img src="<?php echo $channelInfo['surfaceUrl'];?>" width="200" height="112">
          封面最佳尺寸：640×360
    </div>
    <div class="inputdiv">
      <span>上传新封面：</span>
      <input type="file" name="pic" id="pic">
    </div>
    <div class="clear"></div>
    <div class="spdb">
      <input type="submit" class="submit" value="确定" />
    </div>
   </form>
  </div>
</div>
<!--内容部分end--> 
<?php include(CTemplate::getInstance()->getfile('footer.html')); ?> 
<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script> 
<script type="text/javascript" src="http://cdn.aodianyun.com/lss/player.js"></script> 
<script type="text/javascript" src="<?php echo WPD_ASSETS_PATH;?>js/dlg.js"></script>
<script type="text/javascript">
function checkForm(){
  var title = $('#title').val();
  if(title == ''){
    dlgMsg(2,'提示','频道主题不能为空');
    return false;
  }
  if(title.length > 20){
    dlgMsg(2,'提示','频道主题不能超过20个字');
    return false;
  }
  return true;
}
</script>
</body>
</html>
