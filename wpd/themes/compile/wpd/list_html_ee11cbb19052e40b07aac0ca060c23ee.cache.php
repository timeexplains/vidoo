<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-02 14:22:36-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/userlist.css">
</head>

<body>
<?php include(CTemplate::getInstance()->getfile('header.html')); ?>
<!--内容部分-->
<div class="user_con">
	<div class="user_con_tt">
		<h1>用户管理</h1>
	</div>  
	<div class="fgx"></div>
	<div class="TabCon">
		<div class="tabList">
			<ul>
				<li<?php if($type == '') { ?> class="hit"<?php } ?>><a href="index.php?r=user/index&channelId=<?php echo $channelId;?>">全部用户</a></li>
				<li<?php if($type == 'gap') { ?> class="hit"<?php } ?>><a href="index.php?r=user/index&channelId=<?php echo $channelId;?>&type=gap">禁言用户</a></li>
				<li<?php if($type == 'black') { ?> class="hit"<?php } ?>><a href="index.php?r=user/index&channelId=<?php echo $channelId;?>&type=black">黑名单用户</a></li>
			</ul>
		</div>
		<div style="clear:both"></div>
		<div class="listcon">
			<div class="listbt">
				<ul>
					<li>用户</li><li>访问次数</li><li>评论数</li><li>最后登录时间</li><li>操作</li>
				</ul>
        	</div>
			<div class="tlists">
				<div class="tlist" style="display:block;">
					<ul class="listnr">
					<?php if(is_array($userList)) {foreach((array)$userList as $val) {?>
						<li>
							<p><img class="img" src="<?php echo $val['url'];?>" /><font><?php echo $val['nick'];?></font></p>
							<p><?php echo $val['pvNum'];?></p>
							<p><?php echo $val['chatNum'];?></p>
							<p><?php echo $val['time'];?></p>
							<p>
							<?php if($val['gap'] == 0) { ?>
								<span class="jcjy" onclick="addGaps('<?php echo $val['uid'];?>','<?php echo $val['nick'];?>')">禁言</span>
							<?php } else { ?>
								<span class="jcjy" onclick="deleteGaps('<?php echo $val['uid'];?>','<?php echo $val['nick'];?>')">解除禁言</span>
							<?php } ?>
							<?php if($val['black'] == 0) { ?>
								<span class="jcjy" onclick="addBlacklists('<?php echo $val['uid'];?>','<?php echo $val['nick'];?>')">踢人</span>
							<?php } else { ?>
								<span class="jcjy" onclick="deleteBlacklists('<?php echo $val['uid'];?>','<?php echo $val['nick'];?>')">拉回</span>
							<?php } ?>
							</p>
						</li>
					<?php }} ?>
					</ul>
					<div class="tlist_db">
						<div class="tlist_db_p2">
							<ul class="pagelist">
								<li><a href="<?php echo $indexUrl;?>">首页</a></li>
							<?php if($preUrl != "") { ?>
								<li><a href="<?php echo $preUrl;?>">上一页</a></li>
							<?php } ?>
								<li class="thisclass"><?php echo $page;?></li>
							<?php if($nextUrl != "") { ?>
								<li><a href="<?php echo $nextUrl;?>">下一页</a></li>
							<?php } ?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--内容部分end-->
<?php include(CTemplate::getInstance()->getfile('footer.html')); ?>
<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="<?php echo WPD_ASSETS_PATH;?>js/dlg.js"></script>
<script type="text/javascript">
	var channelId = '<?php echo $channelId;?>';
	function addBlacklists(uin,nick){
		dlgWait();
		$.ajax({
			type:'POST',
			data:{uin:uin,nick:nick},
			url:'index.php?r=console/addBlacklists&channelId='+channelId,
			dataType:'JSON',
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					//刷新页面
					dlgMsg(1,'提示','操作成功');
					setTimeout(function(){window.location.reload();},1300);
				}
				else{
					dlgMsg(3,'提示','操作失败');
				}
			}
		});
	}
	
	var deleteBlacklists = function(uin,nick){
		dlgWait();
		$.ajax({
			type:'POST',
			data:{uin:uin,nick:nick},
			url:'index.php?r=console/deleteBlacklists&channelId='+channelId,
			dataType:'JSON',
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					//刷新页面
					dlgMsg(1,'提示','操作成功');
					setTimeout(function(){window.location.reload();},1300);
				}
				else{
					dlgMsg(3,'提示','操作失败');
				}
			}
		});
	}
	
	var addGaps = function(uin,nick){
		dlgWait();
		$.ajax({
			type:'POST',
			data:{uin:uin,nick:nick},
			url:'index.php?r=console/addGaps&channelId='+channelId,
			dataType:'JSON',
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					//刷新页面
					dlgMsg(1,'提示','操作成功');
					setTimeout(function(){window.location.reload();},1300);
				}
				else{
					dlgMsg(3,'提示','操作失败');
				}
			}
		});
	}
	
	var deleteGaps = function(uin,nick){
		dlgWait();
		$.ajax({
			type:'POST',
			data:{uin:uin,nick:nick},
			url:'index.php?r=console/deleteGaps&channelId='+channelId,
			dataType:'JSON',
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					//刷新页面
					dlgMsg(1,'提示','操作成功');
					setTimeout(function(){window.location.reload();},1300);
				}
				else{
					dlgMsg(3,'提示','操作失败');
				}
			}
		});
	}

	var addManager = function(uin,nick){
		dlgWait();
		$.ajax({
			type:'POST',
			data:{uin:uin,nick:nick},
			url:'index.php?r=console/addManager&channelId='+channelId,
			dataType:'JSON',
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					//刷新页面
					dlgMsg(1,'提示','操作成功');
					setTimeout(function(){window.location.reload();},1300);
				}
				else{
					dlgMsg(3,'提示','操作失败');
				}
			}
		});
	}
	
	var deleteManager = function(uin,nick){
		dlgWait();
		$.ajax({
			type:'POST',
			data:{uin:uin,nick:nick},
			url:'index.php?r=console/deleteManager&channelId='+channelId,
			dataType:'JSON',
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					//刷新页面
					dlgMsg(1,'提示','操作成功');
					setTimeout(function(){window.location.reload();},1300);
				}
				else{
					dlgMsg(3,'提示','操作失败');
				}
			}
		});
	}
</script> 
</body>
</html>
