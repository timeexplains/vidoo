<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-03 20:19:52-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/partyList.css">
</head>
<body>
<?php include(CTemplate::getInstance()->getfile('header.html')); ?>
<div class="content">
  <div class="c_1">
    <div class="c_1_c">
      <h1>活动列表</h1>
    </div>
  </div> 
  <div class="c_2">
   <span class="sp1">活动主题 </span>
    <span class="sp2">活动时间</span> 
    <span class="sp3">封面图</span> 
    <span class="sp4">状态</span>
     <span class="sp5">操作</span> 
     </div>
  <div class="c_3">
    <ul>
    <?php if(is_array($partiesList)) {foreach((array)$partiesList as $val) {?>
    <li>
        <p class="sp1"><?php echo $val["title"];?></p>
        <p class="sp2"> <?php echo $val["startTime"];?> 至 <?php echo $val["etartTime"];?> </p>
        <p class="sp3"><img src="<?php echo $val["surfaceUrl"];?>" /></p>
        <?php if($val['state'] == 1) { ?>
       	 	<p class="sp4">进行中…</p>
        <?php } else { ?>
        	<p class="sp4">已结束</p>
        <?php } ?>
        <p class="sp5">
	        <a class="abj" href="index.php?r=party/editParty&channelId=<?php echo $channelId;?>&partyId=<?php echo $val['partyId'];?>"><span class="bj">编辑</span></a> 
	        <span class="afx fx" url="<?php echo $val['partyUrl'];?>" title="<?php echo urlencode($val['title']);?>" desc="<?php echo urlencode($val['title']);?>" img="<?php echo $val['surfaceUrl'];?>" style="cursor: pointer;">分享</span>
	        <span class="sc" onClick="deleteParty(<?php echo $val['partyId'];?>);" style="cursor: pointer;">删除</span>
        </p>
      </li>
     <?php }} ?>
     <li>
     <div class="party-pagination-container">
		<a href="<?php echo $preUrl;?>" onClick="prevPage();return false;">«</a>
		<a href="#" id="page" onClick="return false;"><?php echo $page;?></a>
		<a href="<?php echo $nextUrl;?>" onClick="nextPage();return false;">»</a>
	</div>
	</li>
    </ul>
  </div>
</div>

<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WPD_ASSETS_PATH;?>js/dlg.js"></script>
<script type="text/javascript">
var page = <?php echo $page;?>;
var endPage = false;
var channelId = "<?php echo $channelId;?>";
$(function(){
	$('.afx').live('click',function(){
		var url = $(this).attr('url');
		var title = $(this).attr('title');
		var desc = $(this).attr('desc');
		var img = $(this).attr('img');
		var html = '<iframe scrolling="no" frameborder="0" width="600px" height="230px" src="index.php?r=console/share&channelId='+channelId+'&type=party&url='+url+'&title='+title+'&desc='+desc+'&img='+img+'"></iframe>';
		dlg(670,390,'活动分享',html,function(){
			dlgClose();
		});
	});
});
function prevPage(){
	if(page == 1){
		return;
	}
	page--;
	goPage(page);
}
function nextPage(){
	if(endPage){
		return;
	}
	page++;
	goPage(page);
}
function goPage(page){
	window.location.href = 'index.php?r=party/index&channelId='+channelId+'&page='+page
}
function deleteParty(partyId){
	var html = '\
		<p class="dlg-label">您确定要删除该活动吗？</p>\
	';
	dlg(350,200,'删除活动',html,function(){
		dlgWait();
		$.ajax({
			type:'POST',
			url:'index.php?r=party/delete&channelId='+channelId,
			data:{partyId:partyId},
			dataType:'JSON',
			async:false,
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					dlgClose();
					dlgMsg(1,'提示','活动删除成功');
  					setTimeout(function(){window.location.reload();},1300);
					return;
				}
				else{
					dlgMsg(3,'提示',data.FlagString);
				}
			}
		});
	});
}
</script>
<?php include(CTemplate::getInstance()->getfile('footer.html')); ?>
</body>
</html>