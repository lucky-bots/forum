<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('post');
0
|| checktplrefresh('./template/default/touch/forum/post.htm', './template/default/touch/forum/post_editor_attribute.htm', 1649492691, '1', './data/template/1_1_touch_forum_post.tpl.php', './template/default', 'touch/forum/post')
|| checktplrefresh('./template/default/touch/forum/post.htm', './template/default/touch/common/seccheck.htm', 1649492691, '1', './data/template/1_1_touch_forum_post.tpl.php', './template/default', 'touch/forum/post')
;?><?php include template('common/header'); if($special != 2 && $special != 4 && !($isfirstpost && $sortid)) { $adveditor = $isfirstpost && $special && ($_GET['action'] == 'newthread' || $_GET['action'] == 'reply' && !empty($_GET['addtrade']) || $_GET['action'] == 'edit' );?><form method="post" id="postform" 
<?php if($_GET['action'] == 'newthread') { ?>action="forum.php?mod=post&amp;action=<?php if($special != 2) { ?>newthread<?php } else { ?>newtrade<?php } ?>&amp;fid=<?php echo $_G['fid'];?>&amp;extra=<?php echo $extra;?>&amp;topicsubmit=yes&amp;mobile=2"
<?php } elseif($_GET['action'] == 'reply') { ?>action="forum.php?mod=post&amp;action=reply&amp;fid=<?php echo $_G['fid'];?>&amp;tid=<?php echo $_G['tid'];?>&amp;extra=<?php echo $extra;?>&amp;replysubmit=yes&amp;mobile=2"
<?php } elseif($_GET['action'] == 'edit') { ?>action="forum.php?mod=post&amp;action=edit&amp;extra=<?php echo $extra;?>&amp;editsubmit=yes&amp;mobile=2" <?php echo $enctype;?>
<?php } ?>>
<input type="hidden" name="formhash" id="formhash" value="<?php echo FORMHASH;?>" />
<input type="hidden" name="posttime" id="posttime" value="<?php echo TIMESTAMP;?>" />
<?php if(!empty($_GET['modthreadkey'])) { ?><input type="hidden" name="modthreadkey" id="modthreadkey" value="<?php echo $_GET['modthreadkey'];?>" /><?php } if($_GET['action'] == 'reply') { ?>
<input type="hidden" name="noticeauthor" value="<?php echo $noticeauthor;?>" />
<input type="hidden" name="noticetrimstr" value="<?php echo $noticetrimstr;?>" />
<input type="hidden" name="noticeauthormsg" value="<?php echo $noticeauthormsg;?>" />
<?php if($reppid) { ?>
<input type="hidden" name="reppid" value="<?php echo $reppid;?>" />
<?php } if($_GET['reppost']) { ?>
<input type="hidden" name="reppost" value="<?php echo $_GET['reppost'];?>" />
<?php } elseif($_GET['repquote']) { ?>
<input type="hidden" name="reppost" value="<?php echo $_GET['repquote'];?>" />
<?php } } if($_GET['action'] == 'edit') { ?>
<input type="hidden" name="fid" id="fid" value="<?php echo $_G['fid'];?>" />
<input type="hidden" name="tid" value="<?php echo $_G['tid'];?>" />
<input type="hidden" name="pid" value="<?php echo $pid;?>" />
<input type="hidden" name="page" value="<?php echo $_GET['page'];?>" />
<?php } if($special) { ?>
<input type="hidden" name="special" value="<?php echo $special;?>" />
<?php } if($specialextra) { ?>
<input type="hidden" name="specialextra" value="<?php echo $specialextra;?>" />
<?php } ?>

<!-- header start -->
<header class="header">
    <div class="nav">
<span class="y"><button id="postsubmit" class="btn_pn <?php if($_GET['action'] == 'edit') { ?>btn_pn_blue" disable="false"<?php } else { ?>btn_pn_grey" disable="true"<?php } ?>><span><?php if($_GET['action'] == 'newthread') { ?>โพสต์<?php } elseif($_GET['action'] == 'reply') { ?>ตอบกระทู้<?php } elseif($_GET['action'] == 'edit') { ?>บันทึก<?php } ?></span></button></span>
<input type="hidden" name="<?php if($_GET['action'] == 'newthread') { ?>topicsubmit<?php } elseif($_GET['action'] == 'reply') { ?>replysubmit<?php } elseif($_GET['action'] == 'edit') { ?>editsubmit<?php } ?>" value="yes">
<a href="<?php if($_GET['action'] == 'newthread') { ?>forum.php?mod=forumdisplay&fid=<?php echo $_G['fid'];?>&page=<?php echo $_GET['page'];?><?php } else { ?>forum.php?mod=redirect&goto=findpost&ptid=<?php echo $_G['tid'];?>&pid=<?php echo $pid;?><?php } ?>" class="z"><img src="<?php echo STATICURL;?>image/mobile/images/icon_back.png" /></a>
<span><?php if($_GET['action'] == 'edit') { ?>แก้ไข<?php } else { ?>ส่ง<?php } ?></span>
    </div>
</header>
<!-- header end -->

<!-- main postbox start -->
<div class="wp">
<div class="post_from">
<ul class="cl">
<li class="bl_line">
<?php if($_GET['action'] != 'reply') { ?>
<input type="text" tabindex="1" class="px" id="needsubject" size="30" autocomplete="off" value="<?php echo $postinfo['subject'];?>" name="subject" placeholder="ชื่อเรื่อง" fwin="login">
<?php } else { ?>
RE: <?php echo $thread['subject'];?>
<?php if($quotemessage) { ?><?php echo $quotemessage;?><?php } } ?>
</li>
<?php if($isfirstpost && !empty($_G['forum']['threadtypes']['types'])) { ?>
<li class="bl_line">
<select id="typeid" name="typeid" class="sort_sel">
<option value="0" selected="selected">เลือกหมวดหมู่</option><?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $typeid => $name) { if(empty($_G['forum']['threadtypes']['moderators'][$typeid]) || $_G['forum']['ismoderator']) { ?>
<option value="<?php echo $typeid;?>"<?php if($thread['typeid'] == $typeid || $_GET['typeid'] == $typeid) { ?> selected="selected"<?php } ?>><?php echo strip_tags($name);; ?></option>
<?php } } ?>
</select>
</li>
<?php } if($_GET['action'] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']) { ?>
<li class="bl_line">
<input type="checkbox" name="delete" id="delete" class="pc" value="1" title="ลบกระทู้<?php if($thread['special'] == 3) { ?>ราคาเงินคืนรางวัลโดยปราศจากค่าธรรมเนียม<?php } ?>"> ลบ?
</li>
<?php } ?>
<li class="bl_none area">
<textarea class="pt" id="needmessage" tabindex="3" autocomplete="off" id="<?php echo $editorid;?>_textarea" name="<?php echo $editor['textarea'];?>" cols="80" rows="2"  placeholder="เนื้อหา" fwin="reply"><?php echo $postinfo['message'];?></textarea>
</li>
<li style="padding:0px;">
<a href="javascript:;" class="y" style="background:url(<?php echo STATICURL;?>image/mobile/images/icon_photo.png) no-repeat;overflow:hidden;">
<input type="file" name="Filedata" id="filedata" style="width:30px;height:30px;font-size:30px;opacity:0;"/>
</a>
</li>
</ul>
<ul id="imglist" class="post_imglist cl bl_line">
</ul>
<?php if(!empty($_G['setting']['pluginhooks']['post_middle_mobile'])) echo $_G['setting']['pluginhooks']['post_middle_mobile'];?><div id="post_extra" class="ptm cl">
<div id="post_extra_tb" class="cl" onselectstart="return false">
<label id="extra_additional_b" onclick="showExtra('extra_additional')"><span id="extra_additional_chk">ตัวเลือกเพิ่มเติม</span></label>
<?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { if($_G['group']['allowsetreadperm']) { ?>
<label id="extra_readperm_b" onclick="showExtra('extra_readperm')"><span id="extra_readperm_chk">จำกัดระดับ</span></label>
<?php } if($_G['group']['allowreplycredit'] && !in_array($special, array(2, 3))) { if($_GET['action'] == 'newthread') { $extcreditstype = $_G['setting']['creditstransextra'][10];?><?php } else { $extcreditstype = $replycredit_rule['extcreditstype'] ? $replycredit_rule['extcreditstype'] : $_G['setting']['creditstransextra'][10];?><?php } $userextcredit = getuserprofile('extcredits'.$extcreditstype);?><?php if(($_GET['action'] == 'newthread' && $userextcredit > 0) || ($_GET['action'] == 'edit' && $isorigauthor && isfirstpost)) { ?>
<label id="extra_replycredit_b" onclick="showExtra('extra_replycredit')"><span id="extra_replycredit_chk">รางวัลสำหรับการตอบกลับ</span></label>
<?php } } if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
<label id="extra_rushreplyset_b" onclick="showExtra('extra_rushreplyset')"><span id="extra_rushreplyset_chk">จำกัดจำนวน</span></label>
<?php } if($_G['group']['maxprice'] && !$special) { ?>
<label id="extra_price_b" onclick="showExtra('extra_price')"><span id="extra_price_chk">ราคาของกระทู้</span></label>
<?php } if($_G['group']['allowposttag']) { ?>
<label id="extra_tag_b" onclick="showExtra('extra_tag')"><span id="extra_tag_chk">กำหนดแท็กสำหรับกระทู้นี้</span></label>
<?php } if($_G['group']['allowsetpublishdate'] && ($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))) { ?>
<label id="extra_pubdate_b" onclick="showExtra('extra_pubdate')"><span id="extra_pubdate_chk">กำหนดเวลาโพสต์</span></label>
<?php } } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_attribute_extra'])) echo $_G['setting']['pluginhooks']['post_attribute_extra'];?>
</div>
<div id="post_extra_c">
<?php if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { if(!empty($userextcredit)) { ?>
<div id="extra_replycredit_c" class="exfm cl" style="display: none;">
<div><label>รางวัลตอบกลับเดียว: <input type="text" name="replycredit_extcredits" id="replycredit_extcredits" class="px pxs vm" value="<?php if($replycredit_rule['extcredits'] && $thread['replycredit'] > 0) { ?><?php echo $replycredit_rule['extcredits'];?><?php } else { ?>0<?php } ?>" onkeyup="javascript:getreplycredit();" onblur="extraCheck(0)" /> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?></label><span class="xg1">(ว่างไว้หรือเติม 0 หากไม่ต้องการ)</span> , <label>รางวัล <input type="text" name="replycredit_times" id="replycredit_times" class="px pxs vm" value="<?php if($replycredit_rule['lasttimes']) { ?><?php echo $replycredit_rule['lasttimes'];?><?php } else { ?>1<?php } ?>" onkeyup="javascript:getreplycredit();"  onblur="extraCheck(0)" /> ครั้ง</label>, <label>ต่อคนสำหรับค่าสูงสุด <select id="replycredit_membertimes" name="replycredit_membertimes" class="ps vm"><?php for($i=1;$i<11;$i++) {;?><option value="<?php echo $i;?>"<?php if($replycredit_rule['membertimes'] == $i) { ?> selected="selected"<?php } ?>><?php echo $i;?></option><?php };?></select> ครั้ง</label>, <label>อัตราการชนะ <select id="replycredit_random" name="replycredit_random" class="ps vm">
 <?php for($i=100;$i>9;$i=$i-10) {;?><option value="<?php echo $i;?>"<?php if($replycredit_rule['random'] == $i) { ?> selected="selected"<?php } ?>><?php echo $i;?></option><?php };?></select> %</label></div>
<div class="xg1">รางวัลทั้งหมด: <span id="replycredit_sum"><?php if($thread['replycredit']) { ?><?php echo $thread['replycredit'];?><?php } else { ?>0<?php } ?></span> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?><?php if($thread['replycredit']) { ?><span class="xg1">(โพสต์นี้ยังคงมีอยู่ <?php echo $thread['replycredit'];?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?><?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?>)</span><?php } ?>, <span id="replycredit">การชำระภาษี <?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> 0</span> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?>, คุณมี <?php echo $_G['setting']['extcredits'][$extcreditstype]['title'];?> <?php echo $userextcredit;?> <?php echo $_G['setting']['extcredits'][$extcreditstype]['unit'];?></div>
</div>
<?php } if($_G['group']['allowsetreadperm']) { ?>
<div id="extra_readperm_c" class="exfm cl" style="display:none">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="xw1">จำกัดระดับ</td>
<td>
<select name="readperm" id="readperm" class="ps" style="width:90px" onchange="extraCheck(1)">
<option value="">ไม่จำกัด</option><?php if(is_array($_G['cache']['groupreadaccess'])) foreach($_G['cache']['groupreadaccess'] as $val) { ?><option value="<?php echo $val['readaccess'];?>" title="จำกัดระดับ: <?php echo $val['readaccess'];?>"<?php if($thread['readperm'] == $val['readaccess']) { ?> selected="selected"<?php } ?>><?php echo $val['grouptitle'];?></option>
<?php } ?>
<option value="255"<?php if($thread['readperm'] == 255) { ?> selected="selected"<?php } ?>>สิทธิ์สูงสุด</option>
</select>
<span class="xg1">ระดับการเข้าชมจากสูงสุดไปต่ำสุด มากกว่าหรือเท่ากับกลุ่มที่เลือกของสมาชิกจะสามารถเข้าชมได้</span>
</td>
</tr>
</table>
</div>
<?php } if($_G['group']['maxprice'] && !$special) { ?>
<div id="extra_price_c" class="exfm cl" style="display:none">
ราคา:
<input type="text" id="price" name="price" class="px pxs" value="<?php echo $thread['pricedisplay'];?>" onblur="extraCheck(2)" /> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['title'];?>
<span class="xg1">(สูงสุด <?php echo $_G['group']['maxprice'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?>)</span>
<?php if($_G['group']['maxprice'] && ($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost)) { if($_G['setting']['maxincperthread']) { ?><p class="xg1">อนุญาตให้รับรายได้สูงสุดจากการขายกระทู้นี้แค่ <?php echo $_G['setting']['maxincperthread'];?> <?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['1']]['unit'];?>&nbsp;&nbsp;&nbsp;&nbsp;</p><?php } if($_G['setting']['maxchargespan']) { ?><p class="xg1">ระยะเวลาในการเก็บเงินจากการขายไม่นานกว่า <?php echo $_G['setting']['maxchargespan'];?> ชั่วโมง<?php if($_GET['action'] == 'edit' && $freechargehours) { ?>กระทู้นี้ยังสามารถขายได้อีก <?php echo $freechargehours;?> ชั่วโมง<?php } ?></p><?php } } ?>
</div>
<?php } if($_G['group']['allowposttag']) { ?>
<div id="extra_tag_c" class="exfm cl" style="display: none;">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="xw1">แท็ก</td>
<td>
<input type="text" class="px vm" size="60" id="tags" name="tags" value="<?php echo $postinfo['tag'];?>" />
</td>
</tr>
<tr>
<td></td>
<td>
<p class="xg1">ถ้าแท็กมีมากกว่า 1 คำ ให้คุณใช้เครื่องหมายคอมม่าหรือช่องว่างคั่นระหว่างคำ สูงสุดไม่เกิน 10 คำ</p>
</td>
</tr>
</table>
</div>
<?php } if(($_GET['action'] == 'newthread' && $_G['group']['allowpostrushreply'] && $special != 2) || ($_GET['action'] == 'edit' && getstatus($thread['status'], 3))) { ?>
<div class="exfm cl" id="extra_rushreplyset_c" style="display: none;">
<div class="sinf sppoll z">
<dl>
<dt><span style="width: 4em">&nbsp;</span></dt>
<dd><label for="rushreply"><input type="checkbox" name="rushreply" id="rushreply" class="pc vm" value="1" <?php if($_GET['action'] == 'edit' && getstatus($thread['status'], 3)) { ?>disabled="disabled" checked="checked"<?php } ?> onclick="extraCheck(3)" /> จำกัดเวลาและจำนวนการตอบกลับในกระทู้นี้</label></dd>
<dt><label>เริ่มเวลา:</label></dt>
<dd>
<div>
<input type="text" name="rushreplyfrom" id="rushreplyfrom" class="px" onclick="showcalendar(event, this, true)" autocomplete="off" value="<?php echo $postinfo['rush']['starttimefrom'];?>" onkeyup="$('rushreply').checked = true;" /><span> ~ </span><input type="text" onclick="showcalendar(event, this, true)" autocomplete="off" id="rushreplyto" name="rushreplyto" class="px" value="<?php echo $postinfo['rush']['starttimeto'];?>" onkeyup="$('rushreply').checked = true;" />
</div>
</dd>
<dt><label>รางวัล:</label></dt>
<dd>
<input type="text" name="rewardfloor" id="rewardfloor" class="px oinf" value="<?php echo $postinfo['rush']['rewardfloor'];?>" onkeyup="$('rushreply').checked = true;" />
<p class="xg1">ใช้ , * หรือช่องว่างคั่นรางวัลแต่ละโพสต์ เช่น: 8,88,*88</p>
</dd>
</dl>
</div>
<div class="sadd z">
<dl>
<dt>&nbsp;</dt>
<dd>&nbsp;</dd>
<dt><label for="stopfloor">จำกัดการโพสต์: </label></dt>
<dd>
<input type="text" name="replylimit" id="replylimit" class="px" autocomplete="off" value="<?php echo $postinfo['rush']['replylimit'];?>" onkeyup="$('rushreply').checked = true;" /> <span class="xg1">ผู้ใช้แต่ละคนสามารถโพสต์ได้สูงสุด</span>
</dd>
<dt><label for="stopfloor">สิ้นสุดโพสต์ที่:</label></dt>
<dd>
<input type="text" name="stopfloor" id="stopfloor" class="px" autocomplete="off" value="<?php echo $postinfo['rush']['stopfloor'];?>" onkeyup="$('rushreply').checked = true;" />
</dd>
<dt><label for="creditlimit"><?php if($_G['setting']['creditstransextra']['11']) { ?><?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?><?php } else { ?>เครดิต<?php } ?>จำกัดต่ำสุด:</label></dt>
<dd>
<input type="text" name="creditlimit" id="creditlimit" class="px" autocomplete="off" value="<?php echo $postinfo['rush']['creditlimit'];?>" onkeyup="$('rushreply').checked = true;" />
<p class="xg1"><?php if($_G['setting']['creditstransextra']['11']) { ?>(<?php echo $_G['setting']['extcredits'][$_G['setting']['creditstransextra']['11']]['title'];?>)<?php } else { ?>เครดิตรวมทั้งหมด<?php } ?>มากกว่าที่กำหนดไว้</p>
</dd>
</dl>
</div>
</div>
<?php } if($_G['group']['allowsetpublishdate'] && ($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost && $thread['displayorder'] == -4))) { ?>
<div class="exfm cl" id="extra_pubdate_c" style="display: none;">
<label><input type="checkbox" name="cronpublish" onclick="if(this.checked) {$('cronpublishdate').click();doane(event,false);};extraCheck(5);hidenFollowBtn(this.checked);" id="cronpublish" value="true" class="pc"<?php if($cronpublish) { ?> checked="checked"<?php } ?> />กำหนดเวลาโพสต์</label>
<input type="text" name="cronpublishdate" id="cronpublishdate" class="px" onclick="showcalendar(event, this, true, false, false, true);" autocomplete="off" value="<?php echo $cronpublishdate;?>" onchange="if(this.value) $('cronpublish').checked = true;">
</div>
<?php } } ?>

