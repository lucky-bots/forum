<?php if(!defined('IN_DISCUZ')) exit('Access Denied'); hookscriptoutput('forumdisplay');?><?php include template('common/header'); if($_G['forum']['type'] == 'forum') { ?>
<div class="box"><a href="forum.php" title="<?php echo $_G['setting']['navs']['2']['navname'];?>"><?php echo $_G['setting']['navs']['2']['navname'];?></a> <em> &gt; </em> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['forum']['fid'];?>"><?php echo $_G['forum']['name'];?></a></div>
<?php } else { ?>
<div class="box"><a href="forum.php" title="<?php echo $_G['setting']['navs']['2']['navname'];?>"><?php echo $_G['setting']['navs']['2']['navname'];?></a> <em> &gt; </em> <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $forum_up['fid'];?>"><?php echo $forum_up['name'];?></a> <em> &gt; </em> <?php echo $_G['forum']['name'];?></div>
<?php } ?>

<div class="box flif">
<?php if(!$subforumonly) { ?>
    	วันนี้<?php echo $_G['forum']['todayposts'];?><span class="pipe">|</span>กระทู้<?php echo $_G['forum']['threads'];?></span><?php } if($_G['uid']) { ?><span class="pipe">|</span><a href="home.php?mod=spacecp&amp;ac=favorite&amp;type=forum&amp;id=<?php echo $_G['fid'];?>&amp;formhash=<?php echo FORMHASH;?>" title="บุ๊คมาร์ก" >บุ๊คมาร์ก</a><?php } ?>
</div>


<div class="tz pbn">
<?php if(!$_G['forum']['allowspecialonly']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>" title="ส่ง" >ส่ง</a><span class="pipe">|</span><?php } if($_G['group']['allowpostpoll']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=1">โพล</a><span class="pipe">|</span><?php } if($_G['group']['allowpostreward']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=3">รางวัล</a><span class="pipe">|</span><?php } if($_G['group']['allowpostdebate']) { ?><a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;special=5">โต้วาที</a><span class="pipe">|</span><?php } if($_G['setting']['threadplugins']) { if(is_array($_G['forum']['threadplugin'])) foreach($_G['forum']['threadplugin'] as $tpid) { if(array_key_exists($tpid, $_G['setting']['threadplugins']) && @in_array($tpid, $_G['group']['allowthreadplugin'])) { ?>
<a href="forum.php?mod=post&amp;action=newthread&amp;fid=<?php echo $_G['fid'];?>&amp;specialextra=<?php echo $tpid;?>"><?php echo $_G['setting']['threadplugins'][$tpid]['name'];?></a><span class="pipe">|</span>
<?php } } } ?>
</div>

