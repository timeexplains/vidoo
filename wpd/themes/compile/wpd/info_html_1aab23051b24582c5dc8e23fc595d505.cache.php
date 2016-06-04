<?php if (!class_exists('CTemplate')) die('Access Denied');?>
<!DOCTYPE html>
<html>

<!--template compile at 2016-06-03 20:19:54-->

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<title><?php if(empty($serviceInfo['pageTitle'])) { ?>频道管理<?php } else { ?><?php echo $serviceInfo['pageTitle'];?><?php } ?></title>
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/style.css">
<link rel="stylesheet" type="text/css" href="<?php echo WPD_ASSETS_PATH;?>css/partyInfo.css">
</head>
<body>
<?php include(CTemplate::getInstance()->getfile('header.html')); ?>

<div class="wapper">
  <div class="clear"></div>
  <div class="lcps">
    <div class="hdtt">
      <h1>活动管理</h1>
      <p><a href="index.php?r=party/index&channelId=<?php echo $channelId;?>"><span><返回</span></a></p>
    </div>
    <div class="fgx"></div>
    <form action="index.php?r=party/reditParty&channelId=<?php echo $channelId;?>" method="post" enctype="multipart/form-data" onsubmit="return checkForm();">
	    <div class="hdnr">
			<input type="hidden" name="partyId" value="<?php echo $partyInfo['partyId'];?>">
	    	<div class="inputdiv">
	    		<span>活动主题：</span>
	        	<input type="text" value="<?php echo $partyInfo['title'];?>" name="title" id="title" style="color:#666;" class="inputbox">
	      	</div>
	    	<div class="inputdiv">
		    	<span>活动时间：</span>
				<label id="sTime" style="width:130px;"><?php echo date('Y-m-d H:i:s',$partyInfo['startTime']);;?></label> 至
				<label id="eTime" style="width:130px;"><?php echo date('Y-m-d H:i:s',$partyInfo['etartTime']);;?></label> 
			</div>
			<div class="inputdiv parties-pic">
				<span>封面图片：</span>
		      	<img src="<?php echo $partyInfo['surfaceUrl'];?>" width="200" height="112">
		      	封面最佳尺寸：640×360
			</div>
			<div class="inputdiv">
				<span>上传新封面：</span>
				<input type="file" name="pic" id="pic">
			</div>
		</div>
		<div class="clear"></div>
		<div class="spdb">
			<input type="submit" class="submit" value="确定" />
		</div>
	</form>
    <div class="splb">
      <div class="TabCon">
      <div class="tabPanel">
        <ul>
            <li class="hit">已选视频</li>
            <li>我的视频</li>
            
        </ul>
      </div>
        <div class="panes">
          <div class="pane" style="display:block;">
           <div class="spnr no1" style="height:410px;">
          	<ul>          	
	          	<?php if(is_array($vodList)) {foreach((array)$vodList as $val) {?>
	          	<?php if($val["state"]) { ?>
	          	<li> <img src="<?php echo $val["surfaceUrl"];?>" width="182" height="95" />
	            <p>开始时间：<?php echo $val["start"];?> </p>
	            <p>结束时间：<?php echo $val["end"];?> </p>
	            <p>
	              <input id="<?php echo $val["id"];?>" type="checkbox" name="onview" />
	              <span class="bfsp" onClick="videoPlayer('<?php echo $val["url"];?>','<?php echo $val["m3u8"];?>','<?php echo $val["surfaceUrl"];?>','320','240');return false;" >
                       播放视频</span> <span class="yc">移除</span></p>
	          	</li>
	          	<?php } ?> 
	          	<?php }} ?>
	          
        	</ul>
        	</div>
        	<div class="spbt">
        	<p><span class="plyc">批量移除</span></p>
     		</div>            
          </div>
          <div class="pane">
	          <div class="vodhead" style="float: left; width:100%;margin-top: 10px">
	          <span >分类：</span>
	          <span class="zbcc choose">直播储存</span>
          </div>
          <div class="spnr no2" id="liveStorageBox">
         	<ul>
	          	<?php if(is_array($vodList)) {foreach((array)$vodList as $val) {?>
	          	<?php if($val['src'] == 'live') { ?>
	          	<li class="1">
	          		<img src="<?php echo $val["surfaceUrl"];?>" width="170" height="95" />
		            <p>开始时间：<?php echo $val["start"];?> </p>
		            <p>结束时间：<?php echo $val["end"];?> </p>
		            <p>
		            <?php if($val["state"]) { ?>
		              <input id="<?php echo $val['id'];?>" type="hidden" name="chooseview"/>
		              <span class="bfsp" onClick="videoPlayer('<?php echo $val["url"];?>','<?php echo $val["m3u8"];?>','<?php echo $val["surfaceUrl"];?>','320','240');return false;">播放视频</span>
		              <span class="yx">已选</span>
		            <?php } else { ?>
		              <input id="<?php echo $val['id'];?>" type="checkbox" name="chooseview"/>
		              <span class="bfsp" onClick="videoPlayer('<?php echo $val["url"];?>','<?php echo $val["m3u8"];?>','<?php echo $val["surfaceUrl"];?>','320','240');return false;">播放视频</span>
		              <span class="xz" >选择</span>
		            <?php } ?>
		              <span class="sc">删除</span>
		            </p>
	          	</li>
	          	<?php } ?>
	          	<?php }} ?>
        	</ul>
		  </div>
			<div class="spbt">
				<p>
					<span class="plxz" style="background: none repeat scroll 0 0 #139CD7;border: 1px solid #139CD7;">批量选择</span>
				</p>
			</div>    
          </div>
        </div>
      </div>
    </div>
    <div class="fgx"></div>
    <div class="both"></div>
  </div>
  <div class="dms" id="dms" style="height:850px;width:556px"></div>
