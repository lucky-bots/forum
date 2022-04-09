<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('space_profile');?><?php include template('common/header'); ?><div class="box"><a href="forum.php">กลับไปที่บอร์ด</a><span class="pipe">|</span><a href="javascript:history.back();" onclick="javascript:history.back();" title="ย้อนกลับ" >ย้อนกลับ</a></div>
<div class="bm">
<div class="bm_c">
    <div><?php echo $space['username'];?> (UID: <?php echo $space['uid'];?>) <?php if($space['uid'] != $_G['uid']) { ?><a href="home.php?mod=spacecp&amp;ac=pm&amp;touid=<?php echo $space['uid'];?>">ส่ง PM</a><?php } ?> <?php if($_G['group']['allowbanuser']) { ?><a href="forum.php?mod=modcp&amp;action=member&amp;op=ban&amp;uid=<?php echo $space['uid'];?>">แบน</a><?php } ?> <br />เยี่ยมชมโปรไฟล์ <strong class="xi1"><?php echo $space['views'];?></strong></div>
</div>
<div class="bm">
<p class="bm_h">ข้อมูลส่วนตัว</p>
    <div class="bm_c profile_bm_c">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="xs1 profile_table">
    <tr>
        <th align="left" valign="top" class="xw1" >ข้อมูลพื้นฐาน</th>
        <th>&nbsp;</th>
    </tr>
    <?php if(in_array($_G['adminid'], array(1, 2))) { ?>
      <tr>
        <td width="40%" valign="top">Email: </td>
        <td width="60%"><?php echo $space['email'];?></td>
      </tr>
      <?php } ?>
      <tr>
        <td valign="top">สถิติ: </td>
        <td>
            เพื่อน <?php echo $space['friends'];?>
            <br />
            จำนวนทักทาย <?php echo $space['doings'];?>
            <br />
            บล็อก <?php echo $space['blogs'];?>
            <br />
            จำนวนอัลบั้ม <?php echo $space['albums'];?>
        </td>
   	  </tr>
      <?php if(is_array($profiles)) foreach($profiles as $value) { ?>        <tr>
        <td valign="top"><?php echo $value['title'];?>: </td>
        <td><?php echo $value['value'];?></td>
  		</tr>
    	<?php } ?>
        <tr>
        	<th align="left" valign="top" class="xw1">โปรไฟล์แนะนำ</th>
            <th>&nbsp;</th>
        </tr>
        <?php if($space['adminid'] > 0) { ?>
        <tr>
            <td >กลุ่มทีมงาน: </td>
            <td><?php echo $space['admingroup']['grouptitle'];?> <?php echo $space['admingroup']['icon'];?></td>
        </tr>
        <?php } ?>
<tr>
        	<td >กลุ่มสมาชิก: </td><td><?php echo $space['group']['grouptitle'];?><?php echo $space['group']['icon'];?></td>
