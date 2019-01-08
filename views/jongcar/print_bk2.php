<?php
use yii\helpers\Html;
use app\controllers\MainController As cmain;
use kartik\detail\DetailView;
?>
<div>อนุมัติ เรียน ผบ.มทบ.38</div>
<h3>ใบขออนุญาตใช้รถ</h3>
ที<span class="dot"><?=cmain::mapSpace(13).'/'.cmain::mapSpace(9)?></span>ส่วนราชการ<span class="dot"><?=cmain::mapSpace(5)?>รพ.ค่ายสุริยพงษ์<?=cmain::mapSpace(5)?></span>
<br/>วันที่<span class="dot"><?=cmain::mapSpace(3).date('d', strtotime($cared->vdate)).cmain::mapSpace(3)?></span>
เดือน<span class="dot"><?=cmain::mapSpace(4).cmain::getSMonth(date('m', strtotime($cared->vdate))).cmain::mapSpace(4)?></span>
พ.ศ.<span class="dot"><?=cmain::mapSpace(3).(date('Y', strtotime($cared->vdate))+543)?></span>
<br/>เรียน<?=cmain::mapSpace(5)?>ผบ.มทบ.38
<br/>ข้าพเจ้า<span class="dot"><?=cmain::mapSpace(5).$cared->person.cmain::mapSpace(15)?></span>
ตำแหน่ง<span class="dot"><?=cmain::mapSpace(5).$cared->post.cmain::mapSpace(5)?></span>
<br/>ขอใช้รถ(ชนิดรถ)<span class="dot"><?=$cared->carid?></span> จำนวน<span class="dot"><?=$cared->cno?></span>คัน
<br/>เพื่อไปราชการ<span class="dot"><?=$cared->station?></span>
<br/>จำนวน<span class="dot"><?=$cared->cno?></span>คน  สิ่งของหนักประมาณ<span class="dot"><?=$cared->thing?></span> ปริมาตร<span class="dot"><?=$cared->size?></span>
<br/>ผู้ควบคุมรถ(ยศ,ชื่อ)<span class="dot"><?=cmain::mapSpace(3)?></span>ตำแหน่ง
<br/>โทรศัพท์<span class="dot"><?=$cared->cno?></span>ไปรับที่<span class="dot"><?=$cared->rab_station?></span>
ตั้งแต่ที่วันที่<span class="dot"><?=date('d', strtotime($cared->rab_date))?></span>
เดือน<span class="dot"><?=date('M', strtotime($cared->rab_date))?></span>
พ.ศ.<span class="dot"><?=date('Y', strtotime($cared->rab_date))+543?></span>
เวลา<span class="dot"><?=date('H:i:s', strtotime($cared->rab_date))?></span>
<br/>ไปส่งที่<span class="dot"><?=$cared->song_station?></span>
ถึงวันที่<span class="dot"><?=date('d', strtotime($cared->song_date))?></span>
เดือน<span class="dot"><?=date('M', strtotime($cared->song_date))?></span>
พ.ศ.<span class="dot"><?=date('Y', strtotime($cared->song_date))+543?></span>
เวลา<span class="dot"><?=date('H:i:s', strtotime($cared->song_date))?></span>
<br/>ไปและกลับ<input class="vald" value="<?=$cared->caruse?>">เที่ยว
<br/>เรียน  ผบ.มทบ.38
<br/>ลงชื่อ
<br/>ตำแหน่ง
<br/>หมายเหตุ  ให้เสนอรายงานตามลำดับชั้นถึงผู้มีอำนาจอนุมัติ