</div>
<script type="text/javascript" src="http://cdn.aodianyun.com/static/jquery/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="http://cdn.aodianyun.com/lss/ckplayer/player.js"></script>
<script type="text/javascript" src="<?php echo WPD_ASSETS_PATH;?>js/dlg.js"></script>
<script type="text/javascript">
$('.vodhead span:gt(0)').live('click',function(){
	$(this).addClass('choose').siblings().removeClass('choose');
});
var ZeroClipboardNum = 1;
$('.tabPanel ul li').live('click',function(){
	$(this).addClass('hit').siblings().removeClass('hit');
	$('.panes>.pane:eq('+$(this).index()+')').show().siblings('.pane').hide();
	$('#ZeroClipboardMovie_'+ZeroClipboardNum).parent('div').remove();	
	if($(this).index() == 1){
		ZeroClipboardNum++;
	}
});
var DMS_SITE = '<?php echo SYSTEM_HOST;?>';
//聊天框
var dmsConfig = {
  container:"dms",
  channelId:"<?php echo $partyInfo['channelId'];?>",
  partyId:"<?php echo $partyInfo['partyId'];?>",
  layout:"playConsole",
  dmsAppKey:"<?php echo $serviceInfo['dmsAppKey'];?>",
  dmsPubKey:"<?php echo $serviceInfo['dmsPubKey'];?>",
  dmsSubKey:"<?php echo $serviceInfo['dmsSubKey'];?>",
  wxAppid:"<?php echo $serviceInfo['wxAppid'];?>",
  chatOpt:"<?php echo $partyInfo['chatOpt'];?>",
  topic:"<?php echo $partyInfo['topic'];?>",
  controlTopic:"<?php echo $partyInfo['controlTopic'];?>",
  uid:"<?php echo $userInfo['openid'];?>",
  nick:"<?php echo $userInfo['nick'];?>",
  ava:"<?php echo $userInfo['ava'];?>",
  blackList:$.parseJSON('<?php echo $blackList;?>'),
  gapsList:$.parseJSON('<?php echo $gapsList;?>'),
  pvNum:"<?php echo $partyInfo['userNum'];?>",
  praiseNum:"<?php echo $partyInfo['praiseNum'];?>",
  msgNum:"<?php echo $partyInfo['msgNum'];?>",
  shareNum:"<?php echo $partyInfo['shareNum'];?>"
};
(function() {
  var dms = document.createElement('script');
  dms.type = 'text/javascript';
  dms.async = true;
  dms.src = 'http://cdn.aodianyun.com/dms/wsp.js';
  dms.charset = 'UTF-8';
  (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dms);
})();

