<?php include "include/config.php"; ?>
<!DOCTYPE html>
<html lang="fr">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title><?= NOM_LOGICIEL; ?> - Connexion</title>
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
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="<?= ROOT,ASSETS,PLUGINS; ?>select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?= ROOT,ASSETS,CSS; ?>components-rounded.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?= ROOT,ASSETS,CSS; ?>plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?= ROOT,ASSETS,CSS; ?>login-4.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    </head>
<!-- END HEAD -->

<body class=" login">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="index.html">
        <img src="../assets/pages/img/logo-big.png" alt="" />
    </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" action="<?= ROOT, CONTROL; ?>utilisateur.php" method="post">
        <h3 class="form-title"><?= NOM_LOGICIEL; ?> - CONNEXION</h3>
        <div class="form-group">
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Nom d'Utilisateur</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom d'Utilisateur" name="login" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Mot de Passe</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input class="form-control placeholder-no-fix" type="password" autocomplete="off" placeholder="Mot de Passe" name="password" /> </div>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn green pull-right" name="action" value="Connexion"> Connexion </button>
        </div>
        <div class="forget-password">
            <h4>Mot de Passe perdu ?</h4>
            <p> Cliquer
                <a href="javascript:;" id="forget-password"> ici </a> pour réinitialiser le mot de passe. </p>
        </div>
    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->
    <form class="forget-form" action="<?= ROOT,CONTROL; ?>utilisateur.php" method="post">
        <h3>Mot de passe Perdu ?</h3>
        <p> Entrez votre nom d'utilisateur afin de réinitialiser votre mot de passe ? </p>
        <p>La procédure est expliquer dans le mail.</p>
        <div class="form-group">
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Nom d'utilisateur" name="login" /> </div>
        </div>
        <div class="form-actions">
            <button type="button" id="back-btn" class="btn red btn-outline">Retour </button>
            <button type="submit" class="btn green pull-right" name="action" value="reinit-pass"> Envoyer </button>
        </div>
    </form>
    <!-- END FORGOT PASSWORD FORM -->
</div>
<!-- END LOGIN -->
<!--[if lt IE 9]>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>respond.min.js"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>excanvas.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>select2/js/select2.full.min.js" type="text/javascript"></script>
<script src="<?= ROOT,ASSETS,PLUGINS; ?>backstretch/jquery.backstretch.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="<?= ROOT,ASSETS,JS; ?>app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?= ROOT,ASSETS,JS; ?>login-4.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>