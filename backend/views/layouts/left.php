<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
       

        <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php if (isset($this->blocks['siderbar'])): ?>
                <?= $this->blocks['siderbar'] ?>
            <?php else: ?>
                <?= $this->render('//layouts/sidebar-menu') ?>
            <?php endif; ?>
        <!-- /.sidebar -->


    </section>

</aside>
