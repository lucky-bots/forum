<?php

/**
 *      [Discuz!] (C)2001-2099 Comsenz Inc.
 *      This is NOT a freeware, use is subject to license terms
 *
 *      $Id: lang_activitylist.php 27449 2012-02-01 05:32:35Z zhangguosheng $
 */

if(!defined('IN_DISCUZ')) {
	exit('Access Denied');
}

$lang = array
(
	'activitylist_fids' => 'เลือกบอร์ด',
	'activitylist_fids_comment' => 'กำหนดบอร์ดที่ต้องการให้แสดงข้อมูล, สามารถกดปุ่ม CTRL ที่คีบอร์ดค้างไว้เพื่อเลือกหลายบอร์ด, หากต้องการให้แสดงทุกบอร์ด ไม่ต้องเลือกบอร์ดใดๆ',
	'activitylist_uids' => 'UID ผู้สนับสนุน',
	'activitylist_uids_comment' => 'กำหนด  UID ผู้สนับสนุนกิจกรรม, หากมีมากกว่าหนึ่ง UID กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ UID',
	'activitylist_startrow' => 'จำนวนแถวเริ่มต้นของข้อมูล',
	'activitylist_startrow_comment' => 'ถ้าจำเป็นต้องตั้งค่าจำนวนแถวของข้อมูลเริ่มต้น, กรุณาใส่ค่าที่ต้องการ, 0 คือจะการเริ่มการทำงานจากแถวแรก, เป็นต้น',
	'activitylist_items' => 'จำนวนข้อมูลที่จะแสดง',
	'activitylist_items_comment' => 'กำหนดจำนวนข้อมูลที่จะแสดง, กรุณากำหนดเป็นจำนวนเต็มที่มากกว่า 0',
	'activitylist_titlelength' => 'จำนวนไบต์สูงสุดของชื่อกระทู้',
	'activitylist_titlelength_comment' => 'กำหนดความยาวของชื่อกระทู้, หากกำหนดจำนวนไบต์เกินจะไม่ลดโดยอัตโนมัติ, 0 คือจะลดโดยอัตโนมัติ',
	'activitylist_fnamelength' => 'จำนวนไบต์สูงสุดของชื่อบอร์ด',
	'activitylist_fnamelength_comment' => 'กำหนดความยาวของชื่อบอร์ด และความยาวของชื่อกระทู้จะถูกนับเข้าด้วยกัน',
	'activitylist_summarylength' => 'จำนวนไบต์สูงสุดของเนื้อหา',
	'activitylist_summarylength_comment' => 'กำหนดจำนวนไบต์สูงสุดของเนื้อหา, 0 คือค่าเริ่มต้น สามารถกำหนดได้สูงสุดถึง 255',
	'activitylist_tids' => 'กำหนดหัวข้อ',
	'activitylist_tids_comment' => 'กำหนด tid ของหัวข้อที่ต้องการ, หากมีมากกว่าหนึ่ง tid กรุณาใช้เครื่องหมายคอมม่า “,” เพื่อเป็นตัวคั่นหรือแยกแต่ละ tid หมายเหตุ: ปล่อยให้ว่างไว้หากไม่มีตัวกรองใดๆ',
	'activitylist_keyword' => 'แท็กของหัวข้อ',
	'activitylist_keyword_comment' => 'ตั้งค่าแท็กของกระทู้ หมายเหตุ: ปล่อยว่างไว้หากไม่มีแท็กใดๆ สามารถใช้สัญลักษณ์ * แทนแท็กหลัก ค้นหาโดยแท็กหลักเพิ่มเติม, สามารถใช้ช่องว่างระหว่างคำ หรือ AND ในการเชื่อมต่อ เช่น win32 AND unix เพื่อให้ตรงกับแท็กหลักที่มากกว่าหนึ่งคำ, สามารถใช้ | หรือ OR ในการเชื่อมต่อ เช่น win32 OR unix',
	'activitylist_typeids' => 'หมวดหมู่หัวข้อ',
	'activitylist_typeids_comment' => 'กำหนดหมวดหมู่หัวข้อ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'activitylist_typeids_all' => 'หมวดหมู่หัวข้อทั้งหมด',
	'activitylist_sortids' => 'หมวดหมู่ข้อมูล',
	'activitylist_sortids_comment' => 'กำหนดหมวดหมู่ข้อมูล หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'activitylist_sortids_all' => 'หมวดหมู่ข้อมูลทั้งหมด',
	'activitylist_digest' => 'กรองกระทู้สำคัญ',
	'activitylist_digest_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้สำคัญ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'activitylist_digest_0' => 'กระทู้ทั่วไป',
	'activitylist_digest_1' => 'กระทู้สำคัญ I',
	'activitylist_digest_2' => 'กระทู้สำคัญ II',
	'activitylist_digest_3' => 'กระทู้สำคัญ III',
	'activitylist_stick' => 'กรองกระทู้ปักหมุด',
	'activitylist_stick_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้ปักหมุด หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'activitylist_stick_0' => 'กระทู้ทั่วไป',
	'activitylist_stick_1' => 'ปักหมุด I',
	'activitylist_stick_2' => 'ปักหมุด II',
	'activitylist_stick_3' => 'ปักหมุด III',
	'activitylist_special' => 'กรองกระทู้พิเศษ',
	'activitylist_special_comment' => 'ตั้งค่าให้กรองเฉพาะกระทู้พิเศษ หมายเหตุ: เลือกทั้งหมดหรือเลือกที่จะไม่มีตัวกรองใดๆ',
	'activitylist_special_1' => 'กระทู้โพล',
	'activitylist_special_2' => 'กระทู้ขายสินค้า',
	'activitylist_special_3' => 'กระทู้รางวัล',
	'activitylist_special_4' => 'กระทู้กิจกรรม',
	'activitylist_special_5' => 'กระทู้โต้วาที',
	'activitylist_special_0' => 'กระทู้ทั่วไป',
	'activitylist_special_reward' => 'กรองกระทู้รางวัล',
	'activitylist_special_reward_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้รางวัลหรือไม่',
	'activitylist_special_reward_0' => 'ทั้งหมด',
	'activitylist_special_reward_1' => 'ได้รับการแก้ไข',
	'activitylist_special_reward_2' => 'ไม่แน่นอน',
	'activitylist_recommend' => 'กรองกระทู้แนะนำ',
	'activitylist_recommend_comment' => 'กำหนดว่าจะแสดงเฉพาะกระทู้แนะนำหรือไม่',
	'activitylist_orderby' => 'การจัดเรียงลำดับกระทู้',
	'activitylist_orderby_comment' => 'ตั้งค่าการจัดเรียงลำดับของกระทู้',
	'activitylist_orderby_lastpost' => 'จัดเรียงตามกระทู้ที่มีการตอบกลับล่าสุด',
	'activitylist_orderby_dateline' => 'จัดเรียงตามวันที่ตั้งกระทู้',
	'activitylist_orderby_replies' => 'จัดเรียงตามจำนวนข้อความตอบกลับ',
	'activitylist_orderby_views' => 'จัดเรียงตามจำนวนการเข้าชม/ดู',
	'activitylist_orderby_heats' => 'จัดเรียงตามความนิยม',
	'activitylist_orderby_recommends' => 'จัดเรียงตามกระทู้แนะนำ',
	'activitylist_orderby_hourviews' => 'จัดเรียงตามการเข้าชมต่อชั่วโมง',
	'activitylist_orderby_todayviews' => 'จัดเรียงตามการเข้าชมต่อวัน',
	'activitylist_orderby_weekviews' => 'จัดเรียงตามการเข้าชมต่อสัปดาห์',
	'activitylist_orderby_monthviews' => 'จัดเรียงตามการเข้าชมต่อเดือน',
	'activitylist_orderby_hours' => 'กำหนดเวลา (ชั่วโมง)',
	'activitylist_orderby_hours_comment' => 'กำหนดเวลาในการจัดเรียงลำดับกระทู้',
	'activitylist_orderby_todayhots' => 'จัดเรียงตามความนิยมต่อวัน',
	'activitylist_orderby_weekhots' => 'จัดเรียงตามความนิยมต่อสัปดาห์',
	'activitylist_orderby_monthhots' => 'จัดเรียงตามความนิยมต่อเดือน',
	'activitylist_price_add' => ' เพิ่มเติม ',
	'activitylist_place' => 'สถานที่จัดกิจกรรม',
	'activitylist_class' => 'ประเภทกิจกรรม',
	'activitylist_class_all' => 'ทุกประเภท',
	'activitylist_gender' => 'ผู้ที่สามารถเข้าร่วม',
	'activitylist_gender_0' => 'ไม่จำกัด',
	'activitylist_gender_1' => 'ผู้ชายเท่านั้น',
	'activitylist_gender_2' => 'ผู้หญิงเท่านั้น',
	'activitylist_orderby_weekstart' => 'จัดเรียงตามสัปดาห์ที่เริ่มต้น',
	'activitylist_orderby_monthstart' => 'จัดเรียงตามเดือนที่เริ่มต้น',
	'activitylist_orderby_weekexp' => 'จัดเรียงตามสัปดาห์ที่สิ้นสุด',
	'activitylist_orderby_monthexp' => 'จัดเรียงตามเดือนที่สิ้นสุด',
	'activitylist_orderby_weekhot' => 'จัดเรียงตามสัปดาห์ที่ได้รับความนิยม',
	'activitylist_orderby_monthhot' => 'จัดเรียงตามเดือนที่ได้รับความนิยม',
	'activitylist_orderby_alltimehot' => 'จัดเรียงตามกระทู้ที่ได้รับความนิยม',
	'activitylist_highlight' => 'เน้นสี',
);

?>