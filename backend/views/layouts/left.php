<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username  ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php if (isset($this->blocks['siderbar'])): ?>
                <?= $this->blocks['siderbar'] ?>
            <?php else: ?>
                <?= $this->render('//layouts/sidebar-menu') ?>
            <?php endif; ?>
        <!-- /.sidebar -->


    </section>

</aside>
