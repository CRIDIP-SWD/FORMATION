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
                                            <input type="hidden" name="idcontact" value="<?= $info_user['idcontact']; ?>" />
                                            <div class="form-body">
                                                <div class="form-group">
                                                    <label for="single" class="control-label col-md-3">Selectionner le Thème de la Formation</label>
                                                    <div class="col-md-9">
                                                        <select id="single" name="theme" class="form-control bs-select" data-show-subtext="true">
                                                            <option></option>
                                                            <?php
                                                            $sql_inter_formation = mysql_query("SELECT * FROM inter_calendar_formation ORDER BY date_formation ASC")or die(mysql_error());
                                                            while($if = mysql_fetch_array($sql_inter_formation))
                                                            {

                                                                ?>
                                                                <option value="<?= $if['idformation']; ?>" data-content="<?= $if['theme']; ?> du <strong><?= $date_class->jour_semaine(date('N', $if['date_formation'])); ?> <?= date('d', $if['date_formation']); ?> <?= $date_class->mois(date('n', $if['date_formation'])); ?> <?= date('Y', $if['date_formation']); ?></strong> - <?= number_format($if['prix'], 2, ',', ' ')." €"; ?> - <?= $if['duree']; ?>"></option>
                                                            <?php } ?>
                                                        </select>
                                                        <p>
                                                            <strong>Octobre:</strong> Nous consulter pour la formation <strong>ECHAFAUDAGE ROULANT</strong><br>
                                                            <strong>Décembre:</strong> Nous consulter pour la formation <strong>ECHAFAUDAGE ROULANT</strong>
                                                        </p>
                                                    </div>

                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nombre de Personne</label>
                                                    <div class="col-md-4">
                                                        <input id="touchspin_5" type="text" value="" name="nb_personne">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-actions right">
                                                <button type="submit" class="btn green pull-right" name="action" value="add-formation-inter"><i class="fa fa-check"></i> Envoyer la demande</button>
                                            </div>


                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="cat">
                                        <h1>CATALOGUE DE FORMATION</h1>
                                        <form action="<?= ROOT,CONTROL; ?>commande.php" method="post" role="form">
                                            <ul class="nav nav-pills">
                                                <?php
                                                $sql_famille1 = mysql_query("SELECT * FROM famille_catalogue LIMIT 1")or die(mysql_error());
                                                while($famille1 = mysql_fetch_array($sql_famille1))
                                                {
                                                ?>
                                                <li class="active"><a href="#<?= $famille1['designation_famille']; ?>" data-toggle="tab"> <?= $famille1['designation_famille']; ?> </a></li>
                                                <?php } ?>
                                                <?php
                                                $sql_famille = mysql_query("SELECT * FROM famille_catalogue LIMIT 1, 999")or die(mysql_error());
                                                while($famille = mysql_fetch_array($sql_famille))
                                                {
                                                ?>
                                                <li><a href="#<?= $famille['designation_famille']; ?>" data-toggle="tab"> <?= $famille['designation_famille']; ?> </a></li>
                                                <?php } ?>
                                            </ul>
                                            <div class="tab-content">
                                                <?php
                                                $sql_famille1 = mysql_query("SELECT * FROM famille_catalogue LIMIT 1")or die(mysql_error());
                                                while($famille1 = mysql_fetch_array($sql_famille1))
                                                {
                                                    $idfamille1 = $famille1['idfamillecatalogue'];
                                                ?>
                                                <div class="tab-pane fade active in" id="<?= $famille1['designation_famille']; ?>">
                                                    <div class="row">
                                                        <div class="col-md-3 col-sm-3 col-xs-3">
                                                            <ul class="nav nav-tabs tabs-left">
                                                                <?php
                                                                $sql_sous_famille1 = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille1' LIMIT 1")or die(mysql_error());
                                                                while($sous_famille1 = mysql_fetch_array($sql_sous_famille1))
                                                                {
                                                                    $idsousfamille1 = $sous_famille1['idsousfamillecatalogue'];
                                                                ?>
                                                                <li class="active">
                                                                    <a href="#<?= $sous_famille1['idsousfamillecatalogue']; ?>" data-toggle="tab"> <?= $sous_famille1['designation_sous_famille']; ?> </a>
                                                                </li>
                                                                <?php } ?>
                                                                <?php
                                                                $sql_sous_famille = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille1' LIMIT 1, 999")or die(mysql_error());
                                                                while($sous_famille = mysql_fetch_array($sql_sous_famille))
                                                                {
                                                                $idsousfamille = $sous_famille['idsousfamillecatalogue'];
                                                                ?>
                                                                <li>
                                                                    <a href="#<?= $sous_famille['idsousfamillecatalogue']; ?>" data-toggle="tab"> <?= $sous_famille['designation_sous_famille']; ?> </a>
                                                                </li>
                                                                <?php } ?>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-9 col-sm-9 col-xs-9">
                                                            <div class="tab-content">
                                                                <?php
                                                                $sql_sous_famille1 = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille1' LIMIT 1")or die(mysql_error());
                                                                while($sous_famille1 = mysql_fetch_array($sql_sous_famille1))
                                                                {
                                                                $idsousfamille1 = $sous_famille1['idsousfamillecatalogue'];
                                                                ?>
                                                                <div class="tab-pane active" id="<?= $sous_famille1['idsousfamillecatalogue']; ?>">
                                                                    <table class="table table-bordered">
                                                                        <caption><?= $sous_famille1['designation_sous_famille']; ?></caption>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Référence</th>
                                                                                <th>Formation</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $sql_catalogue = mysql_query("SELECT * FROM catalogue WHERE idsousfamillecatalogue = '$idsousfamille1' ORDER BY ref_produit ASC")or die(mysql_error());
                                                                        while($catalogue = mysql_fetch_array($sql_catalogue))
                                                                        {
                                                                        ?>
                                                                            <tr>
                                                                                <td>(Réf. <?= $catalogue['ref_produit']; ?>)</td>
                                                                                <td><?= html_entity_decode($catalogue['designation_produit']); ?></td>
                                                                                <td>
                                                                                    <div class="form-group form-md-checkboxes">
                                                                                        <div class="md-checkbox-inline">
                                                                                            <div class="md-checkbox">
                                                                                                <input type="checkbox" id="checkbox<?= $catalogue['idproduit']; ?>" name="choix[]" value="<?= $catalogue['idproduit']; ?>" class="md-check">
                                                                                                <label for="checkbox<?= $catalogue['idproduit']; ?>">
                                                                                                    <span></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php } ?>
                                                                <?php
                                                                $sql_sous_famille = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille1' LIMIT 1, 999")or die(mysql_error());
                                                                while($sous_famille = mysql_fetch_array($sql_sous_famille))
                                                                {
                                                                $idsousfamille = $sous_famille['idsousfamillecatalogue'];
                                                                ?>
                                                                <div class="tab-pane fade" id="<?= $sous_famille['idsousfamillecatalogue']; ?>">
                                                                    <table class="table table-bordered">
                                                                        <caption><?= $sous_famille['designation_sous_famille']; ?></caption>
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Référence</th>
                                                                            <th>Formation</th>
                                                                            <th></th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        <?php
                                                                        $sql_catalogue = mysql_query("SELECT * FROM catalogue WHERE idsousfamillecatalogue = '$idsousfamille' ORDER BY ref_produit ASC")or die(mysql_error());
                                                                        while($catalogue = mysql_fetch_array($sql_catalogue))
                                                                        {
                                                                            ?>
                                                                            <tr>
                                                                                <td>(Réf. <?= $catalogue['ref_produit']; ?>)</td>
                                                                                <td><?= html_entity_decode($catalogue['designation_produit']); ?></td>
                                                                                <td>
                                                                                    <div class="form-group form-md-checkboxes">
                                                                                        <div class="md-checkbox-inline">
                                                                                            <div class="md-checkbox">
                                                                                                <input type="checkbox" id="checkbox<?= $catalogue['idproduit']; ?>" name="choix[]" value="<?= $catalogue['idproduit']; ?>" class="md-check">
                                                                                                <label for="checkbox<?= $catalogue['idproduit']; ?>">
                                                                                                    <span></span>
                                                                                                    <span class="check"></span>
                                                                                                    <span class="box"></span>
                                                                                                </label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php } ?>
                                                <?php
                                                $sql_famille = mysql_query("SELECT * FROM famille_catalogue LIMIT 1, 999")or die(mysql_error());
                                                while($famille = mysql_fetch_array($sql_famille))
                                                {
                                                    $idfamille = $famille['idfamillecatalogue'];
                                                    ?>
                                                    <div class="tab-pane fade active in" id="<?= $famille['designation_famille']; ?>">
                                                        <div class="row">
                                                            <div class="col-md-3 col-sm-3 col-xs-3">
                                                                <ul class="nav nav-tabs tabs-left">
                                                                    <?php
                                                                    $sql_sous_famille1 = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille' LIMIT 1")or die(mysql_error());
                                                                    while($sous_famille1 = mysql_fetch_array($sql_sous_famille1))
                                                                    {
                                                                        $idsousfamille1 = $sous_famille1['idsousfamillecatalogue'];
                                                                        ?>
                                                                        <li class="active">
                                                                            <a href="#<?= $sous_famille1['idsousfamillecatalogue']; ?>" data-toggle="tab"> <?= $sous_famille1['designation_sous_famille']; ?> </a>
                                                                        </li>
                                                                    <?php } ?>
                                                                    <?php
                                                                    $sql_sous_famille = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille' LIMIT 1, 999")or die(mysql_error());
                                                                    while($sous_famille = mysql_fetch_array($sql_sous_famille))
                                                                    {
                                                                        $idsousfamille = $sous_famille['idsousfamillecatalogue'];
                                                                        ?>
                                                                        <li>
                                                                            <a href="#<?= $sous_famille['idsousfamillecatalogue']; ?>" data-toggle="tab"> <?= $sous_famille['designation_sous_famille']; ?> </a>
                                                                        </li>
                                                                    <?php } ?>
                                                                </ul>
                                                            </div>
                                                            <div class="col-md-9 col-sm-9 col-xs-9">
                                                                <div class="tab-content">
                                                                    <?php
                                                                    $sql_sous_famille1 = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille' LIMIT 1")or die(mysql_error());
                                                                    while($sous_famille1 = mysql_fetch_array($sql_sous_famille1))
                                                                    {
                                                                        $idsousfamille1 = $sous_famille1['idsousfamillecatalogue'];
                                                                        ?>
                                                                        <div class="tab-pane active" id="<?= $sous_famille1['idsousfamillecatalogue']; ?>">
                                                                            <table class="table table-bordered">
                                                                                <caption><?= $sous_famille1['designation_sous_famille']; ?></caption>
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Référence</th>
                                                                                    <th>Formation</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php
                                                                                $sql_catalogue = mysql_query("SELECT * FROM catalogue WHERE idsousfamillecatalogue = '$idsousfamille1' ORDER BY ref_produit ASC")or die(mysql_error());
                                                                                while($catalogue = mysql_fetch_array($sql_catalogue))
                                                                                {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td>(Réf. <?= $catalogue['ref_produit']; ?>)</td>
                                                                                        <td><?= html_entity_decode($catalogue['designation_produit']); ?></td>
                                                                                        <td>
                                                                                            <div class="form-group form-md-checkboxes">
                                                                                                <div class="md-checkbox-inline">
                                                                                                    <div class="md-checkbox">
                                                                                                        <input type="checkbox" id="checkbox<?= $catalogue['idproduit']; ?>" name="choix[]" value="<?= $catalogue['idproduit']; ?>" class="md-check">
                                                                                                        <label for="checkbox<?= $catalogue['idproduit']; ?>">
                                                                                                            <span></span>
                                                                                                            <span class="check"></span>
                                                                                                            <span class="box"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    <?php } ?>
                                                                    <?php
                                                                    $sql_sous_famille = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille' LIMIT 1, 999")or die(mysql_error());
                                                                    while($sous_famille = mysql_fetch_array($sql_sous_famille))
                                                                    {
                                                                        $idsousfamille = $sous_famille['idsousfamillecatalogue'];
                                                                        ?>
                                                                        <div class="tab-pane fade" id="<?= $sous_famille['idsousfamillecatalogue']; ?>">
                                                                            <table class="table table-bordered">
                                                                                <caption><?= $sous_famille['designation_sous_famille']; ?></caption>
                                                                                <thead>
                                                                                <tr>
                                                                                    <th>Référence</th>
                                                                                    <th>Formation</th>
                                                                                    <th></th>
                                                                                </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                <?php
                                                                                $sql_catalogue = mysql_query("SELECT * FROM catalogue WHERE idsousfamillecatalogue = '$idsousfamille' ORDER BY ref_produit ASC")or die(mysql_error());
                                                                                while($catalogue = mysql_fetch_array($sql_catalogue))
                                                                                {
                                                                                    ?>
                                                                                    <tr>
                                                                                        <td>(Réf. <?= $catalogue['ref_produit']; ?>)</td>
                                                                                        <td><?= html_entity_decode($catalogue['designation_produit']); ?></td>
                                                                                        <td>
                                                                                            <div class="form-group form-md-checkboxes">
                                                                                                <div class="md-checkbox-inline">
                                                                                                    <div class="md-checkbox">
                                                                                                        <input type="checkbox" id="checkbox<?= $catalogue['idproduit']; ?>" name="choix[]" value="<?= $catalogue['idproduit']; ?>" class="md-check">
                                                                                                        <label for="checkbox<?= $catalogue['idproduit']; ?>">
                                                                                                            <span></span>
                                                                                                            <span class="check"></span>
                                                                                                            <span class="box"></span>
                                                                                                        </label>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </td>
                                                                                    </tr>
                                                                                <?php } ?>
                                                                                </tbody>
                                                                            </table>
                                                                        </div>
                                                                    <?php } ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Expliquez nous vos besoins ?</label>
                                                    <div class="col-md-9">
                                                        <textarea class="ckeditor form-control" name="besoin" rows="6"></textarea>
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Nombre de Personne</label>
                                                    <div class="col-md-9">
                                                        <input id="touchspin_6" type="text" value="" name="nb_personne">
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Période Souhaitée</label>
                                                    <div class="col-md-9">
                                                        <div class="input-group input-large date-picker input-daterange" data-date="<?= $date_jour; ?>" data-date-format="dd-mm-yyyy">
                                                            <input type="text" class="form-control" name="start">
                                                            <span class="input-group-addon"> au </span>
                                                            <input type="text" class="form-control" name="end"> </div>
                                                        <!-- /input-group -->
                                                    </div>
                                                </div>

                                                <div class="form-group">
                                                    <label class="control-label col-md-3">Observation</label>
                                                    <div class="col-md-9">
                                                        <textarea class="ckeditor form-control" name="observation" rows="6"></textarea>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="idcontact" value="<?= $info_user['idcontact']; ?>" />

                                            </div>
                                            <div class="form-action right">
                                                <button type="submit" class="btn green right" name="action" value="add-formation-catalogue"><i class="fa fa-check"></i> Envoyer la demande</button>
                                                <button type="reset" class="btn red right">Réinitialiser</button>
                                            </div>
                                        </form>
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
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-timepicker/css/bootstrap-timepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>clockface/css/clockface.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />

<script src="<?= ROOT,ASSETS,PLUGINS; ?>select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-daterangepicker/moment.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-daterangepicker/daterangepicker.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-timepicker/js/bootstrap-timepicker.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>clockface/js/clockface.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-pwstrength/pwstrength-bootstrap.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>autosize/autosize.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery-inputmask/jquery.inputmask.bundle.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery.input-ip-address-control-1.0.min.js" type="text/javascript"></script>

<script src="<?= ROOT,ASSETS,JS; ?>components-form-tools.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-select2.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-bootstrap-touchspin.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-date-time-pickers.min.js" type="text/javascript"></script>


<!-- BEGIN SCRIPT PAGE -->
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-formation-inter'){ ?>
    <script type="text/javascript">
        toastr.success("Votre demande à bien été pris en compte. Un responsable vous contactera bientôt afin de finaliser votre demande !", "DEMANDE DE FORMATION INTER ENTREPRISE",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-formation-catalogue'){ ?>
    <script type="text/javascript">
        toastr.success("Votre demande à bien été pris en compte. Un responsable vous contactera bientôt afin de finaliser votre demande !", "DEMANDE DE FORMATION SUR CATALOGUE",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-formation-inter'){ ?>
    <script type="text/javascript">
        toastr.error("Une erreur à eu lieu lors de votre demande.<br>Veuillez contacter l'administrateur système.", "DEMANDE DE FORMATION INTER ENTREPRISE",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<?php if(isset($_GET['error']) && $_GET['error'] == 'add-formation-catalogue'){ ?>
    <script type="text/javascript">
        toastr.error("Une erreur à eu lieu lors de votre demande.<br>Veuillez contacter l'administrateur système.", "DEMANDE DE FORMATION SUR CATALOGUE",{
            "positionClass": "toast-top-center"
        })
    </script>
<?php } ?>
<!-- END SCRIPT PAGE -->
</body>

</html>