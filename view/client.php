<?php
$nom_sector = "";
$nom_page = "Client";
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
            <?php if(!isset($_GET)){ ?>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-settings font-dark"></i>
                            <span class="caption-subject bold uppercase">Header Fixed</span>
                        </div>
                        <div class="actions">
                            <div class="btn-group btn-group-devided" data-toggle="buttons">
                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                    <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                    <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                            <thead>
                                <tr class="">
                                    <th> ID </th>
                                    <th> Nom de la société </th>
                                    <th> Adresse </th>
                                    <th> Coordonnée </th>
                                    <th>  </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            $sql_client = mysql_query("SELECT * FROM client")or die(mysql_error());
                            while($client = mysql_fetch_array($sql_client))
                            {
                            ?>
                                <tr>
                                    <td> <?= $client['idclient']; ?> </td>
                                    <td> <?= $client['nom_societe']; ?> </td>
                                    <td>
                                        <?= html_entity_decode($client['adresse']); ?><br>
                                        <?= $client['code_postal']; ?> <?= $client['ville']; ?>
                                    </td>
                                    <td> Tel: <?= $client['telephone']; ?> </td>
                                    <td>
                                        <a href="index.php?view=client&sub=view-client" class="btn tooltips" data-container="body" data-placement="top" data-original-title="Voir la fiche"><i class="fa fa-eye text-primary"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
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

<link href="<?= ROOT,ASSETS,PLUGINS; ?>datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<script src="<?= ROOT,ASSETS,PLUGINS; ?>datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script src="<?= ROOT,ASSETS,JS; ?>table-datatables-fixedheader.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,JS; ?>datatable.js" type="text/javascript"></script>


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