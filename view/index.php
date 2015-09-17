<?php
$nom_sector = "";
$nom_page = "";
include ('include/header.php');
?>
    <body>
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top">            
            <!-- PAGE CONTENT -->
            <div class="page-content">
                
                <?php include ('include/headerbar.php'); ?>
                
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#"><?= NOM_LOGICIEL; ?></a></li>
                    <li><a href="#"><?php if(!empty(nom_sector($nom_sector))){echo nom_sector($nom_sector);} ?></a></li>
                    <li class="active"><?= nom_page($nom_page); ?></li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> <?= nom_page($nom_page); ?></h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">                
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">
                                    Add class <code>.page-navigation-top</code> to <code>.page-container</code> to use top navigation
                                </div>
                            </div>
                        </div>
                    </div>
                
                </div>
                <!-- PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->

        <!-- START PRELOADS -->
        <audio id="audio-alert" src="<?= ROOT,ASSETS,AUDIO; ?>alert.mp3" preload="auto"></audio>
        <audio id="audio-fail" src="<?= ROOT,ASSETS,AUDIO; ?>fail.mp3" preload="auto"></audio>
        <!-- END PRELOADS -->               

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS,PLUGINS; ?>jquery/jquery.min.js"></script>
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS,PLUGINS; ?>jquery/jquery-ui.min.js"></script>
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS,PLUGINS; ?>bootstrap/bootstrap.min.js"></script>
        <!-- END PLUGINS -->

        <!-- THIS PAGE PLUGINS -->
        <script type='text/javascript' src='<?= ROOT,ASSETS,JS,PLUGINS; ?>icheck/icheck.min.js'></script>
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS,PLUGINS; ?>mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>
        <!-- END PAGE PLUGINS -->       

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS; ?>settings.js"></script>
        
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS; ?>plugins.js"></script>
        <script type="text/javascript" src="<?= ROOT,ASSETS,JS; ?>actions.js"></script>
        <!-- END TEMPLATE -->
    <!-- END SCRIPTS -->         
    </body>
</html>