$('input[name="chooseview"]').attr("checked",false);
$('input[name="uploadchooseview"]').attr("checked",false);

var channelId = "<?php echo $channelId;?>";
var vodList = $.parseJSON('<?php echo addslashes(json_encode($vodList));;?>');
var uploadPage = 1;
var uploadEnd = false;
var uploadScrollHight = 0; //滚动距离总长(注意不是滚动条的长度)
var uploadScrollTop = 0;   //滚动到的当前位置
var uploadDivHight = 400;
var getUserUploadStatus = false;
$("#userUploadBox").scroll(function(){
	uploadScrollHight = $(this)[0].scrollHeight;
	uploadScrollTop = $(this)[0].scrollTop;
	if(uploadScrollTop + uploadDivHight >= uploadScrollHight){
		getUserUpload();
	}
});

$('.zbcc').live('click',function(){
	$('.wdss').removeClass('choose');
	$('.zbcc').addClass('choose');
	$('.scsp').hide();
	$('#liveStorageBox').show();
	$('#userUploadBox').hide();
	$('.plxz').show();
	$('.plxzsc').hide();
});

$('.wdss').live('click',function(){
	$('.wdss').addClass('choose');
	$('.zbcc').removeClass('choose');
	$('.scsp').show();
	$('#liveStorageBox').hide();
	$('#userUploadBox').show();
	$('.plxz').hide();
	$('.plxzsc').show();
	$("#userUploadBox").scrollTop(0);
});

$('.xz').live("click",function(){
	var partyId=<?php echo $partyInfo['partyId'];?>;
	var vodId=$(this).siblings('input').attr("id");
	var obj = $(this);
	var state=1;
	dlgWait();
	$.ajax({
		type:'POST',
		url:'index.php?r=party/editVod&channelId='+channelId,
		data:{vodId:vodId,partyId:partyId,state:state},
		dataType:'JSON',
		async:false,
		success:function(data) {
			dlgWaitClose();
			if(data.Flag == 100){
				obj.text("已选");
				obj.removeClass("xz").addClass("yx");

				var chobj=$('#'+vodId+'[name=chooseview]');
				if(typeof(chobj)!='undefined'){				
					var inputhtml='<input id="'+vodId+'" type="hidden" name="chooseview"/>';
					chobj.after(inputhtml);
					chobj.remove();
				}

				var liobj=obj.parent().parent();
				var imgsrc=liobj.children("img").attr("src");
				var stat=liobj.children("p:eq(0)").text();
				var end=liobj.children("p:eq(1)").text();
				var clickobj=liobj.children().children('span[class=bfsp]').clone(true);
				var html='<li> <img src='+imgsrc+' width="182" height="95" />';
				html+='<p>'+stat+'</p>';
				html+='<p>'+end+'</p>';
				html+='<p> <input id="'+vodId+'" type="checkbox" name="onview" />';
				html+='  <span class="yc">移除</span></p></li>';
				$('.no1 ul').append(html);
				$('#'+vodId+'[name=onview]').after(clickobj);
				$('#'+vodId+'[name=onview]').after(' ');
				dlgMsg(1,'提示','操作成功');
			}
			else{
				dlgMsg(3,'提示',data.FlagString);
			}
		}
	});
});

