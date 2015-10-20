<?php
include "config.php";
include "classe.php";
?>
<!DOCTYPE html>
<html lang="fr">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title><?= NOM_LOGICIEL; ?> - <?= $nom_page; ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>uniform/css/uniform.default.css" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= ROOT,ASSETS,CSS; ?>components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= ROOT,ASSETS,CSS; ?>plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="<?= ROOT,ASSETS,CSS; ?>layout.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,CSS; ?>themes/blue.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="<?= ROOT,ASSETS,CSS; ?>custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
</head>
<!-- END HEAD -->