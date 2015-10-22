<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 22/10/2015
 * Time: 12:16
 */
class commande
{

}

if(isset($_POST['action']) && $_POST['action'] == 'add-formation-inter')
{
    include "../include/config.php";
    $idcontact      = $_POST['idcontact'];
    $theme          = $_POST['theme'];
    $nb_personne    = $_POST['nb_personne'];

    $sql_contact = mysql_query("SELECT * FROM contact WHERE idcontact = '$idcontact'")or die(mysql_error());
    $contact = mysql_fetch_array($sql_contact);
    $mail = $contact['mail_contact'];
    $idclient = $contact['idclient'];
    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);

    $sql_inter = mysql_query("SELECT * FROM inter_calendar_formation WHERE idformation = '$theme'")or die(mysql_error());
    $inter = mysql_fetch_array($sql_inter);
    $nom_theme = $inter['theme'];
    $date_formation = $inter['date_formation'];

    $sql_insert_cmd = mysql_query("INSERT INTO `commande_inter`(`idcommande`, `idclient`, `theme`, `date_choisie`, `nb_personne`)
                                  VALUES (NULL,'$idclient','$theme','$date_formation','$nb_personne')")or die(mysql_error());

    //Mail vers le Système

    $to = $mail .',';
    $to .= 'mmockelyn@cridip.com';

    $sujet = "<".NOM_LOGICIEL."> Nouvelle Demande de formation INTER ENTREPRISE";

    ob_start();
    ?>
    <html>
    <head>

    </head>
    <body>
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?= NOM_LOGICIEL; ?></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left;"><strong>Objet:</strong> Nouvelle Demande de formation INTER ENTREPRISE</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                Bonjour,<br>
                <br>
                Enregistrement de la demande:<br />
                <table style="width: 100%; border: solid 2px; border-radius: 5px;">
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Client Concerné:</td>
                        <td style="width: 50%;border-bottom: solid 1px;">
                            <strong><?= $client['nom_societe']; ?></strong><br>
                            <i><?= $contact['nom_contact']; ?> <?= $contact['prenom_contact']; ?></i><br>
                            <strong>Tel:</strong> <?= $contact['tel_contact']; ?><br>
                            <strong>Port:</strong> <?= $contact['port_contact']; ?><br>
                            <strong>Mail:</strong> <?= $contact['mail_contact']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Formation Concerné:</td>
                        <td style="width: 50%;border-bottom: solid 1px;"><?= $nom_theme; ?></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Date Choisie:</td>
                        <td style="width: 50%;border-bottom: solid 1px;"><?= $date_class->jour_semaine(date('N', $date_formation)); ?> <?= date('d', $date_formation); ?> <?= $date_class->mois(date('n', $date_formation)); ?> <?= date('Y', $date_formation); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Nombre de Personne:</td>
                        <td style="width: 50%;border-bottom: solid 1px;"><?= $nb_personne; ?> Personnes</td>
                    </tr>
                </table><br><br>
                Nous restons à votre disposition pour toutes informations complémentaires.<br><br>
                Cordialement,<br>
                <br>
                Support Technique<br>
                <i><?= NOM_LOGICIEL; ?></i>
            </td>
        </tr>
    </table>
    </body>
    </html>
    <?php
    $message = ob_get_contents();

    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";
    $headers .= "To: no-reply <no-reply@clh>"."\r\n";

    $mail = mail($to, $sujet, $message, $headers);

    if($sql_insert_cmd === TRUE AND $mail === TRUE)
    {
        header("Location: ../index.php?view=index&success=add-formation-inter");
    }else{
        header("Location: ../index.php?view=index&error=add-formation-inter");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-formation-catalogue')
{
    include "../include/config.php";
    $idcontact = $_POST['idcontact'];
    $besoin = htmlentities(addslashes($_POST['besoin']));
    $nb_personne = $_POST['nb_personne'];
    $start = strtotime($_POST['start']);
    $end = strtotime($_POST['end']);
    $observation = htmlentities(addslashes($_POST['observation']));

    $sql_contact = mysql_query("SELECT * FROM contact WHERE idcontact = '$idcontact'")or die(mysql_error());
    $contact = mysql_fetch_array($sql_contact);
    $mail = $contact['mail_contact'];
    $idclient = $contact['idclient'];
    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);

    $sql_create_commande = mysql_query("INSERT INTO `commande_catalogue`(`idcommande`, `idclient`, `besoin`, `nb_personne`, `start_periode`, `end_periode`, `observation`)
                                      VALUES (NULL,'$idclient','$besoin','$nb_personne','$start','$end','$observation')")or die(mysql_error());

    $sql_commande = mysql_query("SELECT * FROM commande_catalogue WHERE idclient = '$idclient'AND nb_personne = '$nb_personne' AND start_periode = '$start' AND end_periode = '$end'")or die(mysql_error());
    $cmd = mysql_fetch_array($sql_commande);
    $idcommande = $cmd['idcommande'];

    foreach ($_POST['choix'] as $valeur) {
        mysql_query("INSERT INTO `ligne_commande_catalogue`(`idligne`, `idcommande`, `idproduit`) VALUES (NULL,'$idcommande','$valeur')")or die(mysql_error());
    }

    //Mail
    $to = $mail .',';
    $to .= 'mmockelyn@cridip.com';

    $sujet = "<".NOM_LOGICIEL."> Nouvelle Demande de formation INTER ENTREPRISE";

    ob_start();
    ?>
    <html>
    <head>

    </head>
    <body>
    <table style="width: 100%;">
        <tr>
            <td style="text-align: center; vertical-align: middle; font-weight: bold;"><?= NOM_LOGICIEL; ?></td>
        </tr>
    </table>
    <table style="width: 100%;">
        <tr>
            <td style="text-align: left;"><strong>Objet:</strong> Nouvelle Demande de formation INTER ENTREPRISE</td>
        </tr>
    </table>
    <table>
        <tr>
            <td>
                Bonjour,<br>
                <br>
                Enregistrement de la demande:<br />
                <table style="width: 100%; border: solid 2px; border-radius: 5px;">
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Client Concerné:</td>
                        <td style="width: 50%;border-bottom: solid 1px;">
                            <strong><?= $client['nom_societe']; ?></strong><br>
                            <i><?= $contact['nom_contact']; ?> <?= $contact['prenom_contact']; ?></i><br>
                            <strong>Tel:</strong> <?= $contact['tel_contact']; ?><br>
                            <strong>Port:</strong> <?= $contact['port_contact']; ?><br>
                            <strong>Mail:</strong> <?= $contact['mail_contact']; ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Liste des Formations Concernées:</td>
                        <td style="width: 50%;border-bottom: solid 1px;">
                            <?php
                            $sql_ligne = mysql_query("SELECT * FROM ligne_commande_catalogue, catalogue WHERE ligne_commande_catalogue.idproduit = catalogue.idproduit AND idcommande = '$idcommande'")or die(mysql_error());
                            while($ligne = mysql_fetch_array($sql_ligne))
                            {
                                echo "(Réf.".$ligne['ref_produit'].") ".$ligne['designation_produit']."<br>";
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Période souhaité:</td>
                        <td style="width: 50%;border-bottom: solid 1px;">Du <?= date("d-m-Y", $cmd['start_periode']); ?> au <?= date("d-m-Y", $cmd['end_periode']); ?></td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Nombre de Personne:</td>
                        <td style="width: 50%;border-bottom: solid 1px;"><?= $nb_personne; ?> Personnes</td>
                    </tr>
                    <tr>
                        <td style="width: 50%;border-bottom: solid 1px; border-right: solid 1px; font-weight: bold;">Précision sur les besoins:</td>
                        <td style="width: 50%;border-bottom: solid 1px;"><?= html_entity_decode($cmd['besoin']); ?></td>
                    </tr><tr>
                        <td style="width: 50%; border-right: solid 1px; font-weight: bold;">Observation:</td>
                        <td style="width: 50%;"><?= html_entity_decode($cmd['observation']); ?></td>
                    </tr>
                </table><br><br>
                Nous restons à votre disposition pour toutes informations complémentaires.<br><br>
                Cordialement,<br>
                <br>
                Support Technique<br>
                <i><?= NOM_LOGICIEL; ?></i>
            </td>
        </tr>
    </table>
    </body>
    </html>
    <?php
    $message = ob_get_contents();

    $headers = "MIME-Version: 1.0"."\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8"."\r\n";
    $headers .= "To: no-reply <no-reply@clh>"."\r\n";

    $mail = mail($to, $sujet, $message, $headers);

    if($sql_create_commande === TRUE AND $mail === TRUE)
    {
        header("Location: ../index.php?view=index&success=add-formation-catalogue");
    }else{
        header("Location: ../index.php?view=index&error=add-formation-catalogue");
    }


}