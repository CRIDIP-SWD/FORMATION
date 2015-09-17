<?php
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
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Layouts</a></li>
                    <li class="active">Navigation Top</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Navigation Top</h2>
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

        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="pages-login.html" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->

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






