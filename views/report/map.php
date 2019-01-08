<?php
use dosamigos\google\maps\LatLng;
use dosamigos\google\maps\overlays\InfoWindow;
use dosamigos\google\maps\overlays\Marker;
use dosamigos\google\maps\Map;

$this->title = 'View GIS';

$coord = new LatLng(['lat'=>18.7909139154675,'lng'=>100.794486824512]);
$map = new Map([
    'center'=>$coord,
    'zoom'=>12,
    'width'=>'100%',
    'height'=>'600',
]);
#print_r($house);
foreach($house->models as $c){
  $coords = new LatLng(['lat'=>$c['latitude'],'lng'=>$c['longitude']]);
  $marker = new Marker(['position'=>$coords]);
  $marker->attachInfoWindow(
    new InfoWindow([
        'content'=>'
            <h4>ที่อยู่ '.$c['address'].'</h4>
              <table class="table table-striped table-bordered table-hover">
                <tr>
                    <td>รหัส</td>
                    <td>house_id: '.$c['house_id'].', village_id: '.$c['village_id'].'</td>
                </tr>
              </table>

        '
    ])
  );

  $map->addOverlay($marker);
}
?>
<div class="panel panel-danger">
    <div class="panel-heading">
        <h3 class="panel-title"><i class="glyphicon glyphicon-signal"></i> การแสดงแผนที่ Google Map จากฐานข้อมูล</h3>
    </div>
    <div class="panel-body">
        <?php
        echo $map->display();
        ?>
    </div>
</div>