<div class="exfm cl" id="extra_additional_c" style="display: none;">
<table cellspacing="0" cellpadding="0">
<tr>
<td class="xw1" valign="top">คำสั่งพื้นฐาน</td>
<td>
<?php if($_GET['action'] != 'edit') { if($_G['group']['allowanonymous']) { ?><label for="isanonymous"><input type="checkbox" name="isanonymous" id="isanonymous" class="pc" value="1" />โพสต์ไม่ระบุชื่อ</label><?php } } else { if($_G['group']['allowanonymous'] || (!$_G['group']['allowanonymous'] && $orig['anonymous'])) { ?><label for="isanonymous"><input type="checkbox" name="isanonymous" id="isanonymous" class="pc" value="1" <?php if($orig['anonymous']) { ?>checked="checked"<?php } ?> />โพสต์ไม่ระบุชื่อ</label><?php } } if($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) { ?>
<label for="hiddenreplies"><input type="checkbox" name="hiddenreplies" id="hiddenreplies" class="pc"<?php if($thread['hiddenreplies']) { ?> checked="checked"<?php } ?> value="1">ซ่อนความคิดเห็น</label>
<?php } if($_G['uid'] && ($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost) && $special != 3) { ?>
<label for="ordertype"><input type="checkbox" name="ordertype" id="ordertype" class="pc" value="1" <?php echo $ordertypecheck;?> />โพสต์ใหม่ขึ้นก่อน</label>
<?php } if(($_GET['action'] == 'newthread' || $_GET['action'] == 'edit' && $isfirstpost)) { ?>
<label for="allownoticeauthor"><input type="checkbox" name="allownoticeauthor" id="allownoticeauthor" class="pc" value="1"<?php if($allownoticeauthor) { ?> checked="checked"<?php } ?> />แจ้งฉันเมื่อมีคนตอบ</label>
<?php } if($_GET['action'] != 'edit' && helper_access::check_module('feed') && $_G['forum']['allowfeed']) { ?>
<label for="addfeed"><input type="checkbox" name="addfeed" id="addfeed" class="pc" value="1" <?php echo $addfeedcheck;?>>เพิ่มเข้าในฟีดข่าว</label>
<?php } ?>
<label for="usesig"><input type="checkbox" name="usesig" id="usesig" class="pc" value="1" <?php if(!$_G['group']['maxsigsize']) { ?>disabled <?php } else { ?><?php echo $usesigcheck;?> <?php } ?>/>แสดงลายเซ็น</label>
</td>
</tr>
<tr>
<td class="xw1" valign="top">คุณสมบัติข้อความ</td>
<td>
<?php if(($_G['forum']['allowhtml'] || ($_GET['action'] == 'edit' && ($orig['htmlon'] & 1))) && $_G['group']['allowhtml']) { ?>
<label for="htmlon"><input type="checkbox" name="htmlon" id="htmlon" class="pc" value="1" <?php echo $htmloncheck;?> />โค้ด HTML</label>
<?php } else { ?>
<label for="htmlon"><input type="checkbox" name="htmlon" id="htmlon" class="pc" value="0" <?php echo $htmloncheck;?> disabled="disabled" />โค้ด HTML</label>
<?php } ?>
<label for="allowimgcode"><input type="checkbox" id="allowimgcode" class="pc" disabled="disabled"<?php if($_G['forum']['allowimgcode']) { ?> checked="checked"<?php } ?> />โค้ด [img]</label>
<?php if($_G['forum']['allowimgcode']) { ?>
<label for="allowimgurl"><input type="checkbox" id="allowimgurl" class="pc" checked="checked" />เปิดลิงก์ภาพออโต้</label>
<?php } ?>
<label for="parseurloff"><input type="checkbox" name="parseurloff" id="parseurloff" class="pc" value="1" <?php echo $urloffcheck;?> />ปิดลิงก์ URL ออโต้</label>
<label for="smileyoff"><input type="checkbox" name="smileyoff" id="smileyoff" class="pc" value="1" <?php echo $smileyoffcheck;?> />ปิดอีโมชัน</label>
<label for="bbcodeoff"><input type="checkbox" name="bbcodeoff" id="bbcodeoff" class="pc" value="1" <?php echo $codeoffcheck;?> />ปิดโค้ดดิสคัส</label>
<?php if($_G['group']['allowimgcontent']) { ?>
<label for="imgcontent"><input type="checkbox" name="imgcontent" id="imgcontent" class="pc" value="1" <?php echo $imgcontentcheck;?> onclick="switchEditor(this.checked?0:1);$('e_switchercheck').checked=this.checked;" />สร้างเนื้อหารูปภาพ</label>
<?php } else { ?>
<label for="imgcontent"><input type="checkbox" name="imgcontent" id="imgcontent" class="pc" value="0" <?php echo $imgcontentcheck;?> disabled="disabled"/>สร้างเนื้อหารูปภาพ</label>
<?php } ?>
</td>
</tr>
<?php if($_GET['action'] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts'])) { if($_GET['action'] == 'newthread' && $_G['forum']['ismoderator'] && ($_G['group']['allowdirectpost'] || !$_G['forum']['modnewposts']) && ($_G['group']['allowstickthread'] || $_G['group']['allowdigestthread'])) { ?>
<tr>
<td class="xw1" valign="top">ดำเนินการ การจัดการ</td>
<td>
<?php if($_G['group']['allowstickthread']) { ?>
<label for="sticktopic"><input type="checkbox" name="sticktopic" id="sticktopic" class="pc" value="1" <?php echo $stickcheck;?> />ปักหมุดกระทู้</label>
<?php } if($_G['group']['allowdigestthread']) { ?>
<label for="addtodigest"><input type="checkbox" name="addtodigest" id="addtodigest" class="pc" value="1" <?php echo $digestcheck;?> />กระทู้สำคัญ</label>
<?php } ?>
</td>
</tr>
<?php } } elseif($_GET['action'] == 'edit' && $_G['forum_auditstatuson']) { ?>
<tr>
<td class="xw1" valign="top">ดำเนินการ การจัดการ</td>
<td>
<label for="audit"><input type="checkbox" name="audit" id="audit" class="pc" value="1">ตรวจสอบ</label>
</td>
</tr>
<?php } if($_GET['action'] == 'edit' && $isorigauthor && ($isfirstpost && $thread['replies'] < 1 || !$isfirstpost) && !$rushreply && $_G['setting']['editperdel']) { ?>
<tr>
<td class="xw1" valign="top">ลบกระทู้</td>
<td>
<button type="button" class="pn xi1" onclick="deleteThread();"><span>ลบกระทู้</span></button>
<input type="hidden" name="delete" id="delete" value="0" />
ลบแล้วจะไม่สามารถยกเลิกได้<?php if($thread['special'] == 3) { ?>, ราคาเงินคืนรางวัลโดยปราศจากค่าธรรมเนียม<?php } ?>
</td>
</tr>
<?php } ?>
</table>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['post_attribute_extra_body'])) echo $_G['setting']['pluginhooks']['post_attribute_extra_body'];?>
</div>
</div>
<script type="text/javascript">
function showExtra(id) {
if ($('#'+id+'_c').css('display') == 'block') {
$('#'+id+'_b').attr("class","");
$('#'+id+'_c').css({'display':'none'});
} else {
var extraButton = $('#post_extra_tb').children('label');
var extraForm = $('#post_extra_c').children('div');

$.each($('#post_extra_tb > label'), function(){
$(this).attr("class","");
});

$.each($('#post_extra_c > div'), function(){
if($(this).hasClass('exfm')) {
$(this).css({'display':'none'});
}
});
$('#'+id+'_b').addClass('blue');
$('#'+id+'_c').css({'display':'block'});
}
}
</script><?php if($_GET['action'] != 'edit' && ($secqaacheck || $seccodecheck)) { $sechash = 'S'.random(4);
$sectpl = !empty($sectpl) ? explode("<sec>", $sectpl) : array('<br />',': ','<br />','');	
$ran = random(5, 1);?><?php if($secqaacheck) { $message = '';
$question = make_secqaa();
$secqaa = lang('core', 'secqaa_tips').$question;?><?php } if($sectpl) { if($secqaacheck) { ?>
<p>
        คำตอบ: 
        <span class="xg2"><?php echo $secqaa;?></span>
<input name="secqaahash" type="hidden" value="<?php echo $sechash;?>" />
        <input name="secanswer" id="secqaaverify_<?php echo $sechash;?>" type="text" class="txt" />
        </p>
<?php } if($seccodecheck) { ?>
<div class="sec_code vm">
<input name="seccodehash" type="hidden" value="<?php echo $sechash;?>" />
<input type="text" class="txt px vm" style="ime-mode:disabled;width:115px;background:white;" autocomplete="off" value="" id="seccodeverify_<?php echo $sechash;?>" name="seccodeverify" placeholder="รหัสลับ" fwin="seccode">
        <img src="misc.php?mod=seccode&amp;update=<?php echo $ran;?>&amp;idhash=<?php echo $sechash;?>&amp;mobile=2" class="seccodeimg"/>
</div>
<?php } } ?>
<script type="text/javascript">
(function() {
$('.seccodeimg').on('click', function() {
$('#seccodeverify_<?php echo $sechash;?>').attr('value', '');
var tmprandom = 'S' + Math.floor(Math.random() * 1000);
$('.sechash').attr('value', tmprandom);
$(this).attr('src', 'misc.php?mod=seccode&update=<?php echo $ran;?>&idhash='+ tmprandom +'&mobile=2');
});
})();
</script>
<?php } ?>
<?php if(!empty($_G['setting']['pluginhooks']['post_bottom_mobile'])) echo $_G['setting']['pluginhooks']['post_bottom_mobile'];?>
</div>
</div>
<!-- main postbox start -->
</form>
<?php } else { ?>
<div class="box xg1">
<?php if($special == '2') { ?>
ไม่สามารถ<strong>ขายสินค้า</strong>ผ่านการแสดงผลบนอุปกรณ์พกพา
    <?php } elseif($special == '4') { ?>
ไม่สามารถ<strong>จัดกิจกรรม</strong>ผ่านการแสดงผลบนอุปกรณ์พกพา
<?php } elseif($isfirstpost && $sortid) { ?>
ไม่สามารถดำเนินการผ่านการแสดงผลบนอุปกรณ์พกพา กรุณาใช้การแสดงผลบนคอมพิวเตอร์
    <?php } ?>
    </div>
<?php } ?>