$('.plxz').live("click",function(){
	var partyId=<?php echo $partyInfo['partyId'];?>;
	var state=1;
	var chk_value=[];//定义一个数组    
    $('input[name="chooseview"]:checked').each(function(){
    //遍历每一个名字为interest的复选框，其中选中的执行函数  
    	chk_value.push($(this).attr("id"));//将选中的值添加到数组chk_value中    
    });
    if (chk_value.length<1) {
    	dlgMsg(2,'提示','请选择一个视频');
    	return;
    }
	var html = '<p class="dlg-label">您确定要选择这些视频吗？</p>';
	dlg(350,200,'选择视频',html,function(){
		dlgWait();
		$.ajax({
			type:'POST',
			url:'index.php?r=party/editVods&channelId='+channelId,
			data:{vodIds:chk_value,partyId:partyId,state:state},
			dataType:'JSON',
			async:false,
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					for(var i in chk_value){
						var obj=$('#'+chk_value[i]+'[name=chooseview]').next().next();
						obj.text("已选");
						obj.removeClass("xz").addClass("yx");

						var chobj=$('#'+chk_value[i]+'[name=chooseview]');
						if(typeof(chobj)!='undefined'){				
							var inputhtml='<input id="'+chk_value[i]+'" type="hidden" name="chooseview"/>';
							chobj.after(inputhtml);
							chobj.remove();
						}

						var liobj=obj.parent().parent();
						var imgsrc=liobj.children("img").attr("src");
						var stat=liobj.children("p:eq(0)").text();
						var end=liobj.children("p:eq(1)").text();
						var clickobj=liobj.children().children('span[class=bfsp]').clone(true);
						var html='<li> <img src='+imgsrc+' width="182" height="95"/>';
						html+='<p>'+stat+'</p>';
						html+='<p>'+end+'</p>';
						html+='<p> <input id="'+chk_value[i]+'" type="checkbox" name="onview" />';
						html+=' <span class="yc">移除</span></p></li>';
			           	$('.no1 ul').append(html);
			           	$('#'+chk_value[i]+'[name=onview]').after(clickobj);
			           	$('#'+chk_value[i]+'[name=onview]').after(' ');	
					}
					dlgClose();
					dlgMsg(1,'提示','操作成功');
				}
				else{
					dlgMsg(3,'提示',data.FlagString);
				}
			}
		});
	});
	return false;
});

$('.yc').live("click",function(){
	var partyId=<?php echo $partyInfo['partyId'];?>;
	var vodId=$(this).siblings('input').attr("id");
	var state=0;
	var obj=$(this);
	var html='<p class="dlg-label">您确定要移除此视频吗？</p>';
	dlg(350,200,'移除视频',html,function(){
		dlgWait();
		$.ajax({
			type:'POST',
			url:'index.php?r=party/editVod&channelId='+channelId,
			data:{vodId:vodId,partyId:partyId,state:state},
			dataType:'JSON',
			async:false,
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					obj.parents('li').remove();
					var chobj=$('#'+vodId+'[name=chooseview]');
					var ycobj=chobj.siblings('span[class=yx]');
					if(typeof(ycobj)!='undefined'){
						ycobj.text("选择").removeClass("yx").addClass("xz");
						var inputhtml='<input id="'+vodId+'" type="checkbox" name="chooseview"/>';
						chobj.after(inputhtml);
						chobj.remove();
					}

					var xzobj=$('#'+vodId+'[name=uploadchooseview]');
					var viewobj=xzobj.siblings('span[class=yx]');
					if(typeof(viewobj)!='undefined'){
						viewobj.text("选择").removeClass("yx").addClass("xzsc");
						var url=xzobj.attr("url");
						var inputhtml='<input id="'+vodId+'"url="'+url+'" type="checkbox" name="uploadchooseview"/>';
						xzobj.after(inputhtml);
						xzobj.remove();
					}
					dlgClose();
					dlgMsg(1,'提示','操作成功');
				}
				else{
					dlgMsg(3,'提示',data.FlagString);
				}
			}
		});
	});
});

