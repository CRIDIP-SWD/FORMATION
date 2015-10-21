<?php
$nom_sector = "";
$nom_page = "Accueil";
include "include/header.php";
?>

<body class="page-container-bg-solid page-header-fixed page-sidebar-closed-hide-logo">
<?php include "include/headerbar.php"; ?>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"> </div>
<!-- END HEADER & CONTENT DIVIDER -->
<!-- BEGIN CONTAINER -->
<div class="page-container">
    <?php include "include/sidebar.php"; ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <!-- BEGIN PAGE HEAD-->
            <div class="page-head">
                <!-- BEGIN PAGE TITLE -->
                <div class="page-title">
                    <h1><?= $nom_sector; ?>
                        <small><?= $nom_page; ?></small>
                    </h1>
                </div>
                <!-- END PAGE TITLE -->
            </div>
            <!-- END PAGE HEAD-->
            <!-- BEGIN PAGE BREADCRUMB -->
            <ul class="page-breadcrumb breadcrumb">
                <li>
                    <a href="<?= ROOT; ?>"><?= NOM_LOGICIEL; ?></a>
                    <i class="fa fa-circle"></i>
                </li>
                <?php if(!empty($nom_sector)){ ?>
                <li>
                    <span><?= $nom_sector; ?></span>
                    <i class="fa fa-circle"></i>
                </li>
                <?php } ?>
                <li>
                    <span class="active"><?= $nom_page; ?></span>
                </li>
            </ul>
            <!-- END PAGE BREADCRUMB -->
            <!-- BEGIN PAGE BASE CONTENT -->
            <?php if($info_user['type'] == 1){ ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bubble font-green-sharp"></i>
                                    <span class="caption-subject font-green-sharp bold uppercase">Bienvenue</span>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <ul class="nav nav-pills">
                                    <li class="active">
                                        <a href="#ie" data-toggle="tab"> Inter Entreprise </a>
                                    </li>
                                    <li>
                                        <a href="#cat" data-toggle="tab"> Catalogue </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade active in" id="ie">
                                        <h1>FORMATION INTER ENTREPRISE - SECURITE</h1>
                                        <form class="form-horizontal" action="<?= ROOT,CONTROL; ?>commande.php" method="POST">
                                            <div class="form-group">
                                                <label for="single" class="control-label">Selectionner le Thème de la Formation</label>
                                                <select id="single" name="theme" class="form-control select2">
                                                    <option></option>
                                                    <option value="Habilitation Electrique BS-BE Manoeuvre">Habilitation Electrique BS-BE Manoeuvre - 190€ HT (Jour/Pers)</option>
                                                    <option value="Sauveteur Secouriste du Travail (SST initial)">Sauveteur Secouriste du Travail (SST initial) - 190€ HT (Jour/Pers)</option>
                                                    <option value="Formation et CACES Chariots 1, 3 et 5">Formation et CACES Chariots 1, 3 et 5 - 280€ HT (Jour/Pers)</option>
                                                    <option value="Formation et CACES PEMP 1B & 3B">Formation et CACES PEMP 1B & 3B - 240€ HT (Jour/Pers)</option>
                                                    <option value="Echafaudages Roulants">Echafaudages Roulants - 210€ HT (Jour/Pers)</option>
                                                </select>
                                            </div>


                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="cat">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- END PAGE BASE CONTENT -->
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
    <!-- BEGIN QUICK SIDEBAR -->
    <a href="javascript:;" class="page-quick-sidebar-toggler">
        <i class="icon-login"></i>
    </a>
    <!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->
<?php include "include/footer.php"; ?>
<link href="<?= ROOT,ASSETS,PLUGINS; ?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="<?= ROOT,ASSETS,PLUGINS; ?>select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-select2.min.js" type="text/javascript"></script>
<!-- BEGIN SCRIPT PAGE -->

<!-- END SCRIPT PAGE -->
</body>

</html>