<script type="text/javascript">
(function() {
var needsubject = needmessage = false;

<?php if($_GET['action'] == 'reply') { ?>
needsubject = true;
<?php } elseif($_GET['action'] == 'edit') { ?>
needsubject = needmessage = true;
<?php } if($_GET['action'] == 'newthread' || ($_GET['action'] == 'edit' && $isfirstpost)) { ?>
$('#needsubject').on('keyup input', function() {
var obj = $(this);
if(obj.val()) {
needsubject = true;
if(needmessage == true) {
$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
$('.btn_pn').attr('disable', 'false');
}
} else {
needsubject = false;
$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
$('.btn_pn').attr('disable', 'true');
}
});
<?php } ?>
$('#needmessage').on('keyup input', function() {
var obj = $(this);
if(obj.val()) {
needmessage = true;
if(needsubject == true) {
$('.btn_pn').removeClass('btn_pn_grey').addClass('btn_pn_blue');
$('.btn_pn').attr('disable', 'false');
}
} else {
needmessage = false;
$('.btn_pn').removeClass('btn_pn_blue').addClass('btn_pn_grey');
$('.btn_pn').attr('disable', 'true');
}
});

$('#needmessage').on('scroll', function() {
var obj = $(this);
if(obj.scrollTop() > 0) {
obj.attr('rows', parseInt(obj.attr('rows'))+2);
}
}).scrollTop($(document).height());
 })();
