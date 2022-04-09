<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('register');
0
|| checktplrefresh('./template/default/touch/member/register.htm', './template/default/touch/common/seccheck.htm', 1649492505, '1', './data/template/1_1_touch_member_register.tpl.php', './template/default', 'touch/member/register')
;?><?php include template('common/header'); ?><!-- header start -->
<header class="header">
    <div class="nav">
        <a href="javascript:;" onclick="history.go(-1)" class="z"><img src="<?php echo STATICURL;?>image/mobile/images/icon_back.png" /></a>
<span>สมัครสมาชิก</span>
    </div>
</header>
<!-- header end -->
<!-- registerbox start -->
<div class="loginbox registerbox">
<form method="post" autocomplete="off" name="register" id="registerform" action="member.php?mod=<?php echo $_G['setting']['regname'];?>&amp;mobile=2">
<input type="hidden" name="regsubmit" value="yes" />
<input type="hidden" name="formhash" value="<?php echo FORMHASH;?>" /><?php $dreferer = str_replace('&amp;', '&', dreferer());?><input type="hidden" name="referer" value="<?php echo $dreferer;?>" />
<input type="hidden" name="activationauth" value="<?php if($_GET['action'] == 'activation') { ?><?php echo $activationauth;?><?php } ?>" />
<input type="hidden" name="agreebbrule" value="<?php echo $bbrulehash;?>" id="agreebbrule" checked="checked" />
<?php if($_G['setting']['sendregisterurl']) { ?>
<input type="hidden" name="hash" value="<?php echo $_GET['hash'];?>" />
<?php } ?>
<div class="login_from">
<ul>
<?php if($sendurl) { ?>
<li class="bl_none"><input type="email" tabindex="1" class="px p_fre" size="30" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['email'];?>" placeholder="อีเมล" fwin="login"></li>
<?php } else { if(empty($invite) && $_G['setting']['regstatus'] == 2 && !$invitestatus) { ?>
<li><input type="text" tabindex="1" class="px p_fre" size="30" autocomplete="off" value="โค้ดเชิญชวน" name="invitecode" placeholder="โค้ดเชิญชวน" fwin="login"></li>
<?php } ?>
<li><input type="text" tabindex="2" class="px p_fre" size="30" autocomplete="off" value="" name="<?php echo $_G['setting']['reginput']['username'];?>" placeholder="ชื่อสมาชิก: 3-15 ตัวอักษร" fwin="login"></li>
<li><input type="password" tabindex="3" class="px p_fre" size="30" value="" name="<?php echo $_G['setting']['reginput']['password'];?>" placeholder="รหัสผ่าน" fwin="login"></li>
<li><input type="password" tabindex="4" class="px p_fre" size="30" value="" name="<?php echo $_G['setting']['reginput']['password2'];?>" placeholder="ยืนยันรหัสผ่าน" fwin="login"></li>
<li><input type="email" tabindex="5" class="px p_fre" size="30" autocomplete="off" value="<?php echo $hash['0'];?>" name="<?php echo $_G['setting']['reginput']['email'];?>" placeholder="อีเมล" fwin="login"></li>
<?php if($_G['setting']['regverify'] == 2) { ?>
<li><input type="text" tabindex="6" class="px p_fre" size="30" autocomplete="off" value="เหตุผลสำหรับการลงทะเบียน" name="regmessage" placeholder="เหตุผลสำหรับการลงทะเบียน" fwin="login"></li>
<?php } if(empty($invite) && $_G['setting']['regstatus'] == 3) { ?>
<li><input type="text" tabindex="7" class="px p_fre" size="30" autocomplete="off" value="โค้ดเชิญชวน" name="invitecode" placeholder="โค้ดเชิญชวน" fwin="login"></li>
<?php } if(is_array($_G['cache']['fields_register'])) foreach($_G['cache']['fields_register'] as $field) { if($htmls[$field['fieldid']]) { ?>
<li><strong><?php echo $field['title'];?></strong><br /><?php echo $htmls[$field['fieldid']];?></li>	
<?php } } } ?>
</ul>
<?php if($secqaacheck || $seccodecheck) { $sechash = 'S'.random(4);
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
</div>
<div class="btn_register"><button tabindex="7" value="true" name="regsubmit" type="submit" class="formdialog pn pnc"><span>สมัครสมาชิก</span></button></div>
</form>
</div>
<!-- registerbox end --><?php updatesession();?><?php include template('common/footer'); ?>