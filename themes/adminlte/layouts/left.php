<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?=Yii::$app->request->baseUrl.'/user/'.(Yii::$app->user->isGuest? 'imgGuest.png' : Yii::$app->user->identity->image)?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->isGuest ? null : Yii::$app->user->identity->username;?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    //OPD Menu
                    ['label' => 'เมนูทั่วไป', 'options' => ['class' => 'header']],
                    ['label' => 'ขอใช้รถ', 'icon' => 'fa fa-pencil-square', 'url' => ['/jongcar/create']],
                    ['label' => 'รายการขอใช้รถ', 'icon' => 'fa fa-bookmark-o', 'url' => ['/jongcar/index']],//lists
                    //['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    //['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'icon' => 'fa fa-sign-in', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    //Admin
                    ['label' => 'ระบบจองรถ', 'options' => ['class' => 'header'], 'visible' => (!Yii::$app->user->isGuest)],
                    [
                        'label' => 'ข้อมูลพื้นฐาน',
                        'icon' => 'fa fa-share',
                        'url' => 'Javascript::void()',
                        'items' =>
                            [
                                ['label' => 'ผู้ใช้งาน', 'icon' => 'fa fa-bookmark-o', 'url' => ['/user/index']],
                                ['label' => 'เพิ่มผู้ใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/user/create']],
                                ['label' => 'ยี่ห้อรถ', 'icon' => 'fa fa-bookmark-o', 'url' => ['/brand/index']],
                                ['label' => 'เพิ่มยี่ห้อรถ', 'icon' => 'fa fa-edit', 'url' => ['/brand/create']],
                                ['label' => 'รถ', 'icon' => 'fa fa-car', 'url' => ['/car/index']],
                                ['label' => 'เพิ่มรถ', 'icon' => 'fa fa-edit', 'url' => ['/car/create']],
                                //['label' => 'รายการบำรุงก่อนใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/sysm1car/index']],
                                //['label' => 'รายการบำรุงขณะใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/sysm2car/index']],
                                //['label' => 'รายการบำรุงหลังใช้งาน', 'icon' => 'fa fa-edit', 'url' => ['/sysm3car/index']],
                            ],
                        'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='1')
                    ],
                    [
                        'label' => 'จัดการระบบ',
                        'icon' => 'fa fa-share',
                        'url' => 'Javascript::void()',
                        'items' =>
                            [
                                ['label' => 'ผู้ควบคุมรถ', 'icon' => 'fa fa-bookmark-o', 'url' => ['/pscar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='2')],
                                ['label' => 'อนุมัติขอใช้รถ', 'icon' => 'fa fa-bookmark-o', 'url' => ['/mapcar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='2')],
                                ['label' => 'บันทึกการใช้รถ', 'icon' => 'fa fa-bookmark-o', 'url' => ['/usecar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='3')],
                                ['label' => 'บันทึกตำบลเดินทาง', 'icon' => 'fa fa-bookmark-o', 'url' => ['/outcar/index'], 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='3')],
                                #['label' => 'บันทึกการบำรุงรถ', 'icon' => 'fa fa-bookmark-o', 'url' => 'javascript:void(0)', 'visible' => (!Yii::$app->user->isGuest && Yii::$app->user->identity->leveled=='3')],
                            ],
                        'visible' => (!Yii::$app->user->isGuest)
                    ],
                    //Map Google gis
                    ['label' => 'รายงาน', 'options' => ['class' => 'header'], 'visible' => !Yii::$app->user->isGuest],
                    [
                        'label' => 'GIS',
                        'icon' => 'fa fa-share',
                        'url' => 'Javascript::void()',
                        'items' =>
                            [
                                ['label' => 'test', 'icon' => 'fa fa-circle-o', 'url' => ['/report/map']],
                            ],
                        'visible' => !Yii::$app->user->isGuest
                    ],
                    [
                        'label' => 'รายงานการจ่ายรถ',
                        'icon' => 'fa fa-share',
                        'url' => 'Javascript::void()',
                        'items' =>
                            [
                                ['label' => 'รายงานการจ่ายรถประจำวัน', 'icon' => 'fa fa-circle-o', 'url' => ['/report/outcartoday']],
                            ],
                        'visible' => !Yii::$app->user->isGuest
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