<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_top_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_top_mobile'];?>
<!--//forumdisplay_list template start-->
<?php if(!$subforumonly) { ?>
<?php echo $multipage;?>
    <div class="tl">
    	<div class="bm">
        	<div class="bm_h"><?php echo $_G['forum']['name'];?> <?php if($_GET['orderby'] != 'dateline') { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=author&amp;orderby=dateline">[กระทู้ใหม่]</a><?php } else { ?><a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>">[มาตรฐาน]</a><?php } ?></div>
            <?php if($_G['forum_threadcount']) { if(is_array($_G['forum_threadlist'])) foreach($_G['forum_threadlist'] as $key => $thread) { ?>                	<?php if($thread['displayorder'] > 0 && !$displayorder_thread) { ?>
                <?php $displayorder_thread = 1;?>                    <?php } ?>
                	<div class="bm_c<?php if($thread['displayorder'] == 0 && $displayorder_thread == 1) { ?> bt<?php unset($displayorder_thread);?><?php } ?>">
                    <?php if(!$thread['forumstick'] && ($thread['isgroup'] == 1 || $thread['fid'] != $_G['fid'])) { ?>
                        <?php if($thread['related_group'] == 0 && $thread['closed'] > 1) { ?>
                            <?php $thread[tid]=$thread[closed];?>                        <?php } ?>
                        <?php if($groupnames[$thread['tid']]) { ?>
                            [<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $groupnames[$thread['tid']]['fid'];?>" target="_blank">คลับ</a>]
                        <?php } ?>
                    <?php } if($thread['moved']) { $thread[tid]=$thread[closed];?><?php } ?>
                    <?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key])) echo $_G['setting']['pluginhooks']['forumdisplay_thread_mobile'][$key];?>
                    <a href="forum.php?mod=viewthread&amp;tid=<?php echo $thread['tid'];?>" <?php echo $thread['highlight'];?> >
                    <?php if($_G['setting']['mobile']['mobilesimpletype'] == 0) { ?>
                        <?php if($thread['folder'] == 'lock') { ?>
                            <img src="<?php echo IMGDIR;?>/folder_lock.gif" />
                        <?php } elseif($thread['special'] == 1) { ?>
                            <img src="<?php echo IMGDIR;?>/pollsmall.gif" alt="โพล" />
                        <?php } elseif($thread['special'] == 2) { ?>
                            <img src="<?php echo IMGDIR;?>/tradesmall.gif" alt="สินค้า" />
                        <?php } elseif($thread['special'] == 3) { ?>
                            <img src="<?php echo IMGDIR;?>/rewardsmall.gif" alt="รางวัล" />
                        <?php } elseif($thread['special'] == 4) { ?>
                            <img src="<?php echo IMGDIR;?>/activitysmall.gif" alt="กิจกรรม" />
                        <?php } elseif($thread['special'] == 5) { ?>
                            <img src="<?php echo IMGDIR;?>/debatesmall.gif" alt="โต้วาที" />
                        <?php } elseif(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
                            <img src="<?php echo IMGDIR;?>/pin_<?php echo $thread['displayorder'];?>.gif" alt="<?php echo $_G['setting']['threadsticky'][3-$thread['displayorder']];?>" style="width:18px;"/>
                        <?php } ?>
                    <?php } else { ?>
                    	<?php if(in_array($thread['displayorder'], array(1, 2, 3, 4))) { ?>
                        	[ปักหมุด]
                        <?php } ?>
                    <?php } ?>
                   	<?php echo $thread['subject'];?></a>
                    <?php if($_G['setting']['mobile']['mobilesimpletype'] == 0) { ?>
                        <?php if($thread['displayorder'] == 0) { ?>
                                <?php if($thread['recommendicon'] && $filter != 'recommend') { ?>
                                    <img src="<?php echo IMGDIR;?>/recommend_<?php echo $thread['recommendicon'];?>.gif" align="absmiddle" alt="recommend" title="แนะนำ <?php echo $thread['recommends'];?>" />
                                <?php } ?>
                                <?php if($thread['digest'] > 0 && $filter != 'digest') { ?>
                                    <img src="<?php echo IMGDIR;?>/digest_<?php echo $thread['digest'];?>.gif" align="absmiddle" alt="digest" title="สำคัญ <?php echo $thread['digest'];?>" />
                                <?php } ?>
                        <?php } ?>
                    <?php } elseif($_G['setting']['mobile']['mobilesimpletype'] == 1) { ?>
                    	<?php if($thread['displayorder'] == 0) { ?>
                                <?php if($thread['recommendicon'] && $filter != 'recommend') { ?>
                                    [แนะนำ]
                                <?php } ?>

                                <?php if($thread['digest'] > 0 && $filter != 'digest') { ?>
                                    [สำคัญ]
                                <?php } ?>
                        <?php } ?>
                    <?php } ?>
                    <?php if(!$_G['setting']['mobile']['mobilesimpletype']) { ?>
                        <br />
                        <span class="xg1">
                        <?php if($thread['authorid'] && $thread['author']) { ?>
                            <a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>"><?php echo $thread['author'];?></a>
                        <?php } else { ?>
                            <?php if($_G['forum']['ismoderator']) { ?>
                                <a href="home.php?mod=space&amp;uid=<?php echo $thread['authorid'];?>" >ไม่ระบุชื่อ</a>
                            <?php } else { ?>
                                <?php echo $_G['setting']['anonymoustext'];?>
                            <?php } ?>
                        <?php } ?>
                        <?php echo $thread['dateline'];?>
                        <?php if($thread['replies'] > 0) { ?>โพสต์<?php echo $thread['replies'];?><?php } ?>
                        </span>
                    <?php } ?>
                    </div>
                <?php } ?>
            <?php } else { ?>
            <div class="bm_c">บอร์ดนี้ยังไม่มีกระทู้</div>
            <?php } ?>
        </div>
    </div>
    <?php echo $multipage;?>
<?php } if(!$_G['setting']['mobile']['mobilesimpletype']) { ?>
    <?php if(($_G['forum']['threadtypes'] && $_G['forum']['threadtypes']['listable']) || $_G['forum']['threadsorts']) { ?>
        <?php if($_G['forum']['threadtypes']) { ?>
            <div class="box ttp">
            <span class="xg2">ประเภทกระทู้ </span>
            <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?><?php if($_GET['archiveid']) { ?>&amp;archiveid=<?php echo $_GET['archiveid'];?><?php } ?>" class="<?php if($_GET['filter'] != 'typeid') { ?>xw1<?php } ?>">ทั้งหมด</a>
            <?php if(is_array($_G['forum']['threadtypes']['types'])) foreach($_G['forum']['threadtypes']['types'] as $id => $name) { ?>                 <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=typeid&amp;typeid=<?php echo $id;?><?php echo $forumdisplayadd['typeid'];?>" <?php if($_GET['filter'] == 'typeid' && $_GET['typeid'] == $id) { ?> class="xw1"<?php } ?>><?php echo $name;?></a>
            <?php } ?>
            </div>
        <?php } ?>

        <?php if($_G['forum']['threadsorts']) { ?>
            <div class="box tst">
            <span class="xg2">หมวดหมู่ข้อมูล </span>
            <?php if(is_array($_G['forum']['threadsorts']['types'])) foreach($_G['forum']['threadsorts']['types'] as $id => $name) { ?>                <a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $_G['fid'];?>&amp;filter=sortid&amp;sortid=<?php echo $id;?><?php echo $forumdisplayadd['sortid'];?>" class="<?php if($_GET['sortid'] == $id) { ?>xw1<?php } ?>"><?php echo $name;?></a>
            <?php } ?>
            </div>
        <?php } ?>
    <?php } } ?>
<!--//forumdisplay_list template end-->
<?php if(!empty($_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'])) echo $_G['setting']['pluginhooks']['forumdisplay_bottom_mobile'];?>

<?php if($subexists && $_G['page'] == 1) { ?>
<div class="fl">
    <div class="bm">
        <div class="bm_h">บอร์ดย่อย</div>
        <?php if(is_array($sublist)) foreach($sublist as $sub) { ?>        <div class="bm_c arrow_r">
        	<a href="forum.php?mod=forumdisplay&amp;fid=<?php echo $sub['fid'];?>" class="block_a"><?php echo $sub['name'];?></a>
        </div>
        <?php } ?>
    </div>
</div>
<?php } include template('common/footer'); ?>