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
    $idclient       = $_POST['idclient'];
    $idcontact      = $_POST['idcontact'];
    $theme          = $_POST['theme'];
    $nb_personne    = $_POST['nb_personne'];

    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);
    $sql_contact = mysql_query("SELECT * FROM contact WHERE idcontact = '$idcontact'")or die(mysql_error());
    $contact = mysql_fetch_array($sql_contact);
    $mail = $contact['mail_contact'];
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
                Enregistrement de la demande:<br>
                <table style="width: 100%;">
                    <tr>
                        <td>Formation Concerné:</td>
                        <td><?= $nom_theme; ?></td>
                    </tr>
                    <tr>
                        <td>Date Choisie:</td>
                        <td><?= $date_class->jour_semaine(date('N', $date_formation)); ?> <?= date('d', $date_formation); ?> <?= $date_class->mois(date('n', $date_formation)); ?> <?= date('Y', $date_formation); ?></td>
                    </tr>
                    <tr>
                        <td>Nombre de Personne:</td>
                        <td><?= $nb_personne; ?> Personnes</td>
                    </tr>
                </table>
                Nous restons à votre disposition pour toutes informations complémentaires.<br>
                Cordialement,
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
}