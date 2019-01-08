<?php
use yii\helpers\Html;
use app\controllers\MainController As cmain;
use kartik\detail\DetailView;
?>
<table width="100%">
  <tr>
    <td align="right">ทบ.๔๖๑-๐๐๑</td>
  </tr>
  <tr>
    <td align="center"><h3>ใบขออนุญาตใช้รถ</h3></td>
  </tr>
  <tr>
    <td align="right">(ย.๔๒)<br/>ต้นขั้ว</td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td align="left">ที่<span class="dot"><?=cmain::mapSpace(10).'/'.cmain::mapSpace(5)?></span></td>
    <td align="right">ส่วนราชการ<span class="dot"><?=cmain::mapSpace(20)?>รพ.ค่ายสุริยพงษ์<?=cmain::mapSpace(8)?></span></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td align="right">วันที่<span class="dot"><?=cmain::mapSpace(3).cmain::getNumThai(date('d', strtotime($cared->vdate))).cmain::mapSpace(3)?></span>
      เดือน<span class="dot"><?=cmain::mapSpace(4).cmain::getFMonth(date('m', strtotime($cared->vdate))).cmain::mapSpace(4)?></span>
      พ.ศ.<span class="dot"><?=cmain::mapSpace(3).cmain::getNumThai(date('Y', strtotime($cared->vdate))+543)?>       </span>
    </td>
  </tr>
  <tr>
    <td>เรียน <span class="dot"><?=cmain::mapSpace(40)?></span></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td align="right">ข้าพเจ้า <span class="dot"><?=cmain::mapSpace(5).$cared->person.cmain::mapSpace(10)?></span></td>
    <td align="left">ตำแหน่ง <span class="dot"><?=cmain::mapSpace(5).$cared->post.cmain::mapSpace(10)?></span></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td>ขอใช้รถ(ชนิดรถ)<span class="dot"><?=cmain::mapSpace(3).cmain::getNumThai($cared->cared).cmain::mapSpace(3)?></span></td>
  </tr>
  <tr>
    <td>เพื่อไปราชการ<span class="dot"><?=cmain::mapSpace(3).$cared->station.cmain::mapSpace(3)?></span></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td>จำนวน<span class="dot"><?=cmain::mapSpace(3).cmain::getNumThai($cared->cno).cmain::mapSpace(3)?></span>คน</td>
    <td>สิ่งของหนักประมาณ<span class="dot"><?=cmain::mapSpace(3).cmain::getNumThai($cared->thing).cmain::mapSpace(3)?></span>กม.</td>
    <td>ปริมาตร<span class="dot"><?=cmain::mapSpace(3).cmain::getNumThai($cared->size).cmain::mapSpace(3)?></span>ชิ้น</td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td>ผู้ควบคุมรถ(ยศ,ชื่อ) <span class="dot"><?=cmain::mapSpace(2).@$cared->pscar->psname.cmain::mapSpace(2)?></span></td>
    <td>ตำแหน่ง <span class="dot"><?=cmain::mapSpace(2).@$cared->pscar->post.cmain::mapSpace(2)?></span></td>
    <td>โทรศัพท์ <span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(@$cared->pscar->tel).cmain::mapSpace(2)?></span></td>
  </tr>
</table>
<table width="100%">
  <tr>
    <td width="40%">ไปรับที่<span class="dot"><?=cmain::mapSpace(3).$cared->rab_station.cmain::mapSpace(3)?></span></td>
    <td width="15%">ตั้งแต่ที่วันที่<span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(date('d', strtotime($cared->rab_date))).cmain::mapSpace(3)?></span></td>
    <td width="20%">เดือน<span class="dot"><?=cmain::mapSpace(2).cmain::getFMonth(date('m', strtotime($cared->rab_date))).cmain::mapSpace(3)?></span></td>
    <td width="15%">พ.ศ.<span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(date('Y', strtotime($cared->rab_date))+543).cmain::mapSpace(3)?></span></td>
    <td width="10%">เวลา<span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(date('H:i', strtotime($cared->rab_date))).cmain::mapSpace(3)?></span></td>
  </tr>
  <tr>
    <td width="40%">ไปส่งที่<span class="dot"><?=cmain::mapSpace(2).$cared->song_station.cmain::mapSpace(3)?></span></td>
    <td width="15%">ถึงวันที่<span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(date('d', strtotime($cared->song_date))).cmain::mapSpace(3)?></span></td>
    <td width="20%">เดือน<span class="dot"><?=cmain::mapSpace(2).cmain::getFMonth(date('m', strtotime($cared->song_date))).cmain::mapSpace(3)?></span></td>
    <td width="15%">พ.ศ.<span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(date('Y', strtotime($cared->song_date))+543).cmain::mapSpace(3)?></span></td>
    <td width="10%">เวลา<span class="dot"><?=cmain::mapSpace(2).cmain::getNumThai(date('H:i', strtotime($cared->song_date))).cmain::mapSpace(3)?></span></td>
  </tr>
  <tr>
    <td colspan="5">ไปและกลับ<span class="dot"><?=cmain::mapSpace(5).cmain::getNumThai($cared->caruse).cmain::mapSpace(5)?></span>เที่ยว</td>
  </tr>
  <tr>
    <td align="right" colspan="5">ลงชื่อ<span class="dot"><?=cmain::mapSpace(50)?></span></td>
  </tr>
  <tr>
    <td align="right" colspan="5">ตำแหน่ง<span class="dot"><?=cmain::mapSpace(45)?></span></td>
  </tr>
</table>
<br/>
<u>หมายเหตุ</u>  ให้เสนอรายงานตามลำดับชั้นถึงผู้มีอำนาจอนุมัติ