</script>
<script src="<?php echo STATICURL;?>js/mobile/ajaxfileupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script src="<?php echo STATICURL;?>js/mobile/buildfileupload.js?<?php echo VERHASH;?>" type="text/javascript"></script>
<script type="text/javascript">
var imgexts = typeof imgexts == 'undefined' ? 'jpg, jpeg, gif, png' : imgexts;
var STATUSMSG = {
'-1' : 'มีข้อผิดพลาดเกิดขึ้นภายในเซิร์ฟเวอร์',
'0' : 'อัปโหลดไฟล์เสร็จเรียบร้อย',
'1' : 'รูปแบบไฟล์หรือนามสกุลนี้ไม่สนับสนุน',
'2' : 'ขนาดไฟล์แนบเกินข้อจำกัดของเซิร์ฟเวอร์ ไม่สามารถอัปโหลดได้',
'3' : 'ขนาดไฟล์แนบเกินข้อจำกัดของกลุ่มสมาชิก ไม่สามารถอัปโหลดได้',
'4' : 'รูปแบบไฟล์หรือนามสกุลนี้ไม่สนับสนุน',
'5' : 'ขนาดไฟล์แนบเกินข้อจำกัดของรูปแบบไฟล์ ไม่สามารถอัปโหลดได้',
'6' : 'วันนี้คุณไม่สามารถอัปโหลดไฟล์แนบเพิ่มได้อีกแล้ว กรุณารออัปโหลดในวันใหม่',
'7' : 'กรุณาเลือกไฟล์รูปภาพ(' + imgexts + ')',
'8' : 'ไม่สามารถบันทึกไฟล์แนบได้',
'9' : 'ไม่มีไฟล์แนบที่จะอัปโหลดได้',
'10' : 'การดำเนินการไม่ถูกต้อง',
'11' : 'วันนี้คุณไม่สามารถอัปโหลดไฟล์แนบที่มีขนาดใหญ่ได้',
'12' : 'ส่งไม่สำเร็จ เนื่องจากชื่อไฟล์มีคำที่ละเอียดอ่อน',
'13' : 'ข้อจำกัดของเซิร์ฟเวอร์จึงไม่สามารถอัปโหลดไฟล์แนบที่มีความละเอียดสูงได้'
};
var form = $('#postform');
$(document).on('change', '#filedata', function() {
popup.open('<img src="' + IMGDIR + '/imageloading.gif">');

uploadsuccess = function(data) {
if(data == '') {
popup.open('อัปโหลดล้มเหลว กรุณาลองอีกครั้งในภายหลัง', 'alert');
}
var dataarr = data.split('|');
if(dataarr[0] == 'DISCUZUPLOAD' && dataarr[2] == 0) {
popup.close();
$('#imglist').append('<li><span aid="'+dataarr[3]+'" class="del"><a href="javascript:;"><img src="<?php echo STATICURL;?>image/mobile/images/icon_del.png"></a></span><span class="p_img"><a href="javascript:;"><img style="height:54px;width:54px;" id="aimg_'+dataarr[3]+'" title="'+dataarr[6]+'" src="<?php echo $_G['setting']['attachurl'];?>forum/'+dataarr[5]+'" /></a></span><input type="hidden" name="attachnew['+dataarr[3]+'][description]" /></li>');
} else {
var sizelimit = '';
if(dataarr[7] == 'ban') {
sizelimit = '(รูปแบบไฟล์แนบไม่ได้รับอนุญาต)';
} else if(dataarr[7] == 'perday') {
sizelimit = '(จะต้องไม่เกิน '+Math.ceil(dataarr[8]/1024)+'K)';
} else if(dataarr[7] > 0) {
sizelimit = '(จะต้องไม่เกิน '+Math.ceil(dataarr[7]/1024)+'K)';
}
popup.open(STATUSMSG[dataarr[2]] + sizelimit, 'alert');
}
};

if(typeof FileReader != 'undefined' && this.files[0]) {//note 支持html5上传新特性

$.buildfileupload({
uploadurl:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
files:this.files,
uploadformdata:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
uploadinputname:'Filedata',
maxfilesize:"<?php echo $swfconfig['max'];?>",
success:uploadsuccess,
error:function() {
popup.open('อัปโหลดล้มเหลว กรุณาลองอีกครั้งในภายหลัง', 'alert');
}
});

} else {

$.ajaxfileupload({
url:'misc.php?mod=swfupload&operation=upload&type=image&inajax=yes&infloat=yes&simple=2',
data:{uid:"<?php echo $_G['uid'];?>", hash:"<?php echo md5(substr(md5($_G[config][security][authkey]), 8).$_G[uid])?>"},
dataType:'text',
fileElementId:'filedata',
success:uploadsuccess,
error: function() {
popup.open('อัปโหลดล้มเหลว กรุณาลองอีกครั้งในภายหลัง', 'alert');
}
});

}
});