$('.plyc').live("click",function(){
	var partyId=<?php echo $partyInfo['partyId'];?>;
	var state=0;
	var chk_value =[];//定义一个数组    
    $('input[name="onview"]:checked').each(function(){
	    //遍历每一个名字为interest的复选框，其中选中的执行函数  
	    chk_value.push($(this).attr("id"));//将选中的值添加到数组chk_value中    
    });
    if(chk_value.length<1) {
    	dlgMsg(2,'提示','请选择要移除的视频');
    	return;
    }
	var html = '<p class="dlg-label">您确定要移除这些视频吗？</p>';
	dlg(350,200,'移除视频',html,function(){
		dlgWait();
		$.ajax({
			type:'POST',
			url:'index.php?r=party/editVods&channelId='+channelId,
			data:{vodIds:chk_value,partyId:partyId,state:state},
			dataType:'JSON',
			async:false,
			success:function(data) {
				dlgWaitClose();
				if(data.Flag == 100){
					for(var i in chk_value){
						var obj=$('#'+chk_value[i]+'[name=onview]');
						obj.parents().parents('li').remove();
						var chobj=$('#'+chk_value[i]+'[name=chooseview]');
						var ycobj=chobj.siblings('span[class=yx]');
						if(typeof(ycobj)!='undefined'){
							ycobj.text("选择").removeClass("yx").addClass("xz");
							var inputhtml='<input id="'+chk_value[i]+'" type="checkbox" name="chooseview"/>';
							chobj.after(inputhtml);
							chobj.remove();
						}
						var xzobj=$('#'+chk_value[i]+'[name=uploadchooseview]');
						var viewobj=xzobj.siblings('span[class=yx]');
						if(typeof(viewobj)!='undefined'){
							viewobj.text("选择").removeClass("yx").addClass("xzsc");
							var url=xzobj.attr("url");
							var inputhtml='<input id="'+chk_value[i]+'"url="'+url+'" type="checkbox" name="uploadchooseview"/>';
							xzobj.after(inputhtml);
							xzobj.remove();
						}
					
					}
					dlgClose();
					dlgMsg(1,'提示','操作成功');
				}
				else{
					dlgMsg(3,'提示',data.FlagString);
				}
			}
		});
	});
});

function checkForm(){
	var title = $('#title').val();
	if(title == ''){
		dlgMsg(2,'提示','活动主题不能为空');
		return false;
	}
	if(title.length > 20){
		dlgMsg(2,'提示','活动主题不能超过20个字');
		return false;
	}
	return true;
}

function videoPlayer(url,m3u8,image,w,h){
    w  = w > 0 ? (w > 650 ? 650 : w) : 450;
    h = h > 0 ? (h > 420 ? 420 : h) : 180;
    var dlg = art.dialog({
        title: '视频播放',
        content: '<div id="videoPlayer"></div>',
        lock: true,
        resize: false,
        padding: '0px',
        width:w+'px',
        height:h+'px'
    });
    var flashvars = {};
    if(m3u8){
        flashvars={
            f:'http://cdn.aodianyun.com/lss/ckplayer/m3u8.swf',
            a:m3u8,
            c:0,
            s:4,
            i:image,
            lv:0//注意，如果是直播，需设置lv:1
        };
    }else{
        flashvars={
            f:url,
            c:0,
            b:1,
            p:1
        };
    }
    CKobject.embed('http://cdn.aodianyun.com/lss/ckplayer/ckplayer.swf','videoPlayer','ckplayerFlashBox',w,h,false,flashvars);
}
</script>
<?php include(CTemplate::getInstance()->getfile('footer.html')); ?>
</body>
</html>