<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); ?>
</div>
<?php if(!empty($_G['setting']['pluginhooks']['global_footer_mobile'])) echo $_G['setting']['pluginhooks']['global_footer_mobile'];?>
<div class="ft">
<p><a href="<?php echo $_G['setting']['siteurl'];?>" target="_blank"><?php echo $_G['setting']['sitename'];?></a></p>
<p>Powered by <strong><a href="http://www.discuz.net" target="_blank">Discuz!</a></strong> <em><?php echo $_G['setting']['version'];?></em></p>
<p><a href="<?php echo $nav;?>">โฮมเพจ</a><span class="pipe">|</span>รูปแบบทั่วไป<span class="pipe">|</span><a href="<?php echo $_G['setting']['mobile']['simpletypeurl']['2'];?>" class="xw0" title="รูปแบบโมเดิร์น">รูปแบบโมเดิร์น</a><span class="pipe">|</span><a href="<?php echo $_G['setting']['mobile']['nomobileurl'];?>" class="xw0" title="รูปแบบคอมพิวเตอร์">รูปแบบคอมพิวเตอร์</a></p>
</div>
</body>
</html><?php updatesession();?><?php if(defined('IN_MOBILE')) { output();?><?php } else { output_preview();?><?php } ?>
