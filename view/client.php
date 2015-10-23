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
            <?php if(!isset($_GET['sub'])){ ?>
                <div class="portlet light bordered">
                    <div class="portlet-title">
                        <div class="caption font-dark">
                            <i class="icon-user font-dark"></i>
                            <span class="caption-subject bold uppercase">Liste des Clients</span>
                        </div>
                        <div class="actions">
                            <a class="btn btn-circle btn-success" data-toggle="modal" href="#add-client-modal">
                                <i class="fa fa-plus"></i> Ajout d'un client
                            </a>
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
                                        <a href="index.php?view=client&sub=view-client&idclient=<?= $client['idclient']; ?>" class="btn tooltips" data-container="body" data-placement="top" data-original-title="Voir la fiche"><i class="fa fa-eye text-primary"></i></a>
                                        <a href="<?= ROOT,CONTROL; ?>client.php?supp-client-control=Valider&idclient=<?= $client['idclient']; ?>" class="btn tooltips" data-container="body" data-placement="top" data-original-title="Supprimer"><i class="fa fa-trash text-danger"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade bs-modal-lg" id="add-client-modal" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header bg-success">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                    <h4 class="modal-title"><i class="fa fa-plus"></i> Ajout d'un client</h4>
                                </div>
                                <form class="form-horizontal" action="<?= ROOT,CONTROL; ?>client.php" method="post">
                                    <div class="modal-body">
                                        <div class="form-group form-md-line-input">
                                            <input type="text" class="form-control" name="nom_societe" id="form_control_1">
                                            <label for="form_control_1">Nom de la société</label>
                                            <span class="help-block">Entrer le nom de la société</span>
                                        </div>
                                        <div class="form-group form-md-line-input">
                                            <textarea class="form-control" rows="3" name="adresse"></textarea>
                                            <label for="form_control_1"></label>
                                            <span class="help-block">Entrer le l'adresse de la société</span>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="code_postal" id="form_control_1">
                                                    <label for="form_control_1">Code Postal</label>
                                                    <span class="help-block">FORMAT: 99999</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group form-md-line-input">
                                                    <input type="text" class="form-control" name="ville" id="form_control_1">
                                                    <label for="form_control_1">Ville</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn green" name="action" value="add-client-control"><i class="fa fa-check"></i> Valider</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                </div>
            <?php } ?>
            <?php if(isset($_GET['sub']) && $_GET['sub'] == 'view-client'){ ?>
                <?php
                $idclient = $_GET['idclient'];
                $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
                $client = mysql_fetch_array($sql_client);
                ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="portlet light">
                            <div class="portlet-title">
                                <div class="caption">
                                    <i class="icon-bank font-grey-gallery"></i>
                                    <span class="caption-subject bold font-grey-gallery uppercase"> <?= $client['nom_societe']; ?> </span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-default" data-toggle="modal" href="#edit-client-modal">
                                        <i class="fa fa-pencil"></i> Editer la société
                                    </a>
                                    <a class="btn btn-circle btn-danger" href="javascript:;">
                                        <i class="fa fa-trash"></i> Supprimer
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="font-weight: bold;width: 50%; padding-bottom: 5px;">Adresse:</td>
                                        <td style="width: 50%; padding-bottom: 5px;">
                                            <?= html_entity_decode($client['adresse']); ?><br>
                                            <?= $client['code_postal']; ?> <?= $client['ville']; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold;width: 50%; padding-bottom: 5px;">Coordonnée:</td>
                                        <td style="width: 50%; padding-bottom: 5px;">
                                            Tel: <?= $client['telephone']; ?>
                                        </td>
                                    </tr>
                                </table>

                            </div>
                            <div class="modal fade bs-modal-lg" id="edit-client-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title"><i class="fa fa-edit"></i> Edition de la société</h4>
                                        </div>
                                        <form class="form-horizontal" action="<?= ROOT,CONTROL; ?>client.php" method="post">
                                            <div class="modal-body">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn green" name="action" value="edit-client-control"><i class="fa fa-check"></i> Valider</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="portlet light bordered">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-settings font-dark"></i>
                                    <span class="caption-subject bold uppercase">Liste des contacts</span>
                                </div>
                                <div class="actions">
                                    <a class="btn btn-circle btn-green" data-toggle="modal" href="#add-contact-modal">
                                        <i class="fa fa-pencil"></i> Ajouter un contact
                                    </a>
                                </div>
                            </div>
                            <div class="portlet-body">
                                <table class="table table-striped table-bordered table-hover table-header-fixed" id="sample_1">
                                    <thead>
                                        <tr class="">
                                            <th> Identité </th>
                                            <th> Coordonnée </th>
                                            <th> Identifiant plateforme </th>
                                            <th>  </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sql_contact = mysql_query("SELECT * FROM contact, utilisateur WHERE contact.idcontact = utilisateur.idcontact AND idclient = '$idclient'")or die(mysql_error());
                                    while($contact = mysql_fetch_array($sql_contact))
                                    {
                                    ?>
                                        <tr>
                                            <td>
                                                <strong><?= $client['nom_societe']; ?></strong><br>
                                                <?= $contact['nom_contact']; ?> <?= $contact['prenom_contact']; ?>
                                            </td>
                                            <td>
                                                <strong><i class="fa fa-phone"></i>Tél:</strong> <?= $contact['tel_contact']; ?><br>
                                                <strong><i class="fa fa-mobile-phone"></i> Port:</strong> <?= $contact['port_contact']; ?><br>
                                                <strong><i class="fa fa-envelope"></i> Mail:</strong> <?= $contact['mail_contact']; ?><br>
                                                <strong><i class="fa fa-skype"></i> Skype:</strong> <?= $contact['skype_contact']; ?>
                                            </td>
                                            <td>
                                                <strong>Login:</strong> <?= $contact['login']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= ROOT,CONTROL; ?>client.php?supp-contact-control=Valider&idclient=<?= $client['idclient']; ?>" class="btn tooltips" data-container="body" data-placement="top" data-original-title="Supprimer"><i class="fa fa-trash text-danger"></i></a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal fade bs-modal-lg" id="add-contact-modal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header bg-success">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                            <h4 class="modal-title"><i class="fa fa-plus"></i> Ajout d'un contact</h4>
                                        </div>
                                        <form class="form-horizontal" action="<?= ROOT,CONTROL; ?>client.php" method="post">
                                            <div class="modal-body">

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn green" name="action" value="add-contact-control"><i class="fa fa-check"></i> Valider</button>
                                            </div>
                                        </form>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
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

<link href="<?= ROOT,ASSETS,PLUGINS; ?>datatables/datatables.min.css" rel="stylesheet" type="text/css" />
<link href="<?= ROOT,ASSETS,PLUGINS; ?>datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />

<script src="<?= ROOT,ASSETS,PLUGINS; ?>datatables/datatables.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>

<script src="<?= ROOT,ASSETS,JS; ?>table-datatables-fixedheader.js" type="text/javascript"></script>
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