</tr>
        <?php if($space['extgroupids']) { ?>
        <tr>
        	<td valign="top">กลุ่มพิเศษ: </td><td><?php echo $space['extgroupids'];?></td>
        </tr>
        <?php } ?>
        <tr>
        	<td valign="top" >เวลาออนไลน์: </td><td><?php echo $space['oltime'];?> ชั่วโมง</td>
        <tr>
        	<td valign="top" >วันที่ลงทะเบียน: </td><td><?php echo $space['regdate'];?></td>
        <tr>
        	<td valign="top" >เยี่ยมชมล่าสุด: </td><td><?php echo $space['lastvisit'];?></td>
        <?php if($_G['uid'] == $space['uid'] || $_G['group']['allowviewip']) { ?>
        <tr>
        	<td valign="top" >IP ลงทะเบียน: </td><td><?php echo $space['regip'];?> - <?php echo $space['regip_loc'];?></td>
        <tr>
        	<td valign="top" >IP เยี่ยมชมล่าสุด: </td><td><?php echo $space['lastip'];?> - <?php echo $space['lastip_loc'];?></td>
        <?php } ?>
        <tr>
        	<td valign="top" >กิจกรรมล่าสุด: </td><td><?php echo $space['lastactivity'];?></td>
        <tr>
        	<td valign="top" >โพสต์ล่าสุด: </td><td><?php echo $space['lastpost'];?></td>
        <tr>
        	<td valign="top" >แจ้งเตือนล่าสุด: </td><td><?php echo $space['lastsendmail'];?></td>
        <tr>
        	<td valign="top" >โซนเวลา: </td><td>
            <?php $timeoffset = array(
		'9999' => 'ค่าเริ่มต้น',
		'-12' => '(GMT -12:00) เส้นแบ่งเขตวันสากลฝั่งตะวันตก',
		'-11' => '(GMT -11:00) หมู่เกาะมิดเวย์, ซามัว',
		'-10' => '(GMT -10:00) ฮาวาย',
		'-9' => '(GMT -09:00) อะแลสกา',
		'-8' => '(GMT -08:00) เวลาฝั่งแปซิฟิก(สหรัฐอเมริกาและแคนาดา), ซาราโกซา',
		'-7' => '(GMT -07:00) เวลาเขตภูเขา(สหรัฐอเมริกาและแคนาดา), แอริโซนา',
		'-6' => '(GMT -06:00) เวลาภาคกลาง(สหรัฐอเมริกาและแคนาดา), เม็กซิโกซิตี้',
		'-5' => '(GMT -05:00) เวลาภาคตะวันออก(สหรัฐอเมริกาและแคนาดา), โบโกตา, ลิม่า, กีโต',
		'-4' => '(GMT -04:00) เวลาแอตแลนติก(แคนาดา), การากัส, ลาปาซ',
		'-3.5' => '(GMT -03:30) นิวฟินแลนด์',
		'-3' => '(GMT -03:00) บราซิเลีย, บัวโนสไอเรส, จอร์จทาวน์, หมู่เกาะฟอล์คแลนด์',
		'-2' => '(GMT -02:00) มิดแอตแลนติก, หมู่เกาะอะเซนชั่น, เซนต์เฮเลนา',
		'-1' => '(GMT -01:00) อะซอร์ซ, หมู่เกาะเคปเวิร์ด [เวลามาตรฐานกรีนิช] ดับลิน, ลอนดอน, ลีสบัน, กาซาบลังกา',
		'0' => '(GMT) กาซาบลังกา, ดับลิน, เอดินบะระ, ลอนดอน, ลีสบัน, มอนโรเวีย',
		'1' => '(GMT +01:00) เบอร์ลิน, บรัสเซลส์, โคเปนเฮเกน, มาดริด, ปารีส, โรม',
		'2' => '(GMT +02:00) เฮลซิงกิ, คาลินินกราด, แอฟริกาใต้, วอร์ซอ',
		'3' => '(GMT +03:00) แบกแด็ด, ริยาด, มอสโก, ไนโรบี',
		'3.5' => '(GMT +03:30) เตหะราน',
		'4' => '(GMT +04:00) อาบูดาบี, บากู, มัซคะท, ทบิลิซิ',
		'4.5' => '(GMT +04:30) คาบูล',
		'5' => '(GMT +05:00) ยีคาเตรินบูรรรร์ก, อิสลามาบัด, การาจี, ทาชเคนต์',
		'5.5' => '(GMT +05:30) มุมไบ, กัลกัตตา, มาตราส, นิวเดลี',
		'5.75' => '(GMT +05:45) กาฐมาณฑุ',
		'6' => '(GMT +06:00) อัลมาตี, โคลัมโบ, ธากา, โนโวซีบีรสค์',
		'6.5' => '(GMT +06:30) ย่างกุ้ง',
		'7' => '(GMT +07:00) กรุงเทพฯ ฮานอย, จาการ์ตา',
		'8' => '(GMT +08:00) ปักกิ่ง, ฮ่องกง, เปย์จิง, สิงคโปร์, ไทเป',
		'9' => '(GMT +09:00) โอซาก้า, ซัปโปโร, โซล, โตเกียว, ยาคุตสค์',
		'9.5' => '(GMT +09:30) แอดิเลด, ดาร์วิน',
		'10' => '(GMT +10:00) แคนเบอร์ร่า, กวม, เมลเบิร์น, ซิดย์นี่, วลาดิวอสต็อก',
		'11' => '(GMT +11:00) มากาดาน, นิวแคลิโดเนีย, หมู่เกาะโซโลมอน',
		'12' => '(GMT +12:00) โอคแลนด์, เวลลิงตัน, ฟิจิ, หมู่เกาะมาร์แชลล์');?>            <?php echo $timeoffset[$space['timeoffset']];?>
        </td>
</table>
  </div>
</div><?php include template('common/footer'); ?>