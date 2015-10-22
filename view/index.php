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
                                                $sql_famille = mysql_query("SELECT * FROM famille_catalogue LIMIT 2, 999")or die(mysql_error());
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
                                                <div class="tab-pane fade active in" id="securite">
                                                    <?php
                                                    $sql_sous_famille1 = mysql_query("SELECT * FROM sous_famille_catalogue WHERE idfamillecatalogue = '$idfamille1' LIMIT 1")or die(mysql_error());
                                                    while($sous_famille1 = mysql_fetch_array($sql_sous_famille1))
                                                    {
                                                        $idsousfamille1 = $sous_famille1['idsousfamillecatalogue'];
                                                    ?>
                                                    <table class="table">
                                                        <caption><?= $sous_famille1['designation_sous_famille']; ?></caption>
                                                        <tbody>
                                                        <?php
                                                        $sql_catalogue = mysql_query("SELECT * FROM catalogue WHERE catalogue.idsousfamillecatalogue = '$idsousfamille1'  ORDER BY ref_produit ASC")or die(mysql_error());
                                                        while($catalogue = mysql_fetch_array($sql_catalogue))
                                                        {
                                                        ?>
                                                            <tr>
                                                                <td>(Réf.<?= $catalogue['ref_produit']; ?>)</td>
                                                                <td><?= html_entity_decode($catalogue['designation_produit']); ?></td>
                                                                <td>
                                                                    <div class="form-group form-md-checkboxes">
                                                                        <div class="md-checkbox-inline">
                                                                            <div class="md-checkbox">
                                                                                <input type="checkbox" name="choix[]" class="md-check" value="<?= $catalogue['idproduit']; ?>" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php } ?>
                                                        </tbody>
                                                    </table>
                                                    <?php } ?>
                                                </div>
                                                <?php } ?>
                                                <div class="tab-pane fade" id="tab_2_2">
                                                    <p> Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft
                                                        beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica
                                                        VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester
                                                        stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park. </p>
                                                </div>

                                            </div>
                                            <div class="form-action">
                                                <button type="submit" class="btn green right" name="action" value="add-formation-catalogue"><i class="fa fa-check"></i> Valider</button>
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
<link href="<?= ROOT,ASSETS,PLUGINS; ?>select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
<script src="<?= ROOT,ASSETS,PLUGINS; ?>select2/js/select2.full.min.js" type="text/javascript"></script>
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" type="text/css" />
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-select/js/bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-bootstrap-select.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-select2.min.js" type="text/javascript"></script>
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-touchspin/bootstrap.touchspin.css" rel="stylesheet" type="text/css" />
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-touchspin/bootstrap.touchspin.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>components-bootstrap-touchspin.min.js" type="text/javascript"></script>
<link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-toastr/toastr.min.css" rel="stylesheet" type="text/css"/>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-toastr/toastr.min.js" type="text/javascript"></script>
<!-- BEGIN SCRIPT PAGE -->
<?php if(isset($_GET['success']) && $_GET['success'] == 'add-formation-inter'){ ?>
    <script type="text/javascript">
        toastr.success("Votre demande à bien été pris en compte. Un responsable vous contactera bientôt afin de finaliser votre demande !", "DEMANDE DE FORMATION INTER ENTREPRISE",{
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
<!-- END SCRIPT PAGE -->
</body>

</html>