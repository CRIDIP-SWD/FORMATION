<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- BEGIN SIDEBAR -->
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <?php if($info_user['type'] == 0){ ?>
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item <?php if($_GET['view'] == 'client'){echo "active open";} ?>">
                    <a href="index.php?view=client" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Client</span>
                    </a>
                </li>
                <li class="nav-item <?php if($_GET['view'] == 'demande'){echo "active open";} ?>">
                    <a href="index.php?view=demande" class="nav-link nav-toggle">
                        <i class="icon-file"></i>
                        <span class="title">Demande</span>
                    </a>
                </li>
                <li class="nav-item <?php if($_GET['view'] == 'calendar'){echo "active open";} ?>">
                    <a href="index.php?view=calendar" class="nav-link nav-toggle">
                        <i class="icon-calendar"></i>
                        <span class="title">Formation</span>
                    </a>
                </li>
            </ul>
        <?php } ?>
        <?php if($info_user['type'] == 1){ ?>
            <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                <li class="nav-item <?php if($_GET['view'] == 'info'){echo "active open";} ?>">
                    <a href="index.php?view=info" class="nav-link nav-toggle">
                        <i class="icon-user"></i>
                        <span class="title">Vos Informations</span>
                    </a>
                </li>
                <li class="nav-item <?php if($_GET['view'] == 'formation'){echo "active open";} ?>">
                    <a href="index.php?view=formation" class="nav-link nav-toggle">
                        <i class="icon-calendar"></i>
                        <span class="title">Vos Formations</span>
                    </a>
                </li>
            </ul>
        <?php } ?>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->