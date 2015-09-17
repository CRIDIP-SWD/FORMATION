<?php include ('include/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- META SECTION -->
    <title><?= NOM_LOGICIEL; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="favicon.ico" type="image/x-icon" />
    <!-- END META SECTION -->

    <!-- CSS INCLUDE -->
    <link rel="stylesheet" type="text/css" id="theme" href="<?= ROOT,ASSETS,CSS; ?>theme-dark.css"/>
    <!-- EOF CSS INCLUDE -->
</head>
<body>
<div class="error-container">
    <div class="error-code">405</div>
    <div class="error-text">ERREUR DE REDIRECTION</div>
    <div class="error-subtext">Aucune requete de lien n'a été envoyer au serveur.</div>
    <div class="error-actions">
        <div class="row">
            <div class="col-md-6">
                <button class="btn btn-info btn-block btn-lg" onClick="document.location.href = 'index.php?view=index';">Revenir au Tableau de Bord</button>
            </div>
            <div class="col-md-6">
                <button class="btn btn-primary btn-block btn-lg" onClick="history.back();">Page Précedente</button>
            </div>
        </div>
    </div>
</div>
</body>
</html>