<?php if(0 && $_G['setting']['mobile']['geoposition']) { ?>
geo.getcurrentposition();
<?php } ?>
$('#postsubmit').on('click', function() {
var obj = $(this);
if(obj.attr('disable') == 'true') {
return false;
}

obj.attr('disable', 'true').removeClass('btn_pn_blue').addClass('btn_pn_grey');
popup.open('<img src="' + IMGDIR + '/imageloading.gif">');

var postlocation = '';
if(geo.errmsg === '' && geo.loc) {
postlocation = geo.longitude + '|' + geo.latitude + '|' + geo.loc;
}

$.ajax({
type:'POST',
url:form.attr('action') + '&geoloc=' + postlocation + '&handlekey='+form.attr('id')+'&inajax=1',
data:form.serialize(),
dataType:'xml'
})
.success(function(s) {
popup.open(s.lastChild.firstChild.nodeValue);
})
.error(function() {
popup.open('เกิดปัญหาเกี่ยวกับเครือข่าย โปรดลองอีกครั้งในภายหลัง', 'alert');
});
return false;
});

$(document).on('click', '.del', function() {
var obj = $(this);
$.ajax({
type:'GET',
url:'forum.php?mod=ajax&action=deleteattach&inajax=yes&aids[]=' + obj.attr('aid'),
})
.success(function(s) {
obj.parent().remove();
})
.error(function() {
popup.open('เกิดปัญหาเกี่ยวกับเครือข่าย โปรดลองอีกครั้งในภายหลัง', 'alert');
});
return false;
});

</script><?php $nofooter = true;?><?php include template('common/footer'); ?>