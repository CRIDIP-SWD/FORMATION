<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 23/10/2015
 * Time: 13:41
 */
class client
{
    public function generate_password($nb, $chaine = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890')
    {
        $nb_lettre = strlen($chaine) - 1;
        $generation = "";
        for($i=0; $i < $nb; $i++)
        {
            $pos = mt_rand(0, $nb_lettre);
            $car = $chaine[$pos];
            $generation .= $car;
        }
        return $generation;
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-client-control')
{
    include "../include/config.php";
    $nom_societe = $_POST['nom_societe'];
    $adresse = htmlentities(addslashes($_POST['adresse']));
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];

    $sql_add_client = mysql_query("INSERT INTO `client`(`idclient`, `nom_societe`, `adresse`, `code_postal`, `ville`, `telephone`)
                                    VALUES (NULL,'$nom_societe','$adresse','$code_postal','$ville','$telephone')")or die(mysql_error());
    $sql_client = mysql_query("SELECT * FROM client WHERE nom_societe = '$nom_societe' AND telephone = '$telephone'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);
    $idclient = $client['idclient'];


    if($sql_add_client === TRUE)
    {
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_societe&success=add-client");
    }else{
        header("Location: ../index.php?view=client&error=add-client");
    }


}
if(isset($_POST['action']) && $_POST['action'] == 'edit-client-control'){
    include "../include/config.php";
    $idclient = $_POST['idclient'];
    $nom_societe = $_POST['nom_societe'];
    $adresse = htmlentities(addslashes($_POST['adresse']));
    $code_postal = $_POST['code_postal'];
    $ville = $_POST['ville'];
    $telephone = $_POST['telephone'];

    $sql_up_client = mysql_query("UPDATE client SET nom_societe = '$nom_societe', adresse = '$adresse', code_postal = '$code_postal', ville = '$ville', telephone = '$telephone' WHERE idclient = '$idclient'")or die(mysql_error());


    if($sql_up_client === TRUE)
    {
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_societe&success=edit-client");
    }else{
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_societe&error=edit-client");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'supp-client-control')
{
    include "../include/config.php";
    $idclient = $_GET['idclient'];
    $sql_client = mysql_query("SELECT * FROM client WHERE idclient = '$idclient'")or die(mysql_error());
    $client = mysql_fetch_array($sql_client);
    $idclient = $client['idclient'];
    $nom_societe = $client['nom_societe'];
    $sql_contact = mysql_query("SELECT idcontact FROM contact WHERE idclient = '$idclient'")or die(mysql_error());
    $contact = mysql_fetch_array($sql_contact);

    foreach ($contact as $valeur) {
        mysql_query("DELETE FROM utilisateur WHERE idcontact = '$valeur'")or die(mysql_error());
    }


    $sql_del_contact = mysql_query("DELETE FROM contact WHERE idclient = '$idclient'")or die(mysql_error());
    $sql_del_client = mysql_query("DELETE FROM client WHERE idclient = '$idclient'")or die(mysql_error());


    if($sql_del_client === TRUE AND $sql_del_contact === TRUE)
    {
        header("Location: ../index.php?view=client&post=$nom_societe&success=supp-client");
    }else{
        header("Location: ../index.php?view=client&error=supp-client");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'add-contact-control'){
    include "../include/config.php";

    $cl_class = new client();
    $idclient           = $_POST['idclient'];
    $nom_contact        = $_POST['nom_contact'];
    $prenom_contact     = $_POST['prenom_contact'];
    $tel_contact        = $_POST['tel_contact'];
    $port_contact       = $_POST['port_contact'];
    $mail_contact       = $_POST['mail_contact'];
    $skype_contact      = $_POST['skype_contact'];
    $access_portail     = $_POST['access_portail'];

    if($access_portail == 0)
    {
        //On ne créer pas d'accès dans la base "utilisateur"
        $sql_add_contact = mysql_query("INSERT INTO `contact`(`idcontact`, `idclient`, `nom_contact`, `prenom_contact`, `tel_contact`, `port_contact`, `mail_contact`, `skype_contact`)
                                    VALUES (NULL,'$idclient','$nom_contact','$prenom_contact','$tel_contact','$port_contact','$mail_contact','$skype_contact')")or die(mysql_error());


        if($sql_add_contact === TRUE)
        {
            header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_contact $prenom_contact&success=add-contact");
        }else{
            header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&error=add-contact");
        }
    }else{
        $login = $_POST['login'];
        $pass_gen_clear = $cl_class->generate_password(8);
        $pass_crypt = sha1($pass_gen_clear);

        $sql_add_contact = mysql_query("INSERT INTO `contact`(`idcontact`, `idclient`, `nom_contact`, `prenom_contact`, `tel_contact`, `port_contact`, `mail_contact`, `skype_contact`)
                                    VALUES (NULL,'$idclient','$nom_contact','$prenom_contact','$tel_contact','$port_contact','$mail_contact','$skype_contact')")or die(mysql_error());

        $sql_contact = mysql_query("SELECT * FROM contact WHERE idclient = '$idclient' AND nom_contact = '$nom_contact' AND prenom_contact = '$prenom_contact'")or die(mysql_error());
        $contact = mysql_fetch_array($sql_contact);
        $idcontact = $contact['idcontact'];
        $email = $contact['mail_contact'];

        $sql_add_login = mysql_query("INSERT INTO `utilisateur`(`iduser`, `login`, `password`, `idcontact`, `nom_user`, `type`, `prenom_user`, `adresse_mail`)
                                VALUES (NULL,'$login','$pass_crypt','$idcontact','$nom_contact','1','$prenom_contact','$mail_contact')")or die(mysql_error());

        //Envoie du Mail
        $to = $email .',';
        $to .= 'mmockelyn@cridip.com';

        $sujet = "<".NOM_LOGICIEL."> Ouverture de Compte CLH-FORMATION";

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
                <td style="text-align: left;"><strong>Objet:</strong> Ouverture de Compte CLH-FORMATION</td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    Bonjour,<br>
                    <br>
                    Veuillez trouvez vos information de connexion au site .<br>
                    <table style="width: 50%; border: solid 2px;">
                        <tr>
                            <td style="width: 50%;padding: 5px;">Nom d'utilisateur:</td>
                            <td style="width: 50%;padding: 5px;"><?= $login; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 50%;padding: 5px;">Mot de Passe:</td>
                            <td style="width: 50%;padding: 5px;"><?= $pass_gen_clear; ?></td>
                        </tr>
                    </table>
                    Une fois connecter à votre interface nous vous invitons à modifier ce mot de passe par celui à votre convenance dans la section <strong>VOTRE PROFIL</strong>
                    -><strong>Mot de Passe</strong>.<br>
                    <br>
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

        if($sql_add_contact === TRUE AND $sql_add_login === TRUE)
        {
            header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_contact $prenom_contact&success=add-contact-login");
        }else{
            header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&error=add-contact");
        }
    }

}
if(isset($_GET['action']) && $_GET['action'] == 'supp-contact-control'){
    include "../include/config.php";
    $idcontact = $_GET['idcontact'];
    $sql_contact = mysql_query("SELECT * FROM contact WHERE idcontact = '$idcontact'")or die(mysql_error());
    $contact = mysql_fetch_array($sql_contact);
    $nom_contact = $contact['nom_contact'];
    $prenom_contact = $contact['prenom_contact'];
    $idclient = $contact['idclient'];

    $sql_del_login = mysql_query("DELETE FROM utilisateur WHERE idcontact = '$idcontact'")or die(mysql_error());
    $sql_del_contact = mysql_query("DELETE FROM utilisateur WHERE idcontact = '$idcontact'")or die(mysql_error());

    if($sql_del_login === TRUE AND $sql_del_contact === TRUE)
    {
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&post=$nom_contact $prenom_contact&success=supp-contact");
    }else{
        header("Location: ../index.php?view=client&sub=view-client&idclient=$idclient&error=supp-contact");
    }



}