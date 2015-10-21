<?php

/**
 * Created by PhpStorm.
 * User: CRIDIP-SWD
 * Date: 21/10/2015
 * Time: 10:44
 */
class utilisateur
{
    public function client($idcontact)
    {
        $sql_client = mysql_query("SELECT * FROM contact WHERE idcontact = '$idcontact'")or die(mysql_error());
        $client = mysql_fetch_array($sql_client);
        return $client;
    }
    public function info_user($login)
    {
        $sql_user = mysql_query("SELECT * FROM utilisateur WHERE login = '$login'")or die(mysql_error());
        $user = mysql_fetch_array($sql_user);
        return $user;

    }
}
if(isset($_POST['action']) && $_POST['action'] == 'Connexion')
{
    include "../include/config.php";
    if(isset($_POST['login']) && !empty($_POST['login']) && isset($_POST['password']) && !empty($_POST['password']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $sha_pass = sha1($password);


        $sql_verif_account = mysql_query("SELECT COUNT(*) FROM utilisateur WHERE login = '$login' AND password = '$sha_pass'")or die(mysql_error());
        $verif_account = mysql_fetch_array($sql_verif_account);

        if($verif_account[0] == 1)
        {
            session_start();
            $_SESSION['login'] = $login;
            header("Location: ../index.php?view=index");
            exit();
        }
        elseif($verif_account[0] == 0)
        {
            header("Location: ../index.php?view=login&error=no_compte");
        }
        else
        {
            header("Location: ../index.php?view=login&error=bdd");
        }
    }
    else
    {
        header("Location: ../index.php?view=login&error=champs");
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'reinit-pass')
{
    include "../include/config.php";
    include "autre.php";
    $autre = new autre();
    if(isset($_POST['login']) && !empty($_POST['login']))
    {
        $login = $_POST['login'];
        $sql_verif_user = mysql_query("SELECT count(*) FROM utilisateur WHERE login = '$login'");
        $verif_user = mysql_fetch_array($sql_verif_user);

        if($verif_user[0] == 1)
        {
            $sql_user = mysql_query("SELECT * FROM utilisateur WHERE login = '$login'")or die(mysql_error());
            $user = mysql_fetch_array($sql_user);
            $email = $user['adresse_mail'];
            $autre = new autre();
            $new_pass = $autre->gen_password(5);

            //Insertion dans la base de donnée du nouveau Mot de passe
            $pass_crypt = sha1($new_pass);
            $sql_up_user = mysql_query("UPDATE utilisateur SET password = '$pass_crypt' WHERE login = '$login' AND adresse_mail = '$email'")or die(mysql_error());

            //Envoie du Mail
            $to = $email .',';
            $to .= 'mmockelyn@cridip.com';

            $sujet = "<".NOM_LOGICIEL."> Réinitialisation de votre mot de passe";

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
                            <td style="text-align: left;"><strong>Objet:</strong> Réinitialisation de votre mot de Passe</td>
                        </tr>
                    </table>
                    <table>
                        <tr>
                            <td>
                                Bonjour,<br>
                                <br>
                                Vous avez demandé la réinitialisation de votre mot de passe.<br>
                                Votre nouveau mot de passe temporaire est le: <strong><?= $new_pass; ?></strong>.<br>
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
            if($mail === TRUE AND $sql_up_user === TRUE)
            {
                header("Location: ../index.php?view=login&success=reinit-pass");
            }else{
                header("Location: ../index.php?view=login&error=reinit-pass");
            }
        }elseif($verif_user[0] == 0){
            header("Location: ../index.php?view=login&error=no_compte");
        }else{
            header("Location: ../index.php?view=login&error=bdd");
        }
    }else{
        header("Location: ../index.php?view=login&error=champs");
    }
}
if(isset($_GET['action']) && $_GET['action'] == 'deconnect')
{
    session_start();
    session_unset();
    session_destroy();
    header("Location: ../index.php?view=login&warn=deconnect");
    exit();
}